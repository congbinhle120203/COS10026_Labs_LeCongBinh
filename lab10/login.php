<?php
/*
  login.php - Week 10 lab: log in with the username and password in the user table
  Le Cong Binh (106419738)

  The same page shows the form (GET) and checks the login (POST).
  GenAI: assisted by Claude (Anthropic), reviewed and tested by me. Prompt: "Week 10 profile edit lab"
*/
session_start();

// Already logged in? Go straight to the profile page.
if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? "");
    $password = trim($_POST['password'] ?? "");

    if ($username === "" || $password === "") {
        $error = "Please enter both username and password.";
    } else {
        require_once "settings.php";
        mysqli_report(MYSQLI_REPORT_OFF);              // check errors ourselves
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            $error = "Cannot connect to the database. Is MySQL running?";
        } else {
            // Prepared statement: the username is sent separately from the SQL
            $stmt = mysqli_prepare($conn, "SELECT username, password FROM user WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);        // null if no such user
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            if ($row && $row['password'] === $password) {
                session_regenerate_id(true);           // new session id after login
                $_SESSION['username'] = $row['username'];
                header("Location: profile.php");
                exit();
            }
            $error = "Wrong username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Lab 10</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Login</h1>

<?php if ($error !== "") { ?>
  <p class="message"><?php echo htmlspecialchars($error); ?></p>
<?php } ?>
<?php if (isset($_GET['loggedout'])) { ?>
  <p class="message success">You have logged out.</p>
<?php } ?>

  <form action="login.php" method="post">
    <p>
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
    </p>
    <p>
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
    </p>
    <p><input type="submit" value="Login"></p>
  </form>
</body>
</html>
