<?php


class Mailbox {
	var $user;

	function Mailbox(&$user) {
		$this->user = $user;
	}

	public static function TestConnection($server,$username,$password) {
		$connection_string = "{" . $server . ":993/imap/ssl/novalidate-cert}";
		$connection = @imap_open($connection_string, $username,$password);
		return $connection != false;
	}

	public function GetMessages($offset = 0) {

		$connection_string = "{" . $this->user->server . ":993/imap/ssl/novalidate-cert}";
		$connection = @imap_open($connection_string, $this->user->username,$this->user->password);

		$message_count = imap_check($connection);

		//TODO: implement offset checking based on $message_count->Nmsgs;
		
		$range = "1:".$message_count->Nmsgs;
		$response = imap_fetch_overview($connection,$range);
		return $response;
	}
}


?>