<?php
session_start();
$username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$token    = isset($_POST["token"]) ? $_POST["token"] : "";

if ($username === "cbl" && $password === "106419738") {
    $_SESSION["user"]  = $username;
    $_SESSION["token"] = $token;
    header("Location: welcome.php");
} else {
    header("Location: login.php?error=1");
}
exit();
?>
