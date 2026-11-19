<?php
// logout.php - end the session and go back to the login page (Le Cong Binh, 106419738)
session_start();
session_unset();      // remove $_SESSION['username']
session_destroy();    // delete the session on the server
header("Location: login.php?loggedout=1");
exit();
?>
