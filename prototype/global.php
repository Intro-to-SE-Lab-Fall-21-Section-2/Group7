<?php

include("classes/mailbox.class.php"); // call mailbox class, mailbox function, test connection function, GetMessages 
include("classes/user.class.php"); // call user class, IsLoggedIn, Login Function, Logout Function

session_start(); // PHP built in function, used for sharing session variables across multiple pages
                 // https://www.w3schools.com/php/php_sessions.asp

if (!isset($_SESSION["user"])) // If a user is not created, create one
	$_SESSION["user"] = new User();


