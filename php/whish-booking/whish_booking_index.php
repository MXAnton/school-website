<html>
<head>
		<Title>Boka plats Reservlistan julbord | Klass 9 Solklintsskolan</title>

		<meta name="title" content="Reservlistan plats julbord klass 9 Solklintsskolan">
	  <meta name="description" content="Reservlistan plats till julbord i Cementa Arena! 250kr per vuxen! Stöd klass 9 på Solklintsskolan!">
	  <meta name="keywords" content="klass 9 Solklintsskolan julbord, åk 9 Solklintsskolan julbord, Solklintsskolan julbord, klass 9 julbord, julbord">
	  <meta name="robots" content="index, follow">
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <meta charset="UTF-8">

	  <meta name="revisit-after" content="1 days">
	  <meta name="author" content="Anton Lehrberg">

	  <link rel="stylesheet" href="\css/booking_index.css">
</head>

<body>

		<?php
			include "../db_connect.php";

			//include "search_all_bookings.php";
		?>

		<div class="header">
				<a id="rubrik" href="/index.html">Solklintsskolan Årskurs 9</a>
				<div class="header-right">
					<hr>
					<a href="/index.html">Hem</a>
					<a href="/events.html">Tillställningar</a>
					<a href="/about.html">Om oss</a>
				</div>
		</div>

		<div class="content">
			<div class="table-top">
				<?php
				echo "<h1>Lägg till dig på Reservlistan för julbordet redan nu!</h1>";
				?>
				<hr>
			</div>

			<div class="table">
				<form action="check_whished_booking.php">
				  <h2>För- & efternamn<span style='color: red'>*</span></h2>
				  <input type="text" name="newWhishedBookingName" required>
					<br>

				  <h2>Antal personer<span style='color: red'>*</span></h2>
				  <input type="number" name="newWhishedBookingAmount" value="1" min="1">
					<br>

					<h2>E-post<span style='color: red'>*</span></h2>
					<input type="email" name="newWhishedBookingEmail" required>
					<br>

					<h2>Mobilnummer<span style='color: red'>*</span></h2>
					<input type="text" name="newWhishedBookingPhonenumber" required>
					<br>

					<h2>Kommentar/Allergi</h2>
					<input type="text" size="70%" placeholder="Till exempel... (En person är glutenintolerant och två stycken är laktosintoleranta.)"
					 	name="newWhishedBookingComment">
					<br>

				  <input class="button" type="submit" value="Lägg till i reservlistan">
				</form>
			</div>
		</div>

		<footer class="site-footer">
			<img src="/images/sweden-flag.png" alt="Swedish flag" id="sweden-flag">
			<a>Copyright © 2019 Solklintsskolan Årskurs 9</a>
		</footer>

		<?php
			//include "search_keynumber.php";

			$mysqli->close();
		?>
</body>
</html>
