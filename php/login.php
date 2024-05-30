<?php
session_start();
include '../php/dbConnect.php';
include '../php/sanitiseInputs.php';

if (isset($_POST["login"])) {
    $email = sanitize_input($_POST['loginEmail']);
    $password = sanitize_input($_POST['loginPassword']);
     
    $emailPattern = "/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/";

    $errors = [];

    if (!validate_input($email, $emailPattern)) {
        $errors['email'] = "Invalid email format";
    }

    if (empty($errors)) {
        $sql = "SELECT email FROM user_student WHERE email = ? ;";
        if ($preparedStatement = $connection->prepare($sql)) {
            $preparedStatement->bind_param('s', $email);
            $preparedStatement->execute();
            $result = $preparedStatement->get_result();

            if ($result->num_rows > 0) {
                $sql2 = "SELECT * FROM user_student WHERE password = ? ;";
                if ($preparedStatement2 = $connection->prepare($sql)) {
                    $preparedStatement2->bind_param('s', $email);
                    $preparedStatement2->execute();
                    $result2 = $preparedStatement2->get_result();
                    if ($result2->num_rows > 0) {
                        $student = $result2->fetch_assoc();
                        $_SESSION['student_id'] = $student['id'];
                        $_SESSION['student_email'] = $student['email'];
                        header("Location: ../pages/stDashboard.php");
                        exit();
                    } else {
                        echo "<script>alert('Incorrect Password');</script>";
                    }
                }
            } else {
                echo "<script>alert('Incorrect Email');</script>";
            }
            $preparedStatement->close();
        } else {
            echo "<script>alert('Database Error: Could not prepare statement');</script>";
        }
    } else {
        foreach ($errors as $field => $error) {
            echo "<script>console.log('Error in $field: $error'); alert('Error in $field: $error');</script>";
        }
    }
}
?>
