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
	   $new_booking_name = $_GET["newBookingName"];
	   $new_booking_amount = $_GET["newBookingAmount"];
     $new_booking_email = $_GET["newBookingEmail"];
		 $new_booking_comment = $_GET["newBookingComment"];
		 $new_booking_comment = trim($new_booking_comment, " ");
		 if ($new_booking_comment == "")
		 {
			 $new_booking_comment = "Ingen kommentar/allergi angiven.";
		 }
  ?>

  <div class="content">
    <div class="table-top">
      <h1>Bekräfta bokning<h1>
      <hr>
    </div>

    <div class="table">
      <?php
      echo "<h2>För- & efternamn: $new_booking_name</h2>";
      echo "<h2>Antal personer: $new_booking_amount</h2>";
      echo "<h2>E-post: $new_booking_email</h2>";
			echo "<h2>Kommentar/Allergi: $new_booking_comment</h2>";
      ?>

      <div class="buttons">
        <form method="get" action="booking_index.php">
          <input class="button" id="cancel-button" type="submit" value="Avbryt bokning">
        </form>
        <form method="get" action="add_booking.php">
          <input type="hidden" name="name" value="<?php echo $new_booking_name; ?>">
          <input type="hidden" name="amount" value="<?php echo $new_booking_amount; ?>">
          <input type="hidden" name="email" value="<?php echo $new_booking_email; ?>">
					<input type="hidden" name="comment" value="<?php echo $new_booking_comment; ?>">
          <input class="button" id="confirm-button" type="submit" value="Bekräfta bokning">
        </form>
      </div>
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
