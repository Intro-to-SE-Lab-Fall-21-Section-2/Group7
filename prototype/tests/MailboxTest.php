<?php

use PHPUnit\Framework\TestCase;

include("prototype/classes/mailbox.class.php");
include("prototype/classes/user.class.php");
include("prototype/classes/Exception.php");
include("prototype/classes/PHPMailer.php");
include("prototype/classes/SMTP.php");

class xyz extends TestCase
{
    public function testTestConnectionSuccess()
    {
        $user = new User();
        
        $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "msstatems";
              
        $this->assertEquals(true,Mailbox::TestConnection($server, $username,$password));
        #$this->assertTrue(true);

    }
    
    public function testTestConnectionFail()
    {
        $user = new User();
       
        $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "wrongpassword";
        
        $this->assertEquals(false,Mailbox::TestConnection($server, $username,$password));
    }
}
