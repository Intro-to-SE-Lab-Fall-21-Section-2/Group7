<?php

class User {

	var $firstname;
	var $lastname;
	var $username;
	var $password;
	var $server;

	function IsLoggedIn(){
		return ($this->email != "");
	}

	function Login($server,$username,$password) {

		if (Mailbox::TestConnection($server,$username,$password,$firstname = "", $lastname = "")) {
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->username = $username;
			$this->password = $password;
			$this->server = $server;
			return true;
		}
		return false;
	}

	function Logout() {
		$this->userid = 
		$this->firstname = 
		$this->lastname = 
		$this->email = 
		$this->password = "";
	}




}


?>