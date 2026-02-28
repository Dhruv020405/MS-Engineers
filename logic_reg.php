<?php
session_start();
include('connect.php'); 
try {
    $connectDB = new PDO($dns, $username, $password);
    $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Initialize error messages
    $_SESSION['error'] = '';
    $_SESSION['success'] = '';

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: register.php");
        exit;
    }

    try {
        // Check if email already exists
        $stmt = $connectDB->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            $_SESSION['error'] = "Email already exists!";
            header("Location: register.php");
            exit;
        }

        // Check if phone number already exists
        $stmt = $connectDB->prepare("SELECT COUNT(*) FROM users WHERE phone = :phone");
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            $_SESSION['error'] = "Phone number already exists!";
            header("Location: register.php");
            exit;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare the SQL statement
        $stmt = $connectDB->prepare("INSERT INTO users (name, phone, email, password) VALUES (:name, :phone, :email, :password)");
        
        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        // Execute the statement
        $stmt->execute();

        $_SESSION['success'] = "Registration successful!";
        header("Location: login.php");
        
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: register.php");
    }
}
?>
