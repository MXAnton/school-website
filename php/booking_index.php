<html>
<head>
		<Title>Boka julbord | Klass 9 Solklintsskolan</title>

		<meta name="title" content="Boka julbord klass 9 Solklintsskolan">
	  <meta name="description" content="Boka julbord i Cementa Arena! 250kr per vuxen! Stöd klass 9 på Solklintsskolan!">
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
			include "db_connect.php";

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
				$sql = $mysqli->query('SELECT Booked_chairs_total FROM Bookings_Amount_table ORDER BY Total_bookings_amount DESC LIMIT 1');
				$result = $sql->fetch_assoc()["Booked_chairs_total"];
				$available_amount_of_chairs = 120;
				$chairs_left = $available_amount_of_chairs - $result;

				$new_booking_amount_min_value = 1;
				$new_booking_amount_value = 1;
				$submit_button_type = "button";

				$booking_opened = false; // Booking closed
				echo "<h1>Tyvärr bokningen är stängd!</h1>";

				if ($chairs_left == 1 && $booking_opened == true)
				{
					echo "<h1>Boka bord innan det är fullt! Det finns bara $chairs_left ledig plats kvar!</h1>";
					$submit_button_type = "submit";
				} else if ($chairs_left > 1 && $booking_opened == true)
				{
					echo "<h1>Boka bord innan det är fullt! Det finns bara $chairs_left lediga platser kvar!</h1>";
					$submit_button_type = "submit";
				} else if ($booking_opened == true)
				{
					$new_booking_amount_min_value = 0;
					$new_booking_amount_value = 0;
					echo "<h1>Tyvärr det är redan fullbokat!</h1>";
				}
				?>
				<hr>
			</div>

			<div class="table">
				<form action="check_booking.php">
					<div class="form-row">
					  <h2>För- & efternamn<span style='color: red'>*</span></h2>
					  <input type="text" name="newBookingName" required>
					</div>
					<br>

				  <h2>Antal personer<span style='color: red'>*</span></h2>
				  <input type="number" name="newBookingAmount" value="<?php echo $new_booking_amount_value; ?>" min="<?php echo $new_booking_amount_min_value; ?>"
					 	max="<?php echo $chairs_left; ?>">
					<br>

					<h2>E-post<span style='color: red'>*</span></h2>
					<input type="email" name="newBookingEmail" required>
					<br>

					<h2>Kommentar/Allergi</h2>
					<input type="text" size="70%" placeholder="Till exempel... (En person är glutenintolerant och två stycken är laktosintoleranta.)"
					 	name="newBookingComment">
					<br>

				  <input class="button" type="<?php echo $submit_button_type; ?>" value="Boka bord">
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
