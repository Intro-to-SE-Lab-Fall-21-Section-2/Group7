<?php

//used by PHPMailer
include_once("classes/Exception.php");
include_once("classes/PHPMailer.php");
include_once("classes/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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
		                                                     
		//$list = imap_list($connection, $connection_string, '*'); // Used to get list of folders so they can be displayed
		//print_r($list);
		
		return $response;
	}
	
	public function GetTrash($offset = 0) { // Get messages off IMAP server
	    
	    $connection_string = "{" . $this->user->server . ":993/imap/ssl/novalidate-cert}[Gmail]/Trash"; // construct string to imap server
	    $connection = @imap_open($connection_string, $this->user->username,$this->user->password); // imap_open to start IMAP stream
	    
	    $message_count = imap_check($connection); // check IMAP instance, returns object with properties Date, Driver, Mailbox name, Nmsgs, Recent number of messages
	    
	    //TODO: implement offset checking based on $message_count->Nmsgs;
	    
	    $range = "1:".$message_count->Nmsgs; // Appends range for number of messages in inbox
	    $response = imap_fetch_overview($connection,$range); // Returns an ARRAY of objects describing single message in range
	    // See https://www.php.net/manual/en/function.imap-fetch-overview.php
	    
	    return $response;
	}
	
	public function SendToTrash($num) { // Get messages off IMAP server
	    $connection_string = "{" . $this->user->server . ":993/imap/ssl/novalidate-cert}"; // construct string to imap server
	    $trash_string = "[Gmail]/Trash";
	    $connection = @imap_open($connection_string, $this->user->username,$this->user->password);
	    
	    If($connection){
	        print("IMAP Open");
	    }else{
	        print("IMAP NOT OPEN");
	    }
	    
	    echo "email number " . $num;
	    
	    $res = imap_mail_move($connection, $num, $trash_string, CP_UID);
	    
	}
	


	public function GetMessage($num) { // Get messages off IMAP server
		$connection_string = "{" . $this->user->server . ":993/imap/ssl/novalidate-cert}"; // construct string to imap server
		$connection = @imap_open($connection_string, $this->user->username,$this->user->password); 		
		$data = imap_fetchbody($connection, $num,"");

		$range = $num . ":" . $num;
		$response = imap_fetch_overview($connection,$range); // Returns an ARRAY of objects describing single message in range
		$message = $response[0];

		include("classes/plancakeemailparser.class.php");
		$emailParser = new PlancakeEmailParser($data);
		//https://github.com/daniele-occhipinti/php-email-parser
        
		
		return [
			"to"=>$emailParser->getTo(),
			"from"=>$message->from,
			"subject"=>$emailParser->getSubject(),
			"cc"=>$emailParser->getCc(),
			"date"=>$message->date,
			"plainbody"=>$emailParser->getPlainBody(),
			"htmlbody"=>$emailParser->getHTMLBody()];
		
		/*
		 return [
			"to"=>$message->to,
			"from"=>$message->from,
			"subject"=>$message->subject,
			"cc"=>$emailParser->getCc(),
			"date"=>$message->date,
			"plainbody"=>imap_fetchbody($connection,$num,1.1),
			"htmlbody"=>imap_fetchbody($connection,$num,1.2)];
		 */
	}

	public function SendMessage($to,$subject,$body) {



		$mail = new PHPMailer();

		$mail->isSMTP();
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

		$mail->Host = $this->user->server; //'smtp.gmail.com';
		//Use `$mail->Host = gethostbyname('smtp.gmail.com');`


		//Set the SMTP port number:
		// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
		// - 587 for SMTP+STARTTLS
		$mail->Port = 465;

		//Set the encryption mechanism to use:
		// - SMTPS (implicit TLS on port 465) or
		// - STARTTLS (explicit TLS on port 587)
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

		$mail->SMTPAuth = true;
		$mail->Username = $this->user->username; //'cse6214test@gmail.com';
		$mail->Password = $this->user->password; //'msstatems';

		$mail->setFrom($this->user->username, $this->user->firstname . " " . $this->user->lastname);

		$mail->addReplyTo($this->user->username, $this->user->firstname . " " . $this->user->lastname);
		$mail->addAddress($to);

		$mail->Subject = $subject;



		$mail->msgHTML($body);
		$mail->AltBody = $body;

		//$mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors

		return $mail->send();


	}



}


?>