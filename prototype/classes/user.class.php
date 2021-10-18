<?php

class User {

	var $firstname;
	var $lastname;
	var $username;
	var $password;
	var $server;
	// $this is used a local pseduo-variable for objects, https://www.geeksforgeeks.org/this-keyword-in-php/

	function IsLoggedIn(){
		return ($this->email != "");
	}

	function Login($server,$username,$password) { // Login using successful username and password by checking imap connectivity

	    if (Mailbox::TestConnection($server,$username,$password,$firstname = "", $lastname = "")) { // @imap_open connection using username, password, server
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->username = $username;
			$this->password = $password;
			$this->server = $server;
			return true;
		}
		return false;
	}

	function Logout() { // removes user information
		$this->userid = 
		$this->firstname = 
		$this->lastname = 
		$this->email = 
		$this->password = "";
	}




}


?>