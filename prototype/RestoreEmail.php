<?php

include("global.php");
include("header.php");
$mbox = new Mailbox($_SESSION["user"]); // pass user variables to mailbox
 // An array of objects describing message
?>

      <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <a class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="messages.php">Inbox</a>
      <a class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="trash.php">Trash</a>
      </div>

      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Message</label>
        <?php $message = $mbox->SendToInbox($_GET["id"]); ?>
      </div>
      

<?php include("footer.php"); ?>
