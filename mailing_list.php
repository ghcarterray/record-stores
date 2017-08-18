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
					<legend><h2>Join Our Mailing List</h2></legend>
					
					<?php
						require_once("db.php");
						
						$fromEmail = $_POST['email'];
						$fromName = $_POST['name'];
						
						if(!empty($fromEmail) && !empty($fromName)){
							if (filter_var($fromEmail, FILTER_VALIDATE_EMAIL)){
								$sql = "insert mailing_list(name, email)
								values('$fromName', '$fromEmail');";
								$result = mysql_query($sql);
								if($result){
									print("<h3>Thanks For Joining The Mailing List</h3>");
								} else {
									print("<h3>Failed To Join Mailing List");
									print(mysql_error());
								}  
							} else {
								print ("<p>You must use a valid e-mail address.  <a href='mailing_list.html'>Try Again?</a></p>");
							}
							} else {
								print("<p>Sorry, you did not fill out the form correctly.  <a href='mailing_list.html'>Try Again?</a></p>");
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