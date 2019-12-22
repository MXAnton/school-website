<html>
<head>
		<Title>Bokningar Julbord | Klass 9 Solklintsskolan</title>

		<meta name="title" content="Bokningar Julbord | Klass 9 Solklintsskolan">
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <meta charset="UTF-8">

	  <meta name="revisit-after" content="1 days">
	  <meta name="author" content="Anton Lehrberg">

	  <link rel="stylesheet" href="\css/search_all_bookings.css">
</head>

<body>
	<?php
		include "db_connect.php";

		$sql = "SELECT BookingID, Booking_name, Booking_chairs, Booking_email, Booking_comment FROM Bookings_table";
		$result = $mysqli->query($sql);
	?>
	<div class="content">
		<div class="table-top">
			<h1>Bokningar<h1>
			<hr>
		</div>

		<div class="table">
			<?php
			echo "<h2>Boknings nummer - För- & efternamn - Platser - Kommentar/Allergi - E-post </h2>";
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<h2>" . $row["BookingID"] . " - " . $row["Booking_name"] . " - " . $row["Booking_chairs"] . " - " . $row["Booking_comment"] . " - " . $row["Booking_email"] . "</h2>";
				}
			}
			?>
		</div>
	</div>
	<?php
		//include "search_keynumber.php";

		$mysqli->close();
	?>
</body>
</html>
