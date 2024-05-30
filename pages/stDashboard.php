<?php
session_start();
include '../php/dbConnect.php';

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

if (isset($_GET['delete'])) {
    $entry_id = $_GET['delete'];
    $sql = "DELETE FROM logbook_entries WHERE entry_id = ?";
    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param('i', $entry_id);
        if ($stmt->execute()) {
            echo "<script>console.log('Activity Deleted Successfully')</script>";
        } else {
            echo "<script>console.log('Failed to Delete Activity')</script>";
        }
        $stmt->close();
    }
}

$sql = "SELECT * FROM logbook_entries WHERE st_Id = $student_id;";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../styles/style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <script defer src="../scripts/script.js"></script>
     <script src="https://cdn.tailwindcss.com"></script>
     <title>View Activities</title>
</head>
<body>
<?php include '../components/header.php'; ?>
<main class="pt-[3cm] flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="flex justify-evenly max-sm:flex-row my-[1rem]">
          <h1 class="text-2xl font-bold mb-4 text-center">Scheduled Activities</h1>
          <a href="./addTask.php" class="button">Add Activity</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Entry Date</th>
                    <th class="py-2 px-4 border-b">Entry Time</th>
                    <th class="py-2 px-4 border-b">Days</th>
                    <th class="py-2 px-4 border-b">Week</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Working Hours</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr class="text-center">
                         <td class="py-2 px-4 border text-center"><?php echo $row['entry_date']; ?></td>
                         <td class="py-2 px-4 border text-center"><?php echo $row['entry_time']; ?></td>
                         <td class="py-2 px-4 border text-center"><?php echo $row['days']; ?></td>
                         <td class="py-2 px-4 border text-center"><?php echo $row['week']; ?></td>
                         <td class="py-2 px-4 border text-center"><?php echo $row['description']; ?></td>
                         <td class="py-2 px-4 border text-center"><?php echo $row['working_hours']; ?></td>
                         <td class="py-2 px-4 border text-center flex">
                              <button class="text-blue-500 button mx-2" onclick="updateActivity(<?php echo $row['Id'] ?>)">Update</button>
                              <button class="text-red-500 button mx-2" onclick="deleteAct(<?php echo $row['Id'] ?>)">Delete</button>
                         </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../components/footer.php'; ?>
<script>
     function deleteAct(entryId) {
          if (confirm('Are you sure you want to delete this activity?')) {
               window.location.href = '../php/delete.php?Id=' + entryId;
          }
     }
     function updateActivity(entryId) {
          window.location.href = './update.php?id=' + entryId;
     }
</script>
</body>
</html>

<?php
$connection->close();
?>

