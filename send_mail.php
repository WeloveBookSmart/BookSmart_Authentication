<?php
$to 	 = $email; 
$subject = 'Signup | Verification';
$message = '

Thanks For Signing up!
Your account has been created
You must click on the verification link below to activate your account

----------------------------------
Username:  '.name.'
Password:  '.password.'
----------------------------------

Please click this link to activate your account:
http://www.booksmart.com/verify.php?email='.$email.'&hash='.$hash.'

';  //our message includes the link

$headers = 'From:noreply@welovebooksmart.com' . "\r\n";
mail($to, $subject, $message, $headers);

?>