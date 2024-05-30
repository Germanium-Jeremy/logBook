<?php include '../php/dbConnect.php'; ?>
<?php include '../php/addActi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../styles/style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <script defer src="../scripts/script.js"></script>
     <script src="https://cdn.tailwindcss.com"></script>
     <title>Add Activity</title>
</head>
<body>
<?php include '../components/header.php'; ?>
<main class="pt-[3cm]">
     <?php include '../components/addActivity.php'; ?>
</main>
<?php include '../components/footer.php'; ?>
</body>
</html>