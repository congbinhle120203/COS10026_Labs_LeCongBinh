<?php
/*
  update_profile.php - Week 10 lab: save the new email with an SQL UPDATE
  Le Cong Binh (106419738)
  This page shows nothing: it updates the database, then redirects to profile.php.
  GenAI: assisted by Claude (Anthropic), reviewed and tested by me. Prompt: "Week 10 profile edit lab"
*/
session_start();

// Only a logged-in user, sending the form with POST, can update
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['email'])) {
    header("Location: profile.php");
    exit();
}

// Check the email on the server
$email = trim($_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
    header("Location: profile.php?edit=1&error=email");
    exit();
}

require_once "settings.php";
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    header("Location: profile.php?error=db");
    exit();
}

// SQL UPDATE with a prepared statement; WHERE uses the username from the
// session, so a user can only change their own row
$stmt = mysqli_prepare($conn, "UPDATE user SET email = ? WHERE username = ?");
mysqli_stmt_bind_param($stmt, "ss", $email, $_SESSION['username']);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Back to the profile page, which now reads the new email
header("Location: profile.php?updated=1");
exit();
?>
