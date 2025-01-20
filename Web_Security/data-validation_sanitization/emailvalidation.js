// Simulated database connection
const database = {
    users: [], // Array to store users
    addUser(user) {
      this.users.push(user);
      console.log("User added to the database:", user);
    },
    findUserByEmail(email) {
      return this.users.find((user) => user.email === email);
    }
  };
  
  // Regular expression for email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
  // Function to validate email addresses
  const validateEmail = (email) => {
    if (emailRegex.test(email)) {
      return true; // Valid email format
    } else {
      throw new Error("Invalid email format.");
    }
  };
  
  // Function to create a new user
  const createUser = (username, email) => {
    try {
      // Validate email format
      if (validateEmail(email)) {
        // Check if the user already exists
        if (database.findUserByEmail(email)) {
          throw new Error("Email is already in use.");
        }
        
        // Create a new user object
        const newUser = { username, email };
        
        // Add the user to the database
        database.addUser(newUser);
        
        console.log("User created successfully!");
        return newUser;
      }
    } catch (error) {
      console.error(error.message);
    }
  };
  
  // Simulated user creation flow
  console.log("=== User Registration ===");
  
  // Test case 1: Valid user creation
  const user1 = createUser("john_doe", "john.doe@example.com");
  console.log("Current Users:", database.users);
  
  // Test case 2: Duplicate email
  const user2 = createUser("jane_doe", "john.doe@example.com");
  
  // Test case 3: Invalid email
  const user3 = createUser("invalid_user", "invalid email");
  
  // Test case 4: Another valid user
  const user4 = createUser("alice", "alice@example.com");
  console.log("Current Users:", database.users);
  