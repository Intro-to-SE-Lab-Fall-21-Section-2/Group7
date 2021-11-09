<?php

include("global.php");
$mbox = new Mailbox($_SESSION["user"]); // pass user variables to mailbox
$message = $mbox->GetMessageTrash($_GET["id"]); // An array of objects describing message
echo $message["htmlbody"];
?>