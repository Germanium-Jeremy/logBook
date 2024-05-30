<?php
session_start();
include '../php/dbConnect.php';
include '../php/sanitiseInputs.php';
$entry_id;
if (isset($_GET['id'])) {
    $entry_id = $_GET['id'];
    $sql = "SELECT * FROM logbook_entries WHERE Id = ?";
    if ($prepared = $connection->prepare($sql)) {
        $prepared->bind_param('i', $entry_id);
        $prepared->execute();
        $result = $prepared->get_result();
        if ($result->num_rows > 0) {
            $activity = $result->fetch_assoc();
        } else {
            echo "<script>alert('Activity not found'); window.location.href='./stDashboard.php';</script>";
        }
        $prepared->close();
    }
}

if (isset($_POST['updateActivity'])) {
    $entryDate = sanitize_input($_POST['entryDate']);
    $entryTime = sanitize_input($_POST['entryTime']);
    $days = sanitize_input($_POST['days']);
    $week = sanitize_input($_POST['week']);
    $description = sanitize_input($_POST['description']);
    $workingHours = sanitize_input($_POST['workingHours']);

    $sql = "UPDATE logbook_entries SET entry_date=?, entry_time=?, days=?, week=?, description=?, working_hours=? WHERE id=?";
    if ($prepared = $connection->prepare($sql)) {
        $prepared->bind_param('sssssii', $entryDate, $entryTime, $days, $week, $description, $workingHours, $entry_id);
        if ($prepared->execute()) {
            echo "<script>alert('Activity updated successfully'); window.location.href='./stDashboard.php';</script>";
        } else {
            echo "<script>alert('Failed to update activity');</script>";
        }
        $prepared->close();
    }
}
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
    <title>Update Activity</title>
</head>
<body>
<?php // include '../components/header.php'; ?>
<main class="pt-[3cm] flex justify-center">
    <form method="post" class="px-[3rem] max-sm:px-[1.2rem] py-[1rem] rounded-lg shadow-lg flex flex-col justify-center items-center w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Update Activity</h1>

        <div class="py-[.5rem] w-full">
            <label class="block text-xl" for="entryDate">Entry Date</label>
            <input type="date" name="entryDate" id="entryDate" class="inputs w-full" value="<?php echo $activity['entry_date']; ?>" required>
        </div>

        <div class="py-[.5rem] w-full">
            <label class="block text-xl" for="entryTime">Entry Time</label>
            <input type="time" name="entryTime" id="entryTime" class="inputs w-full" value="<?php echo $activity['entry_time']; ?>" required>
        </div>

        <div class="py-[.5rem] w-full">
            <label class="block text-xl" for="days">Days</label>
            <input type="text" name="days" id="days" class="inputs w-full" value="<?php echo $activity['days']; ?>" required>
        </div>

        <div class="py-[.5rem] w-full">
            <label class="block text-xl" for="week">Week</label>
            <input type="number" name="week" id="week" class="inputs w-full" value="<?php echo $activity['week']; ?>" required>
        </div>

        <div class="py-[.5rem] w-full">
            <label class="block text-xl" for="description">Activity Description</label>
            <textarea name="description" id="description" class="inputs w-full" rows="4" required><?php echo $activity['description']; ?></textarea>
        </div>

        <div class="py-[.5rem] w-full">
            <label class="block text-xl" for="workingHours">Working Hours</label>
            <input type="number" name="workingHours" id="workingHours" class="inputs w-full" value="<?php echo $activity['working_hours']; ?>" required>
        </div>

        <div class="py-[.5rem] w-full flex justify-center">
            <button type="submit" name="updateActivity" class="button">Update Activity</button>
        </div>
    </form>
</main>
<?php include '../components/footer.php'; ?>
</body>
</html>

<?php
$connection->close();
?>
