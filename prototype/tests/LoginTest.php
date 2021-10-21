<?php

include("../classes/mailbox.class.php");
include("../classes/user.class.php");

echo "Working directory: " . getcwd() . "\n";
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {

    public function testLoginSuccess() {
    	$user = new User();

    	$server = "imap.gmail.com";
    	$username = "cse6214test@gmail.com";
    	$password = "msstatems";
    	$firstname = "John";
    	$lastname = "Doe";

        $this->assertEquals(true,$user->Login($server, $username,$password,$firstname,$lastname));
    }


    public function testLoginFail() {
    	$user = new User();

    	
        $this->assertEquals(false,$user->Login("","","","",""));
    }

}