<?php
session_start();
include '../php/dbConnect.php';

if (isset($_GET['Id'])) {
     $entry_id = $_GET['Id'];
     $sql = "DELETE FROM logbook_entries WHERE id = $entry_id;";
     if ($query = $connection->query($sql)) {
          header("Location: ../pages/stDashboard.php");
          echo "<script>console.log('Activity Deleted Successfully')</script>";
     }
}
?>