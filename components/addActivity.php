<form method="post" class="px-[3rem] max-sm:px-[1.2rem] py-[1rem] rounded-lg shadow-lg flex flex-col justify-center items-center">
     <h1 class="text-2xl font-bold mb-4">Add Schedule Activity</h1>
     
     <div class="py-[.5rem] w-full">
          <label class="block text-xl" for="entryDate">Entry Date</label>
          <input type="date" name="entryDate" id="entryDate" class="inputs w-full" required>
     </div>

     <div class="py-[.5rem] w-full">
          <label class="block text-xl" for="entryTime">Entry Time</label>
          <input type="time" name="entryTime" id="entryTime" class="inputs w-full" required>
     </div>

     <div class="py-[.5rem] w-full">
          <label class="block text-xl" for="days">Days</label>
          <input type="text" name="days" id="days" class="inputs w-full" placeholder="Manday, Tuesday, Friday" required>
     </div>

     <div class="py-[.5rem] w-full">
          <label class="block text-xl" for="week">Week</label>
          <input type="number" name="week" id="week" class="inputs w-full" placeholder="12" required>
     </div>

     <div class="py-[.5rem] w-full">
          <label class="block text-xl" for="description">Activity Description</label>
          <textarea name="description" id="description" class="inputs w-full" rows="4" placeholder="This is an activity" required></textarea>
     </div>

     <div class="py-[.5rem] w-full">
          <label class="block text-xl" for="workingHours">Working Hours</label>
          <input type="number" name="workingHours" id="workingHours" placeholder="12100" class="inputs w-full" required>
     </div>

     <div class="py-[.5rem] w-full flex justify-center">
          <button type="submit" name="addActivity" class="button">Add Activity</button>
     </div>
</form>