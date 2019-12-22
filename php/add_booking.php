<html>
<head>
		<Title>Bekräfta bokning av julbord | Klass 9 Solklintsskolan</title>

		<meta name="title" content="Bekräfta bokning av julbord klass 9 Solklintsskolan">
	  <meta name="description" content="Boka julbord i Cementa Arena! 250kr per vuxen! Stöd klass 9 på Solklintsskolan!">
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
		include "db_connect.php";
		$booking_name = $_GET["name"];
		$booking_amount = $_GET["amount"];
		$booking_email = $_GET["email"];
		$booking_comment = $_GET["comment"];

		// Add new booking to database
		$sql = "INSERT INTO Bookings_table (BookingID, Booking_name, Booking_chairs, Booking_email, Booking_comment) VALUES (NULL, '$booking_name'
			, $booking_amount, '$booking_email', '$booking_comment')";
		$result = $mysqli->query($sql);

		// Get Booked_chairs_total value, add $booking_amount and update the database with the new Booked_chairs_total value
		$sql = $mysqli->query('SELECT Booked_chairs_total FROM Bookings_Amount_table ORDER BY Total_bookings_amount DESC LIMIT 1');
		$chairs_used = $sql->fetch_assoc()["Booked_chairs_total"];
		$updated_chairs_used = $chairs_used + $booking_amount;
		$sql = "INSERT INTO Bookings_Amount_table (Total_bookings_amount, Booked_chairs_total, Comment) VALUES (NULL, '$updated_chairs_used', 'NULL')";
		$result = $mysqli->query($sql);

		// Get BookingID from database by checking the booking's vars BookingID in the database
		$sql = "SELECT BookingID FROM Bookings_table WHERE Booking_name LIKE '" . $booking_name . "'
		 																						      AND Booking_chairs LIKE '" . $booking_amount . "'
																											AND Booking_email LIKE '" . $booking_email . "'
																											AND Booking_comment LIKE '" . $booking_comment . "'";
		$result = $mysqli->query($sql);
		$booking_id = $result->fetch_assoc()["BookingID"];
	?>

	<div class="content">
		<div class="table-top">
			<h1>Boknings bekräftelse<h1>
			<hr>
		</div>

		<div class="table">
			<?php
			echo "<h2>Välkommen $booking_name på julbord i Cementa Arena den 1/12 mellan klockan 18:00 & 21:00!</h2>";
			echo "<h2>Ett mail har blivit skickad till din e-post, $booking_email!</h2><br>";

			echo "<h2>Ditt boknings nummer: $booking_id</h2>";
			echo "<h2>För- & efternamn: $booking_name</h2>";
			echo "<h2>Antal personer: $booking_amount</h2>";
			echo "<h2>E-post: $booking_email</h2>";
			echo "<h2>Kommentar: $booking_comment</h2><br>";

			echo "<h2>Är det något som gick fel eller inte fungerar? Kontakta då oss på e-post klass9solklintsskolan04@gmail.com!</h2>";
			?>
			<hr>
			<a href="booking_index.php" class="button">Tillbaka</a>
		</div>
	</div>

	<footer class="site-footer">
		<img src="/images/sweden-flag.png" alt="Swedish flag" id="sweden-flag">
		<a>Copyright © 2019 Solklintsskolan Årskurs 9</a>
	</footer>

	<?php
		include "send-mail.php";

		$mysqli->close();
	?>
</body>
</html>
