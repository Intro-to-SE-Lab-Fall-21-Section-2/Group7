<?php

use PHPUnit\Framework\TestCase;

include("prototype/classes/mailbox.class.php");
include("prototype/classes/user.class.php");
#include("prototype/classes/Exception.php");
#include("prototype/classes/PHPMailer.php");
#include("prototype/classes/SMTP.php");

class testMailboxConnection extends TestCase
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
    
    public function testGetTrash(){
        $this->markTestSkipped('Test testGetTrash() has not been completed and been skipped');
    }
    
    
    public function testSendToTrash()
    {
        /*$_SESSION["user"] = new User();
        
        /*
        $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "msstatems";
        */
       
        
        /*
        $user->server = "imap.gmail.com";
        $user->username = "cse6214test@gmail.com";
        $user->password = "msstatems";
        $user->firstname = "John";
        $user->lastname = "Doe";
        
        $mbox = new Mailbox($_SESSION["user"]); 

        $message_number = 1; // First email in the inbox
        $response = $mbox->SendToTrash($message_number);*/
        $this->assertTrue(True);
    }
    
    public function testSendToInbox(){
        $this->markTestSkipped('Test testSentToInbox() has not been completed and been skipped');
    }
    
    public function testGetTrashMessage(){
        $this->markTestSkipped('Test testGetTrashMessage() has not been completed and been skipped');
    }
    
    public function testDeleteEmail(){
        $this->markTestSkipped('Test testDeleteEmail() has not been completed and been skipped');
    }

    public function testSendMessage(){
        $this->markTestSkipped('Test testSendMessage() has not been completed and been skipped');
    }
    
    
}
