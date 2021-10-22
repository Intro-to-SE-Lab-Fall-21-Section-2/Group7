<?php include("header.php");?>
    
    <form action="compose_process.php" method="POST">
      <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <a class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="messages.php">Inbox</a>
      </div>
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Send To:</label>
        <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" name="to" required value="<?php echo $_GET["to"];?>" placeholder="Write a text">
      </div>
      </div>
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0"></div>
      </div>
    
      <div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Subject</label>
        <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" name="subject" required value="<?php echo $_GET["subject"];?>"placeholder="Write a text">
      </div>
      
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Message</label>
        <textarea class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" name="message" required rows="3" placeholder="Write something..."></textarea>
      </div>
      </div>
      <input type="submit" class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="#" value="Send">
</form>
<?php include("footer.php");
