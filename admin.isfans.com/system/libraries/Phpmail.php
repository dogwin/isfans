<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class CI_Phpmail{
	function  __construct(){
		 require_once(dirname(__FILE__)."/phpmailer/class.phpmailer.php");
		 define('GUSER', 'no-reply@brandtemper.com'); // GMail username
		 define('GPWD', 'f00a37f20da99117cb71f60bc319cc69'); // GMail password
	}
	/*
	function send_email($to, $sender, $subject, $message,$title='Brand.com Daily send'){
	    $mail = new PHPMailer(true);
	    $body = $message;//preg_replace('/\\\\/','', $message);
	    //$mail->IsSMTP();
	    $mail->FromName = $title;
	    $mail->From = $sender;
		$mail->Sender = $sender;
		
	    $mail->Subject = $subject;
		$mail->CharSet="utf-8";   
		$mail->Encoding = "base64";
	    
	    $mail->AltBody = '';
		$mail->WordWrap   = 80;
	    $mail->MsgHTML($body);
		$mail->IsHTML(true); // send as HTML
	    $mail->AddAddress($to);
		return $mail->Send();
	}
	*/
	function send_email($to,$from,$subject,$body,$from_name) {
		global $error;
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = GUSER;
		$mail->Password = GPWD;
		$mail->SetFrom($from, $from_name);
		$mail->FromName = $from_name;
		$mail->Subject = $subject;
		//$mail->Body = $body;
		$mail->CharSet="utf-8";
		$mail->Encoding = "base64";
		 
		$mail->AltBody = '';
		$mail->WordWrap   = 80;
		$mail->MsgHTML($body);
		$mail->IsHTML(true);
		$mail->AddAddress($to);
		return $mail->Send();
		/*
		if(!$mail->Send()) {
			$error = 'Mail error: '.$mail->ErrorInfo;
			return false;
		} else {
			$error = 'Message sent!';
			return true;
		}*/
	}
	function test(){
		echo "hello";
	}
} 