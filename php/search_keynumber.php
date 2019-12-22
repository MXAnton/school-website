<?php
	include "db_connect.php";
	$keynumberfromform = $_GET["keynumber"];
	echo $keynumberfromform;

	// Search the database for people that are booked alone
	echo "<h2>Show all bookings that are booked with $keynumberfromform chairs</h2>";

	$sql = "SELECT Booking_name FROM Bookings_table WHERE Booking_chairs LIKE '" . $keynumberfromform . "'";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["Booking_name"] . "<br>";
		}
	} else {
		echo "0 results";
	}
?>
