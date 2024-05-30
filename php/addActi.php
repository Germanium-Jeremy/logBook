<?php
session_start();
include '../php/sanitiseInputs.php';

if (isset($_SESSION['student_id']) || isset($_SESSION['student_email'])) {
     $student_email = $_SESSION['student_email'];
     $sql2 = "SELECT id FROM user_student WHERE email = '$student_email';";
     $query2 = $connection->query($sql2);
     $result = $query2->fetch_assoc();
     $student_id = $result['id'];
 } else {
     echo "No user is logged in.";
     exit();
}

if (isset($_POST['addActivity'])) {
     $entryDate = sanitize_input($_POST['entryDate']);
     $entryTime = sanitize_input($_POST['entryTime']);
     $days = sanitize_input($_POST['days']);
     $week = sanitize_input($_POST['week']);
     $description = sanitize_input($_POST['description']);
     $workingHours = sanitize_input($_POST['workingHours']);

     $errors = [];

     $datePattern = "/^\d{4}-\d{2}-\d{2}$/";
     $timePattern = "/^\d{2}:\d{2}$/";

          if (!validate_input($entryDate, $datePattern)) {
               $errors['date'] = "Invalid date format";
          }
          if (!validate_input($entryTime, $timePattern)) {
               $errors['time'] = "Invalid time format";
          }
          if (!is_numeric($week) || $week < 1) {
               $errors['week'] = "Invalid week number";
          }
          if (!is_numeric($workingHours) || $workingHours < 0) {
               $errors['workingHours'] = "Invalid working hours";
          }

     if (empty($errors)) {
          $sql = "INSERT INTO logbook_entries (entry_date, entry_time, days, week, description, working_hours, st_Id) VALUES (?, ?, ?, ?, ?, ?, ?)";
          if ($prepairedStatement = $connection->prepare($sql)) {
               $prepairedStatement->bind_param('ssssssi', $entryDate, $entryTime, $days, $week, $description, $workingHours, $student_id);
               if ($prepairedStatement->execute()) {
                    header("Location: ./stDashboard.php");
               } else {
                    echo "<script>console.log('Failed to Add Activity')</script>";
               }
               $prepairedStatement->close();
          } else {
               echo "<script>console.log('Database Error: Could not prepare statement')</script>";
          }
     } else {
          foreach ($errors as $field => $error) {
               echo "<script>console.log(Error in $field: $error)</script>";
          }
     }
}
?>
