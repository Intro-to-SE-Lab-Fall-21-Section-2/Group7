<?php

include("prototype/classes/mailbox.class.php");
include("prototype/classes/user.class.php");

#include("classes/mailbox.class.php");
#include("classes/user.class.php");

use PHPUnit\Framework\TestCase;

class testLogin extends TestCase {

    public function testLoginSuccess() {
    	
        // Gmail does not like Travis login, use https://accounts.google.com/b/0/DisplayUnlockCaptcha then rebuild on travis
        
        $user = new User();

    	$server = "imap.gmail.com";
    	$username = "cse6214test@gmail.com";
    	$password = "msstatems";
    	$firstname = "John";
    	$lastname = "Doe";


        $this->assertEquals(true,$user->Login($server, $username,$password,$firstname,$lastname));
        
        #$this->assertTrue(true);
    }

    public function testLoginFail() {
    	$user = new User();
    	
    	$this->assertEquals(false,$user->Login("","","","",""));
    }

} 