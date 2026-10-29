<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Rohirrim Tour Booking Confirmation" />
  <meta name="keywords" content="MiddleEarth, Tours, Rohan, Confirmation" />
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

  $tour = "";
  if (isset($_POST["accom"])) {
    $tour = $tour . "Accommodation ";
  }
  if (isset($_POST["4day"])) {
    if ($tour != "") {
      $tour = $tour . "and ";
    }
    $tour = $tour . "Four-day tour ";
  }
  if (isset($_POST["10day"])) {
    if ($tour != "") {
      $tour = $tour . "and ";
    }
    $tour = $tour . "Ten-day tour ";
  }
  if ($tour == "") {
    $tour = "no tours";
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
  echo "You are now booked on the $tour<br />";
  echo "Species: $species<br />";
  echo "Age: $age<br />";
  echo "Meal Preference: $food<br />";
  echo "Number of travellers: $partysize</p>";
?>
</body>
</html>