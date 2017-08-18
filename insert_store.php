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
					<?php
						require_once("db.php");
						
						$name = $_POST['name'];
						$street = $_POST['street'];
						$city = $_POST['city'];
						$state = $_POST['state'];
						$zipCode = $_POST['zipCode'];
						$phoneNumber = $_POST['phoneNumber'];
						$webSite = $_POST['website'];
						$comments = $_POST['comments'];
						
						if(!empty($name) && is_string($name) && !empty($street) && is_string($street) && !empty($city) && is_string($city) &&
						!empty($state) && is_string($state) && !empty($zipCode) && is_numeric($zipCode)){
							$sql = "insert store_attributes(name, address, city, state, zip_code, phone_number, website, comment) 
							values('$name', '$street', '$city', '$state', '$zipCode', '$phoneNumber', '$webSite', '$comments');";
							$result = mysql_query($sql);
							if($result){
								print("<h3>Thanks For The New Shop</h3>");
							} else {
								print("<h3>Failed To Insert New Store");
								print(mysql_error());
							}  
						} else {
							print("<p>Sorry, you did not fill out the form correctly.  <a href='new_store.html'>Try Again?</a></p>");
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