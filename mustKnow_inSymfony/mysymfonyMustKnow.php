<?php
namespace App;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

// --------------------------------------
// Entity
// --------------------------------------

#[ORM\Entity]
class User
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, unique: true)]
    private string $phone;

    #[ORM\Column]
    private string $passwordHash;

    public function __construct(string $phone, string $passwordHash)
    {
        $this->phone = $phone;
        $this->passwordHash = $passwordHash;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function verifyPassword(string $rawPassword, PasswordHasher $hasher): bool
    {
        return $hasher->isValid($this->passwordHash, $rawPassword);
    }
}

// --------------------------------------
// Hasher
// --------------------------------------

class PasswordHasher
{
    public function hash(string $raw): string
    {
        return password_hash($raw, PASSWORD_BCRYPT);
    }

    public function isValid(string $hashedPassword, string $raw): bool
    {
        return password_verify($raw, $hashedPassword);
    }
}

// --------------------------------------
// Repository Interface
// --------------------------------------

interface UserRepositoryInterface
{
    public function findByPhone(string $phone): ?User;
    public function save(User $user): void;
}

// --------------------------------------
// Doctrine Repository Implementation
// --------------------------------------

class DoctrineUserRepository implements UserRepositoryInterface
{
    public function __construct(private EntityManagerInterface $em) {}

    public function findByPhone(string $phone): ?User
    {
        return $this->em->getRepository(User::class)->findOneBy(['phone' => $phone]);
    }

    public function save(User $user): void
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}

// --------------------------------------
// Command DTOs
// --------------------------------------

final class RegisterUserCommand
{
    #[Assert\Regex('/^\+?\d{10,15}$/')]
    public string $phone;

    #[Assert\NotBlank]
    #[Assert\Length(min: 8)]
    public string $password;

    public function __construct(string $phone, string $password)
    {
        $this->phone = $phone;
        $this->password = $password;
    }
}

final class LoginUserCommand
{
    public function __construct(
        public readonly string $phone,
        public readonly string $password
    ) {}
}

// --------------------------------------
// Handlers
// --------------------------------------

class RegisterUserHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private PasswordHasher $hasher
    ) {}

    public function __invoke(RegisterUserCommand $command): User
    {
        if ($this->userRepository->findByPhone($command->phone)) {
            throw new \DomainException('User already exists');
        }

        $user = new User($command->phone, $this->hasher->hash($command->password));
        $this->userRepository->save($user);
        return $user;
    }
}

class LoginUserHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private PasswordHasher $hasher
    ) {}

    public function __invoke(LoginUserCommand $command): void
    {
        $user = $this->userRepository->findByPhone($command->phone);

        if (!$user || !$user->verifyPassword($command->password, $this->hasher)) {
            throw new \DomainException('Invalid credentials');
        }

        // User is authenticated
    }
}

// --------------------------------------
// Controllers
// --------------------------------------

#[Route('/api/register', methods: ['POST'])]
class RegisterController extends AbstractController
{
    public function __invoke(Request $request, MessageBusInterface $bus): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $command = new RegisterUserCommand($data['phone'], $data['password']);
        $user = $bus->dispatch($command);

        return $this->json(['status' => 'registered']);
    }
}

#[Route('/api/login', methods: ['POST'])]
class LoginController extends AbstractController
{
    public function __invoke(Request $request, MessageBusInterface $bus): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $command = new LoginUserCommand($data['phone'], $data['password']);
        $bus->dispatch($command);

        return $this->json(['status' => 'logged_in']);
    }
}
