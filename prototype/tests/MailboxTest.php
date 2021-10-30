<?php


use PHPUnit\Framework\TestCase;

class testTestConnection extends TestCase
{
    
    
    public function testTestConnectionSuccess()
    {
        $user = new User();
        
        $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "msstatems";

        $this->assertEquals(true,Mailbox::TestConnection($server,$username,$password));
        
        #$this->assertTrue(true);
    }
    
    public function testTestConnectionFailure()
    {
        $user = new User();
        
        $server = "imap.gmail.com";
        $username = "cse6214test@gmail.com";
        $password = "wrongpassword";
        
        $this->assertEquals(false,Mailbox::TestConnection($server,$username,$password));
    }
}
