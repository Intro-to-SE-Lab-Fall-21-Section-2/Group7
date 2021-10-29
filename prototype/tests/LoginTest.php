<?php

include("prototype/classes/mailbox.class.php");
include("prototype/classes/user.class.php");

use PHPUnit\Framework\TestCase;

class testLogin extends TestCase {

    public function testLoginSuccess() {
    	
        $user = new User();

    	$server = "imap.gmail.com";
    	$username = "cse6214test@gmail.com";
    	$password = "msstatems";
    	$firstname = "John";
    	$lastname = "Doe";

        #$this->assertTrue(false);
        $this->assertEquals(true,$user->Login($server, $username,$password,$firstname,$lastname));
    }


    public function testLoginFail() {
    	$user = new User();

    	
    	$this->assertEquals(false,$user->Login("","","","",""));
    }

}
