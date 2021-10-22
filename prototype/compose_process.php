<?php

//try the built-in mailer. May produce issues with spam detection
include("global.php");

$mbox = new Mailbox($_SESSION["user"]); // pass user variables to mailbox
$mbox->SendMessage($_POST["to"],$_POST["subject"],$_POST["message"]);


header("Location: messages.php?mail_success=1");
?>
