<?php include './php/dbConnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./styles/style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <script src="./scripts/script.js"></script>
     <script defer src="https://cdn.tailwindcss.com"></script>
     <title>Landing</title>
</head>
<body>
<?php include './components/header.php'; ?>
<main class="pt-[3cm] flex items-center justify-center min-h-screen">
     <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
          <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome to the RCA Logbook</h1>
          <p class="text-gray-600 mb-8">Manage and track your Activity attachment with ease using our comprehensive logbook designed for interns.</p>
          <div class="space-y-4">
               <a href="./pages/login.php" class="block w-full py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">Login</a>
               <a href="./pages/signup.php" class="block w-full py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">Sign Up</a>
          </div>
     </div>
</main>
<?php include './components/footer.php'; ?>
</body>
</html>
