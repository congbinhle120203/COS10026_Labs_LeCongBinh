<?php
// header.inc - shared top of every page (Task 4)
// Set $page_title before including this file.
if (!isset($page_title)) {
    $page_title = "Lab 08";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Le Cong Binh">
  <title><?php echo htmlspecialchars($page_title); ?> | Lab 08</title>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($page_title); ?></h1>
  </header>
  <main>
