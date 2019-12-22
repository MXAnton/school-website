<html>
<head>
		<Title>Bekräfta bokning till Reservlistan av julbord | Klass 9 Solklintsskolan</title>

		<meta name="title" content="Bekräfta bokning Reservlistan av julbord klass 9 Solklintsskolan">
	  <meta name="description" content="Reservlistan julbord i Cementa Arena! 250kr per vuxen! Stöd klass 9 på Solklintsskolan!">
	  <meta name="keywords" content="klass 9 Solklintsskolan julbord, åk 9 Solklintsskolan julbord, Solklintsskolan julbord, klass 9 julbord, julbord">
	  <meta name="robots" content="index, follow">
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <meta charset="UTF-8">

	  <meta name="revisit-after" content="1 days">
	  <meta name="author" content="Anton Lehrberg">

	  <link rel="stylesheet" href="\css/check_booking.css">
</head>

<body>
	<?php
		include "../db_connect.php";
		$whished_booking_name = $_GET["name"];
		$whished_booking_amount = $_GET["amount"];
		$whished_booking_email = $_GET["email"];
		$whished_booking_phonenumber = $_GET["phonenumber"];
		$whished_booking_comment = $_GET["comment"];

		// Add new booking to database
		$sql = "INSERT INTO Whished_Bookings_table (Whished_Booking_place, Whished_Booking_name, Whished_Booking_chairs, Whished_Booking_email, Whished_Booking_phonenumber, Whished_Booking_comment) VALUES (NULL, '$whished_booking_name'
			, $whished_booking_amount, '$whished_booking_email', '$whished_booking_phonenumber', '$whished_booking_comment')";
		$result = $mysqli->query($sql);

		// Get Whished_Booking_place from database by checking the whished booking's vars Whished_Booking_place in the database
		$sql = "SELECT Whished_Booking_place FROM Whished_Bookings_table WHERE Whished_Booking_name LIKE '" . $whished_booking_name . "'
		 																						      AND Whished_Booking_chairs LIKE '" . $whished_booking_amount . "'
																											AND Whished_Booking_email LIKE '" . $whished_booking_email . "'
																											AND Whished_Booking_phonenumber LIKE '" . $whished_booking_phonenumber . "'
																											AND Whished_Booking_comment LIKE '" . $whished_booking_comment . "'";
		$result = $mysqli->query($sql);
		$whished_booking_place = $result->fetch_assoc()["Whished_Booking_place"];
	?>

	<div class="content">
		<div class="table-top">
			<h1>Bekräftelse av bokning till Reservlistan<h1>
			<hr>
		</div>

		<div class="table">
			<?php
			echo "<h2>$whished_booking_name är nu placerad på Reservlistan till julbordet i Cementa Arena den 1/12 mellan klockan 18:00 & 21:00!</h2>";
			echo "<h2>Vi hör av oss på antingen e-post eller mobil om ni får plats!</h2>";
			echo "<h2>Nu är det bara att hålla tummarna för att det blir plats över!</h2>";
			echo "<h2>Ett mail har blivit skickad till din e-post, $whished_booking_email!</h2><br>";

			echo "<h2>Plats i kön på Reservlistan: $whished_booking_place</h2>";
			echo "<h2>För- & efternamn: $whished_booking_name</h2>";
			echo "<h2>Antal personer: $whished_booking_amount</h2>";
			echo "<h2>E-post: $whished_booking_email</h2>";
			echo "<h2>Mobilnummer: $whished_booking_phonenumber</h2>";
			echo "<h2>Kommentar: $whished_booking_comment</h2><br>";

			echo "<h2>Är det något som gick fel eller inte fungerar? Kontakta då oss på e-post klass9solklintsskolan04@gmail.com!</h2>";
			?>
			<hr>
			<a href="whish_booking_index.php" class="button">Tillbaka</a>
		</div>
	</div>

	<footer class="site-footer">
		<img src="/images/sweden-flag.png" alt="Swedish flag" id="sweden-flag">
		<a>Copyright © 2019 Solklintsskolan Årskurs 9</a>
	</footer>

	<?php
		include "send-whished_booking_mail.php";

		$mysqli->close();
	?>
</body>
</html>
