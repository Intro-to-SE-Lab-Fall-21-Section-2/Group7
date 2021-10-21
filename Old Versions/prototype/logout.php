<?php
include("global.php");

$_SESSION["user"]->Logout();

header("Location: login.php");

?>