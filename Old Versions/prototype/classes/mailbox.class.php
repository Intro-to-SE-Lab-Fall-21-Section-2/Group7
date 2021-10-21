<?php


class Mailbox {
	var $user;

	function Mailbox(&$user) { // passes variables to this class
		$this->user = $user;
	}

	public static function TestConnection($server,$username,$password) { // Tests imap connection
		$connection_string = "{" . $server . ":993/imap/ssl/novalidate-cert}"; // constructs string to imap server
		$connection = @imap_open($connection_string, $username,$password); // open IMAP stream, tests connection server, username, and password, returns IMAP instance
		return $connection != false;
	}

	public function GetMessages($offset = 0) { // Get messages off IMAP server

		$connection_string = "{" . $this->user->server . ":993/imap/ssl/novalidate-cert}"; // construct string to imap server
		$connection = @imap_open($connection_string, $this->user->username,$this->user->password); // imap_open to start IMAP stream

		$message_count = imap_check($connection); // check IMAP instance, returns object with properties Date, Driver, Mailbox name, Nmsgs, Recent number of messages

		//TODO: implement offset checking based on $message_count->Nmsgs;
		
		$range = "1:".$message_count->Nmsgs; // Appends range for number of messages in inbox
		$response = imap_fetch_overview($connection,$range); // Returns an ARRAY of objects describing single message in range
		                                                     // See https://www.php.net/manual/en/function.imap-fetch-overview.php
		return $response;
	}
}


?>