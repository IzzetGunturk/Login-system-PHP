<?php
    include 'config.php';

    error_reporting(0);

    if (isset($_POST['submit'])) {
        $username2 = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities(md5($_POST['password']));
        $cpassword = htmlentities(md5($_POST['cpassword']));
    }

    if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username2', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username2 = "";
				$email = "";
				$password = "";
				$cpassword = "";
                header("Location: index.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} 
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">Register</div>
            <form action="" method="POST">
                <div class="row">
                    <input id="inputBox" type="username" name="username" placeholder="Username" value="<?php echo $username2; ?>" required>
                </div>
                <div class="row">
                    <input id="inputBox" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>
                <div class="row">
                    <input id="inputBox" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
                </div>
                <div class="row">
                    <input id="inputBox" type="password" name="cpassword" placeholder="Confirm password" value="<?php echo $cpassword; ?>" required>
                </div>
                <div class="row button">
                    <button id="buttonSubmit" type="submit" name="submit" value="Login">Register</button>
                </div> 
               <div class="signup-link">Already an account? <a id="hyperlink" href="index.php">Log in here</a></div>
            </form>
        </div>
    </div>

</body>

</html>