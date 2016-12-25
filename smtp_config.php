$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug = 0; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->AddAddress($email);
$mail->Username="yourgmailid@gmail.com"; 
$mail->Password="yourgmailpassword"; 
$mail->SetFrom('you@yourdomain.com','Coding Cage');
$mail->AddReplyTo("you@yourdomain.com","Coding Cage");
$mail->Subject = $subject;
$mail->MsgHTML($message);
$mail->Send();

<?php
session_start();
require 'lib/password.php';
require 'config.php';

if(isset($_POST['register']))
{
	//retrive the value
	$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
	$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	$password = !empty($_POST['password']) ? trim($_POST['password']) : null;
	
	//check errors here
	//$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
	
	//check username
	
	//construct sql statement
	$sql = "SELECT COUNT(username, email) AS num FROM tbl_users WHERE username = :username AND email = :email";
	$stmt = $pdo->prepare($sql);
	
	//bind the value
	$stmt->bindValue(':username', $username);
	$stmt->bindValue(':email', $email);
	
	//execute
	$stmt->execute();
	
	//fetch the row
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	//if current username already available, display errors
	//create error handling
	if($row['num'] > 0){
		die('That username already exist');
	}
	
	//hash the password
	$passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 10));
	
	//prepare our insert statement
	$sql = "INSERT INTO tbl_users (username, email, password) VALUES (:username, :email, :password)";
	$stmt= $pdo->execute($sql);
	
	//bind our variable
	$stmt->bindvalue(':username', $username);
	$stmt->bindvalue(':email', $email);
	$stmt->bindvalue(':password', $passwordHash);
	
	//execute
	$result = $stmt->execute();
	
	//if the signup process is successful
	if($result){
		echo 'Thank you for registering with BookSmart. Hope you discover the magnificent of our website';
	}

?>