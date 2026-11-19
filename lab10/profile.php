<?php
/*
  profile.php - Week 10 lab: show the logged-in user's details and let them edit the email
  Le Cong Binh (106419738)
  GenAI: assisted by Claude (Anthropic), reviewed and tested by me. Prompt: "Week 10 profile edit lab"
*/
session_start();

// 1. Session check: only logged-in users can see this page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// 2. Read the current details from the database
require_once "settings.php";
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
$details = null;

if ($conn) {
    $stmt = mysqli_prepare($conn, "SELECT username, email FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
    mysqli_stmt_execute($stmt);
    $details = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// ?edit=1 in the URL shows the edit form (the "Edit" link sets it)
$editing = isset($_GET['edit']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Profile - Lab 10</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>My Profile</h1>

<?php if (isset($_GET['updated'])) { ?>
  <p class="message success">Your email has been updated.</p>
<?php } elseif (isset($_GET['error'])) { ?>
  <p class="message">Please enter a valid email address.</p>
<?php } ?>

<?php if (!$details) { ?>
  <p class="message">Your details could not be loaded. Please try again later.</p>
<?php } else { ?>
  <!-- 3. Current details -->
  <dl class="details">
    <dt>Username</dt>
    <dd><?php echo htmlspecialchars($details['username']); ?></dd>
    <dt>Email</dt>
    <dd>
      <?php echo htmlspecialchars($details['email']); ?>
<?php   if (!$editing) { ?>
      <a href="profile.php?edit=1">Edit</a>
<?php   } ?>
    </dd>
  </dl>

<?php   if ($editing) { ?>
  <!-- 4. Edit Profile section: sends the new email to update_profile.php -->
  <section>
    <h2>Edit Profile</h2>
    <form action="update_profile.php" method="post">
      <p>
        <label for="email">New email</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($details['email']); ?>">
      </p>
      <p>
        <input type="submit" value="Save">
        <a href="profile.php">Cancel</a>
      </p>
    </form>
  </section>
<?php   } ?>
<?php } ?>

  <p><a href="logout.php">Log out</a></p>
</body>
</html>
