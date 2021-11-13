<?php
include("global.php"); // call mailbox class, mailbox function, test connection function, GetMessages 
include("header.php"); // call user class, IsLoggedIn, Login Function, Logout Function

$mbox = new Mailbox($_SESSION["user"]); // pass user variables to mailbox
$messages = $mbox->GetTrash(0); // An array of objects describing message

?>


	  <!-- Buttons on along top of page -->
      <nav class="flex flex-wrap items-center justify-between p-4">
        <div class="flex flex-shrink-0"><a class="inline-block py-3 px-6 mt-4 lg:mt-0 leading-none text-green-600 bg-grey-300 hover:bg-grey-400 font-semibold rounded shadow" href="compose.php">Compose</a></div>

        <?php if (isset($_GET["mail_sent"])) echo "    Mail successfully sent!"; ?>
        <div class="navbar-menu hidden lg:flex lg:flex-grow lg:items-center w-full lg:w-auto">
          <div class="ml-auto"><a class="inline-block py-3 px-6 mt-4 lg:mt-0 leading-none text-white bg-green-600 hover:bg-green-700 font-semibold rounded shadow" href="logout.php">Log Out</a></div>
        </div>
      </nav>
    
      <!-- Buttons on left hand side of inbox -->
      <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <div>
        <div><a href="messages.php" class="text-grey-600 hover:underline">Inbox</a></div>
        <div class="my-12"></div>
        <!--
        <div><a href="#" class="text-grey-600 hover:underline">Outbox</a></div>
        <div class="my-12"></div>
        <div><a href="#" class="text-grey-600 hover:underline">Draft</a></div>
        <div class="my-12"></div>
	-->
        <div><a href="trash.php" class="text-grey-600 hover:underline">Trash</a></div>
      </div>
      </div>
        <div class="w-full md:w-2/3 px-4 mb-4 md:mb-0">
<!--
      <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
        <div class="w-full md:w-2/3 px-4 mb-4 md:mb-0">
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Search</label>
        <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" name="field-name" placeholder="Write a text">
      </div>
      </div>
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <button class="inline-block py-8 px-4 leading-none text-white bg-green-600 hover:bg-green-700 font-semibold rounded shadow" type="submit">Search</button>
      </div>
      </div>
-->
      
      <!-- Section is for displaying current email inbox  -->
      <section class="py-8 px-4">
        <h2 class="text-3xl mb-2 font-semibold font-heading font-semibold">Trashbox</h2>
        <table class="w-full table-auto">
          <thead>
            <tr><th class="border-t px-2 py-2" scope="col">Sender</th><th class="border-t px-2 py-2" scope="col">Subject</th><!--<th class="text-center border-t px-2 py-2" scope="col">Status</th>-->
            <th class="text-center border-t px-2 py-2" scope="col">Date</th>
            <th class="text-center border-t px-2 py-2" scope="col">Action</th>
            <th class="text-center border-t px-2 py-2" scope="col">Restore</th>
            <th class="text-center border-t px-2 py-2" scope="col">Delete</th></tr>
          </thead>
          <tbody>

          	<?php
          	foreach ($messages as $message) { ?> <!-- Displays each individual item in object array messages -->
	            <tr>
	              <td class="border-t px-2 py-2"><?php echo $message->from;?></td>
	              <td class="border-t px-2 py-2"><?php echo $message->subject;?></td>
                <!--
	              <td class="text-center border-t px-2 py-2">
	              	<?php if ($message->unread) { ?>
		
		                <span class="inline-block text-sm py-1 px-3 rounded-full text-white bg-green-500">Read</span>

	              	<? } else { ?>
		                <span class="inline-block text-sm py-1 px-3 rounded-full text-white bg-yellow-500">Unread</span>
	              	<? } ?>
	              </td>
                -->
	              <td class="text-center border-t px-2 py-2"><?php echo date("m/d/Y g:i a", strtotime($message->date));?></td>
	              <td class="text-center border-t px-2 py-2"><a class="text-indigo-600 hover:underline" href="messageTrash.php?id=<?php echo $message->msgno;?>">open</a></td>
	              <td class="text-center border-t px-2 py-2"><a class="text-indigo-600 hover:underline" href="RestoreEmail.php?id=<?php echo $message->msgno;?>">Restore</a></td>
	              <td class="text-center border-t px-2 py-2"><a class="text-indigo-600 hover:underline" href="DeleteEmail.php?id=<?php echo $message->msgno;?>">Delete</a></td>
	            </tr>
		        <? } ?>

          </tbody>
        </table>
      </section>
     
      <!--  Page buttonson bottom of page if we ever decide we want to use them
      <div class="flex p-4">
        <ul class="flex mx-auto md:ml-auto md:mx-0 list-reset border border-grey-light rounded">
          <li><a class="block px-3 py-2 text-indigo-600 hover:text-white hover:bg-indigo-700 border-r border-grey-light" href="#">Previous</a></li>
          <li><a class="block px-3 py-2 text-indigo-600 hover:text-white hover:bg-indigo-700 border-r border-grey-light" href="#">1</a></li>
          <li><a class="block px-3 py-2 text-indigo-600 hover:text-white hover:bg-indigo-700 border-r border-grey-light" href="#">2</a></li>
          <li><a class="block px-3 py-2 text-indigo-600 hover:text-white hover:bg-indigo-700 border-r border-grey-light" href="#">3</a></li>
          <li><a class="block px-3 py-2 text-indigo-600 hover:text-white hover:bg-indigo-700" href="#">Next</a></li>
        </ul>
      </div> -->
      </div>
      </div>

<?php
include("footer.php");
?>