<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Week 07 Lab - Task 2 Days Array" />
  <meta name="keywords" content="PHP, arrays, days in a week" />
  <meta name="author" content="Le Cong Binh" />
  <title>PHP Variables, Arrays and Operators</title>
</head>
<body>
  <h1>PHP Variables, Arrays and Operators</h1>
<?php
  $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

  echo "<p>The days of the week in English are:<br />";
  echo "$days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6].</p>";

  $days[0] = "Dimanche";
  $days[1] = "Lundi";
  $days[2] = "Mardi";
  $days[3] = "Mercredi";
  $days[4] = "Jeudi";
  $days[5] = "Vendredi";
  $days[6] = "Samedi";

  echo "<p>The days of the week in French are:<br />";
  echo "$days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6].</p>";
?>
</body>
</html>