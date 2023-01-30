<?php 
    include 'config.php';

    session_start();
    
    error_reporting(0);
    
    if (isset($_SESSION['username'])) {
        header("Location: welcome.php");
    }
    
    if (isset($_POST['submit'])) {
        $email = htmlentities($_POST['email']);
        $password = htmlentities(md5($_POST['password']));
    
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: welcome.php");
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
<div class="container">
    <div class="wrapper">
        <div class="title">Login</div>
            <form action="" method="POST">
                <div class="row">
                    <input id="inputBox" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="row">
                    <input id="inputBox" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="row button">
                    <button id="buttonSubmit" name="submit" class="btn">Login</button>
                </div>
                <div class="signup-link">Don't have account? <a id="hyperlink" href="register.php">Register here</a></div>
            </form>
    </div>
</div>

</body>

</html>