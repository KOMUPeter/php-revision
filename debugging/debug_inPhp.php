<?php
// Turn On Error Reporting: Ensure that error reporting is enabled. You can do this in your PHP script or in the php.ini file.

// In your PHP script
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Use var_dump() 
// var_dump(): Provides detailed information about a variable, including its type and value.
$data = array('foo' => 'bar', 'baz' => 42);
var_dump($data);

// and print_r()
print_r($data);


// Using try-catch for Exception Handling
try {
    // Code that may throw an exception
    $result = someFunction();
} catch (Exception $e) {
    // Handle exception
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
