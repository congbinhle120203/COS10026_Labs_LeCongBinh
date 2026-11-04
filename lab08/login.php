<?php
// Task 4: login page uses include files, so it must be .php (not .html)
$page_title = "Login";
include "header.inc";
?>
    <?php if (isset($_GET["error"])) { ?>
      <p><strong>Invalid username or password. Please try again.</strong></p>
    <?php } ?>
    <form method="post" action="process.php">
      <p>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </p>
      <p>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </p>
      <!-- Hidden field: first initial + student ID -->
      <input type="hidden" name="token" value="B106419738">
      <p>
        <input type="submit" value="Login">
      </p>
    </form>
<?php include "footer.inc"; ?>
