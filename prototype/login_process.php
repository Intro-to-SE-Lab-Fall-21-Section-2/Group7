<?php

include("global.php");


if ($_SESSION["user"]->Login($_POST["server"],$_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"])) {
	header("Location: messages.php");
}
else {
	header("Location: login.php?error=1");
}



?>