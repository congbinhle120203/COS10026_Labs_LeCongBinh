<?php
// Task 2: check the login and start a session
session_start();

$username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$token    = isset($_POST["token"]) ? $_POST["token"] : "";

if ($username === "Binh" && $password === "106419738") {
    $_SESSION["user"]  = $username;
    $_SESSION["token"] = $token;      // keep the hidden-field value too
    header("Location: welcome.php");
} else {
    header("Location: login.php?error=1");   // back to the login page with an error
}
exit();
?>
