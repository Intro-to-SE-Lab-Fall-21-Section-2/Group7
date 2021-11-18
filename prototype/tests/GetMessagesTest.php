<?php

use PHPUnit\Framework\TestCase;

#include("prototype/classes/Exception.php");
#include("prototype/classes/PHPMailer.php");
#include("prototype/classes/SMTP.php");
# --testdox-html <output file>

class testGetMessages extends TestCase
{
    public function testGetMessagesSuccess()
    {
        /*
        $user = new User();
        
        $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "msstatems";
        $firstname = "John";
        $lastname = "Doe";

        $messages = Mailbox::GetMessages(0);
        */
        $this->markTestSkipped('Test testGetMessageSuccess has not been completed and has been skipped');
    }
    
    public function testGetSingleMessaageSuccess(){
        /*$mbox = new Mailbox($_SESSION["user"]); // pass user variables to mailbox
        
        $messageNumber = 1;
        $message = $mbox->GetMessage($messageNumber);
        
        $this->assertTrue(true);*/
        
        $this->markTestSkipped('Test testGetSingleMessageSuccess() has not been completed and been skipped');
    }
    
  
}
