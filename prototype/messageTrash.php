<?php

include("global.php");
include("header.php");
$mbox = new Mailbox($_SESSION["user"]); // pass user variables to mailbox
$message = $mbox->GetMessageTrash($_GET["id"]); // An array of objects describing message
?>

      <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <a class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="messages.php">Inbox</a>
      
      <a class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="compose.php?to=<?php echo urlencode(implode(",",$message["to"]));?>&subject=<?php echo urlencode("Re: " . $message["subject"]);?>&replyto=<?php echo $_GET["id"];?>">Reply</a>
      
      <a class="inline-block py-3 px-6 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded shadow" href="compose.php?subject=<?php echo urlencode("Fe: " . $message["subject"]);?>&replyto=<?php echo $_GET["id"];?>">Forward</a>
      </div>
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">From</label>
        <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" value="<?php echo $message["from"];?>" disabled placeholder="Write a text">
      </div>
      </div>
        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">To</label>
        <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" name="field-name" value=" <?php foreach ($message["to"] as $to) echo $to . " ";?>" disabled>

       
      </div>
      
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Received Date</label>
        <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" name="field-name" value="<?php echo $message["date"];?>" disabled>
      </div>
      </div>
      </div>
    
      <div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Subject</label>
                <input class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none" type="text" value="<?php echo $message["subject"];?>" disabled placeholder="Write a text">


      </div>
      
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Message</label>
        <iframe width="100%" height="800" src="message_body.php?id=<?php echo $_GET["id"];?>"></iframe>
      </div>
      </div>

<?php include("footer.php"); ?>
