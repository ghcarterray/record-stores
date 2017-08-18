<?php
	require_once("phpmailer/class.phpmailer.php");
	function sendEmail($fromEmail, $fromName, $subject, $message){
		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->SMTPAuth = TRUE;
		$mailer->Host = "ssl://smtp.gmail.com:465";
		$mailer->Username = "geogumd.@gmail.com";
		$mailer->Password = "mps12345";
		$mailer->From = $fromEmail . " (" . $fromEmail . ")";
		$mailer->Subject = $subject;
		$mailer->Body = $message;
		$mailer->AddAddress("ghcray@umd.edu", "Carter Ray");
		
		if(!$mailer->Send()){
			$h = "Mailer Error " . $mailer->ErrorInfo;
			$m = "Mailer Error Was Not Sent";
			print "<h1>$h</h1>";
			print "<pre>$m</pre>";
		} else {
			print "<h2>Mail Sent</h2>";
			print "<p>Thank You. Message has been sent successfully.</p>";
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8"/>
		<link href="Layout.css" rel="stylesheet" type="text/css" />
		<link href="content.css" rel="stylesheet" type="text/css" />
		<title>Vinyl Record Shop Finder</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>Where's The Wax?</h1>
			</div>
			<div id="nav">
				<a href="home.html">Home</a>
				<a href="stores.html">Stores</a>
				<a href="map.html">Map</a>
				<a href="new_store.html">New Store</a>
				<a href="mailing_list.html">Mailing List</a>
				<a href="contact.html">Contact Us</a>
			</div>
			<div id="content">
				<fieldset>
					<legend><h2>Contact Us</h2></legend>
					
					<?php
					$fromEmail = $_POST['email'];
					$fromName = $_POST['name'];
					$subject = $_POST['subject'];
					$message = $_POST['message'];
					
					if(!empty($fromEmail) && !empty($message)){
						if (filter_var($fromEmail, FILTER_VALIDATE_EMAIL)){
							sendEmail($fromEmail, $fromName, $subject, $message);
						} else {
							print ("<p>You must use a valid e-mail address.  <a href='contact.html'>Try Again?</a></p>");
						}
					} else {
						print "<h2>Error</h2>";
						print "<p>You Must Specify Your Email Address and Message.  <a href='contact.html'>Try Again?</a></p>";
					}
				?>
				
				</fieldset>
			</div>
			<div id="footer">
				<p>&copy; Carter Ray</p><img src="Images/logo-powered-by-google.gif" />
			</div>
		</div>
	</body>
</html>