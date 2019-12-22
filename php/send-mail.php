<?php
include "db_connect.php";

$to_email = $_GET["email"];
$subject = 'Klass 9 julbord bokning';

$sql = "SELECT BookingID FROM Bookings_table WHERE Booking_email LIKE '" . $to_email . "'";
$result = $mysqli->query($sql);
$booking_id = $result->fetch_assoc()["BookingID"];
$sql = "SELECT Booking_name FROM Bookings_table WHERE Booking_email LIKE '" . $to_email . "'";
$result = $mysqli->query($sql);
$booking_name = $result->fetch_assoc()["Booking_name"];
$sql = "SELECT Booking_chairs FROM Bookings_table WHERE Booking_email LIKE '" . $to_email . "'";
$result = $mysqli->query($sql);
$booking_amount = $result->fetch_assoc()["Booking_chairs"];
$message = 'Välkommen '. $booking_name .' på julbord i Cementa Arena den 1/12 mellan klockan 18:00 & 21:00! Boknings nummer: '. $booking_id .' Antal platser: '. $booking_amount;

$headers = 'From: klass9solklintsskolan04@gmail.com';

//send email
mail($to_email, $subject, $message, $headers);
?>
