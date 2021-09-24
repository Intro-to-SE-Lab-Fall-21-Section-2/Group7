<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 

<?php
echo "<pre>";
$connection = imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert}", "cse6214test@gmail.com", "msstatems") or die("can't connect: " . imap_last_error());
$message_count = imap_check($connection);
$range = "1:".$message_count->Nmsgs;
$response = imap_fetch_overview($connection,$range);
foreach ($response as $msg) 
    print_r($msg);
?>


 </body>
</html>