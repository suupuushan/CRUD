<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'conn.php';


if (isset($_POST["email"])) {

	$emailTo = $_POST["email"];
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	$code = uniqid(true);
	$query = mysqli_query($conn, "INSERT INTO reset(code, email) VALUES('$code','$emailTo')");
	if (!$query) {
		exit('Error');
	}

	try {
	    //Server settings
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'replynmail@gmail.com';                     // SMTP username
	    $mail->Password   = 'h@lo3141';                               // SMTP password
	    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom('replynmail@gmail.com', 'Corp');
	    $mail->addAddress($emailTo);     // Add a recipient
	    $mail->addReplyTo('no-reply@gmail.com', 'no-reply');

	    // Content
	    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetpass.php?code=$code";
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Reset Password';
	    $mail->Body    = "<h1>Klik link dibawah untuk me-reset password anda</h1>
	    					<a href='$url'>Reset</a>";
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'Link reset password sudah terkirim ke email anda';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lupa Password</title>
</head>
<body>
	<h2>Reset Password</h2>
	<form method="POST">
		<input type="text" name="email" placeholder="Email" autocomplete="off">
		<br>
		<input type="submit" name="btn" value="Reset Password">
	</form>
</body>
</html>