<?php
session_start();
require_once 'database.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $result['id']; // Fetch the user_id from the query result

    if ($result && password_verify($password, $result['password'])) {
        // Password is correct, set session variables
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $result['email'];
        $_SESSION['user_id'] = $result['id'];
        header("Location: ../marketplace.php"); // Redirect to dashboard page
        exit(); // Ensure no further code is executed after the redirect
    } else {
        // Invalid credentials
        header("Location: ../login.php?Invalid_credentials"); // Redirect to login page
        exit(); // Ensure no further code is executed after the redirect
    }
} else {
    header("Location: ../index.php"); // Redirect to dashboard page
    exit(); // Ensure no further code is executed if the request method is not POST
}
?>