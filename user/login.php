<?php
$login = false;
$showError = false;
$wrongemail = false;
$wrongpassword = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require('../required-file/dbconnection.php');

    $email = $_POST["email"];
    $password = $_POST["password"];


  
    $sql = "Select * from user where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $sql = "Select * from user where email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
               
                header("location: ../website.php");
            }
        } else {
            $wrongpassword = true;
        }
    } else {
        $wrongemail = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script>
        function validateForm() {
            var email = document.forms["login"]["email"].value;
            var password = document.forms["login"]["password"].value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }
            if (password == "") {
                alert("Password must be filled out");
                return false;
            }
            return true; 
        }
    </script>
</head>

<body>
    <nav>
        <img src="../img/logo.png" class="logo" alt="Logo" title="Travel Addicts">

        <ul class="navbar">
            <li>
                <a href="../website.php">Home</a>
                <a href="../website.php#locations">Locations</a>
                <a href="../website.php#package">Packages</a>
                <a href="../html/about.php">About Us</a>
                <a href="../html/contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>

    <div class="wrapper">

        <div class="form-box">
            <form action="login.php" method="post" class="login-container" id="login" onsubmit="return validateForm()">
                <div class="top">
                    <span>Don't have an account? <a href="sighup.php" onclick="">Sign Up</a></span>
                    <header>Login</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Username or Email" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="../otp/email.php">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="footer">
        <div class="foot">
            <div class="footer-content">
                <div class="footlinks">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../html/register.php">booking</a></li>
                        <li><a href="../html/about.php">About Us</a></li>
                        <li><a href="../html/contact.php">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footlinks">
                    <h4>Connect</h4>
                    <div class="social">
                        <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="end">
        <p>Copyright © 2022 Travel Addicts All Rights Reserved.<br>Website developed by: Satyapalsinh & Vihar</p>
        </div>
    </section>

    <?php
    if ($wrongemail == true) {
        echo '<script> alert("Wrong Email!!"); </script> ';
    }
    if ($wrongpassword == true) {
        echo '<script> alert("Wrong password!!"); </script> ';
    }
    ?>

</body>

</html>