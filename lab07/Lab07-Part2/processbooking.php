<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Rohirrim Tour Booking Confirmation" />
  <meta name="keywords" content="middleEarth, tours, rohan, confirmation" />
  <meta name="author" content="Le Cong Binh" />
  <title>Booking Confirmation</title>
</head>
<body>
  <h1>Rohirrim Tour Booking Confirmation</h1>
<?php
  if (isset($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
  } else {
    $firstname = "";
  }

  if (isset($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
  } else {
    $lastname = "";
  }

  if (isset($_POST["age"])) {
    $age = $_POST["age"];
  } else {
    $age = "";
  }

  if (isset($_POST["species"])) {
    $species_code = $_POST["species"];
    if ($species_code == "M") {
      $species = "Human";
    } elseif ($species_code == "D") {
      $species = "Dwarf";
    } elseif ($species_code == "E") {
      $species = "Elf";
    } elseif ($species_code == "H") {
      $species = "Hobbit";
    } else {
      $species = $species_code;
    }
  } else {
    $species = "Unknown";
  }

  $tour_list = array();
  if (isset($_POST["accom"])) {
    $tour_list[] = "Accommodation";
  }
  if (isset($_POST["4day"])) {
    $tour_list[] = "Four-day tour";
  }
  if (isset($_POST["10day"])) {
    $tour_list[] = "Ten-day tour";
  }

  if (count($tour_list) == 0) {
    $tour_message = "You are not booked on any tours.";
  } else {
    if (count($tour_list) == 1) {
      $tour_message = "You are now booked on the " . $tour_list[0];
    } elseif (count($tour_list) == 2) {
      $tour_message = "You are now booked on the " . $tour_list[0] . " and " . $tour_list[1];
    } else {
      $tour_message = "You are now booked on the " . $tour_list[0] . ", " . $tour_list[1] . " and " . $tour_list[2];
    }
  }

  if (isset($_POST["food"])) {
    $food = $_POST["food"];
  } else {
    $food = "none";
  }

  if (isset($_POST["bookday"])) {
    $bookday = $_POST["bookday"];
  } else {
    $bookday = "";
  }

  if (isset($_POST["partysize"])) {
    $partysize = $_POST["partysize"];
  } else {
    $partysize = "";
  }

  echo "<p>Welcome $firstname $lastname !<br />";
  echo "$tour_message<br />";
  echo "Species: $species<br />";
  echo "Age: $age<br />";
  echo "Meal Preference: $food<br />";
  echo "Number of travellers: $partysize</p>";
?>
</body>
</html>