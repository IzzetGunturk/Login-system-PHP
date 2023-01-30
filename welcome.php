<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">Logged in</div>
            <div class="messageLoggedIn">
                <p class="welcomeMessage">Welcome</p>
                <p class="phpMessage"><?php echo " " . $_SESSION['username']; ?></p>
            </div>
            <div class="logout-link"><a id="hyperlink" href="logout.php">Log out</a></div>
        </div>
    </div>
</body>
</html>