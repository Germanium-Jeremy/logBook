<header class="fixed z-10 top-0 left-0 right-0 flex justify-between px-[2rem] py-[1rem] bg-[#224] shadow-lg">
    <a href="./home.html" class="text-2xl font-bold link bg-gradient-to-r from-blue-200 to-blue-400 text-transparent bg-clip-text">RCA LogBook</a>
    <div class="flex justify-between max-md:z-[-1] gap-[2rem] max-md:text-3xl max-md:fixed max-md:top-[-5cm] max-md:right-0 max-md:left-0 max-md:px-[1rem] max-md:py-[.4rem] max-md:bg-[#224]" id="nav">
        <a href="#" class="text-xl link font-semibold bg-gradient-to-r from-blue-200 to-blue-400 text-transparent bg-clip-text">
            <span><i class='bx bx-home'></i></span>
            <span class="max-md:hidden">Home</span>
        </a>
        <a href="#" class="text-xl link font-semibold bg-gradient-to-r from-blue-200 to-blue-400 text-transparent bg-clip-text">
            <span><i class='bx bx-home'></i></span>
            <span class="max-md:hidden">Features</span>
        </a>
        <a href="#" class="text-xl link font-semibold bg-gradient-to-r from-blue-200 to-blue-400 text-transparent bg-clip-text">
            <span><i class='bx bx-home'></i></span>
            <span class="max-md:hidden">Services</span>
        </a>
    </div>
    <?php if (isset($_SESSION['student_email'])): ?>
        <a href="../php/logout.php" class="text-xl link font-semibold bg-gradient-to-r from-blue-200 to-blue-400 text-transparent bg-clip-text">
            Logout
        </a>
    <?php endif; ?>
    <i class='bx bx-menu link hidden max-md:block text-2xl font-bold bg-gradient-to-r from-blue-200 to-blue-400 text-transparent bg-clip-text' id="toggleMenu"></i>
</header>
