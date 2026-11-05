<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
$page_title = "Welcome";
include "header.inc";
?>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?>! You are logged in.</p>
    <p>Your token from the hidden field: <?php echo htmlspecialchars($_SESSION["token"]); ?></p>
<?php include "footer.inc"; ?>
