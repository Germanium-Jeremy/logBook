<form method="post" class="px-[3rem] max-sm:px-[1.2rem] py-[1rem] rounded-lg shadow-lg flex flex-col justify-center items-center">
     <div class="py-[.5rem] max-sm:w-full w-4/6">
          <label class="block text-xl max-sm:text-lg" for="first">First Name</label>
          <input type="text" name="first" id="first" class="inputs w-full" placeholder="First Name" autocomplete="" required>
     </div>
     <div class="py-[.5rem] max-sm:w-full w-4/6">
          <label class="block text-xl max-sm:text-lg" for="last">Last Name</label>
          <input type="text" name="last" id="last" class="inputs w-full" placeholder="Last Name" autocomplete="" required>
     </div>
     <div class="py-[.5rem] max-sm:w-full w-4/6">
          <label class="block text-xl max-sm:text-lg" for="email">Email</label>
          <input type="email" name="email" id="email" class="inputs w-full" placeholder="Email" autocomplete="" required>
     </div>
     <div class="py-[.5rem] max-sm:w-full w-4/6">
          <label class="block text-xl max-sm:text-lg" for="signuPassword">Password</label>
          <input type="password" name="signuPassword" id="signuPassword" class="inputs w-full" placeholder="Password" autocomplete="" required>
     </div>
     <div class="py-[.5rem] max-sm:w-full w-4/6 flex justify-center">
          <button type="submit" name="signup" class="button">Sign Up</button>
     </div>
     <a href="./login.php">Have an Account?</a>
</form>