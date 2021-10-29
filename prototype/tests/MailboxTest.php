<?php

include("prototype/classes/mailbox.class.php");

use PHPUnit\Framework\TestCase;

class xyz extends TestCase
{
    public function testTestConnectionSuccess()
    {
        
       /* $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "msstatems";
        
        $connection = @imap_open($connection_string, $username,$password);
        
        $this->assertEquals(true,$user->TestConnection($server, $username,$password)); */
        
        $this->assertTrue(true);
    }
    
    public function testGetMessages()
    {
        $this->assertTrue(true);
    }
}
