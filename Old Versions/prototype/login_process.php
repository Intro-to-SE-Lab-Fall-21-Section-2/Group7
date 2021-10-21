<?php

include("global.php"); // call mailbox class, mailbox function, test connection function, GetMessages 


if ($_SESSION["user"]->Login($_POST["server"],$_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"])) {
	header("Location: messages.php"); // successful login, Login inside user.class.php, if succesful login, the variables from the post are applied to userclass vars
}
else {
	header("Location: login.php?error=1"); // unsuccessful login
}


?>