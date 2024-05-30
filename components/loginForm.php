<form method="post" class="px-[3rem] max-sm:px-[1.2rem] py-[1rem] rounded-lg flex flex-col justify-center items-center">
     <div class="py-[.5rem] w-full">
          <label class="block text-xl max-sm:text-lg" for="loginEmail">Email</label>
          <input type="email" name="loginEmail" id="loginEmail" class="inputs w-full" placeholder="Email" autocomplete="" required>
     </div>
     <div class="py-[.5rem] w-full">
          <label class="block text-xl max-sm:text-lg" for="loginPassword">Password</label>
          <input type="password" name="loginPassword" id="loginPassword" class="inputs w-full" placeholder="Password" autocomplete="" required>
     </div>
     <div class="py-[.5rem] w-full flex justify-center">
          <input type="checkbox" name="remember" class="min-w-3 mx-2" id="remember">
          <label class="text-xl max-sm:text-lg" for="remember">Remember Me</label>
     </div>
     <div class="py-[.5rem] w-full flex justify-center">
          <button type="submit" name="login" class="button">Login</button>
     </div>

     <a href="./signup.php">Don't have an Account?</a>
</form>