<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Le Cong Binh">
  <title>Lab 09 - Search cars</title>
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
    <h2>Search for a car model</h2>
    <!-- GET is used for a search: it only reads data and the URL can be bookmarked -->
    <form action="search_result.php" method="get">
      <label for="model">Model:</label>
      <input type="text" id="model" name="model" placeholder="e.g. Corolla">
      <input type="submit" value="Search">
    </form>
  </main>
  <footer>
    <p>Le Cong Binh - 106419738 - COS10026 Lab 09</p>
  </footer>
</body>
</html>
