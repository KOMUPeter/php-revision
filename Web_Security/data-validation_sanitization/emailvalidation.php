<?php

// SANITIZATION AND VALIDATION OF EMAIL
// $email = "peter@example.com";
$email = $_POST["email"] ?? ""; // Use null coalescing operator to avoid warnings

// Step 1: Sanitize the email
$sanitizeEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

// Step 2: Validate the sanitized email
if (filter_var($sanitizeEmail, FILTER_VALIDATE_EMAIL)) {
    echo "Email is sanitized and valid: " . $sanitizeEmail;
} else {
    echo "Invalid email.";
}





// NOW CHECKING IF THE DOMAIN IS VALID
$email = "example@example.com";

// Step 1: Validate email format
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $domain = substr(strrchr($email, "@"), 1); // Extract domain part
    
    // Step 2: Validate domain existence
    if (checkdnsrr($domain, "MX") || checkdnsrr($domain, "A")) {
        echo "Valid email address and domain exists.";
    } else {
        echo "Valid email format, but domain does not exist.";
    }
} else {
    echo "Invalid email address.";
}


// simplifing the two codes above in one if
$email = $_POST["email"] ?? ""; 

// Sanitize and validate the email, then check domain existence
if (filter_var($email, FILTER_SANITIZE_EMAIL) && filter_var($email, FILTER_VALIDATE_EMAIL) && (checkdnsrr(substr(strrchr($email, "@"), 1), "MX") || checkdnsrr(substr(strrchr($email, "@"), 1), "A"))) {
    echo "Email is sanitized, valid, and the domain exists.";
} else {
    echo "Invalid email or domain.";
}






