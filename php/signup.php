<?php
include '../php/sanitiseInputs.php';
if (isset($_POST["signup"])) {
    $first = sanitize_input($_POST['first']);
    $last = sanitize_input($_POST['last']);
    $email = sanitize_input($_POST['email']);
    $password = md5(sanitize_input($_POST['signuPassword']));

    $namePattern = "/^[a-zA-Z-' ]*$/";
    $emailPattern = "/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/";

    $errors = [];

    if (!validate_input($email, $emailPattern)) {
        $errors['email'] = "Invalid email format";
    }
    if (!validate_input($first, $namePattern)) {
        $errors['first'] = "Names must contain only letters, hyphens, apostrophes, and spaces";
    }
    if (!validate_input($last, $namePattern)) {
        $errors['last'] = "Names must contain only letters, hyphens, apostrophes, and spaces";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO user_student (firstname, lastname, password, email) VALUES (?, ?, ?, ?)";
        if ($preparedStatement = $connection->prepare($sql)) {
            $preparedStatement->bind_param('ssss', $first, $last, $password, $email);
            if ($preparedStatement->execute()) {
                header("Location: ../pages/login.php"); 
                echo "<script>console.log('User Added Successfully')</script>";
            } else {
                echo "<script>console.log('Failed To Add User')</script>";
            }
            $preparedStatement->close();
        } else {
            echo "<script>console.log('Database Error: Could not prepare statement')</script>";
        }
    } else {
        foreach ($errors as $field => $error) {
            echo "<script>alert('Error in $field: $error')</script>";
        }
    }
}
?>
