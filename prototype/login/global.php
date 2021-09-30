<?php

include("classes/mailbox.class.php");
include("classes/user.class.php");

session_start();


if (!isset($_SESSION["user"]))
	$_SESSION["user"] = new User();


