<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Le Cong Binh">
  <title>Lab 09 - Cars</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Used Car Dealership</h1>
    <nav>
      <a href="cars.php">All cars</a>
      <a href="search_form.php">Search</a>
    </nav>
  </header>
  <main>
    <h2>All cars</h2>
<?php
// Task 6: connect to the database
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p class=\"message\">Database connection failure: "
        . htmlspecialchars(mysqli_connect_error()) . "</p>";
} else {
    // Task 7: read and print the data
    $sql = "SELECT * FROM cars";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>\n";
        echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>\n";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['make']) . "</td>";
            echo "<td>" . htmlspecialchars($row['model']) . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>\n";
        }
        echo "</table>\n";
        mysqli_free_result($result);
    } else {
        echo "<p class=\"message\">There are no cars to display.</p>\n";
    }
    mysqli_close($conn);
}
?>
  </main>
  <footer>
    <p>Le Cong Binh - 106419738 - COS10026 Lab 09</p>
  </footer>
</body>
</html>
