<?php
include "../db_connect.php";

$whished_booking_name = $_GET["name"];
$whished_booking_amount = $_GET["amount"];
$to_email = $_GET["email"];
$whished_booking_phonenumber = $_GET["phonenumber"];
$whished_booking_comment = $_GET["comment"];

$sql = "SELECT Whished_Booking_place FROM Whished_Bookings_table WHERE Whished_Booking_name LIKE '" . $whished_booking_name . "'
                                                  AND Whished_Booking_chairs LIKE '" . $whished_booking_amount . "'
                                                  AND Whished_Booking_email LIKE '" . $to_email . "'
                                                  AND Whished_Booking_phonenumber LIKE '" . $whished_booking_phonenumber . "'
                                                  AND Whished_Booking_comment LIKE '" . $whished_booking_comment . "'";
$result = $mysqli->query($sql);
$whished_booking_place = $result->fetch_assoc()["Whished_Booking_place"];

$message = '<html><body>';
$message .= '<h2>'. $whished_booking_name .' är nu placerad på Reservlistan till julbord i Cementa Arena den 1/12 mellan klockan 18:00 & 21:00! Plats i Reservlistan: '. $whished_booking_place .'</h2>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td><strong>Plats i Reservlistan:</strong> </td><td>" . strip_tags($whished_booking_place) . "</td></tr>";
$message .= "<tr><td><strong>Namn:</strong> </td><td>" . strip_tags($whished_booking_name) . "</td></tr>";
$message .= "<tr><td><strong>Platser:</strong> </td><td>" . strip_tags($whished_booking_amount) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($to_email) . "</td></tr>";
$message .= "<tr><td><strong>Mobilnummer:</strong> </td><td>" . strip_tags($whished_booking_phonenumber) . "</td></tr>";
$message .= "<tr><td><strong>Kommentar/Allergi:</strong> </td><td>" . strip_tags($whished_booking_comment) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

$subject = 'Klass 9 julbord bokning Reservlistan';

$headers = 'From: klass9solklintsskolan04@gmail.com';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//send email
mail($to_email, $subject, $message, $headers);
?>
