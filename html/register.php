<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../user/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>booking</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body class="register-body">

    <nav>
        <img src="../img/logo.png" class="logo" alt="Logo" title="Travel Addicts">

        <ul class="navbar">
            <li>
                <a href="../website.php">Home</a>
                <a href="../website.php#locations">Locations</a>
                <a href="../website.php#package">Packages</a>
                <a href="./about.php">About Us</a>
                <a href="./contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>

    <section class="registration">
        <div class="register-form">
            <h1>booking <span>Here</span></h1>
            <form action="../data/booking.php" method="post">
                <input type="text" name="name" placeholder="Name" id="name" required>
                <input type="email" name="email" placeholder="Email-Id" id="" required>
                <input type="tel" name="phone" placeholder="Phone No." id="phonenum" required>
                <input type="number" name="age" placeholder="Age" id="" required>
                <h4>Gender</h4>
                <input type="radio" name="gender" value="Male" id="" required> Male &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" value="Female" id=""> Female
                <h4>Departure</h4>
                <input type="datetime-local" name="departure" id="" required>
                <h4>Return</h4>
                <input type="datetime-local" name="returndate" id="" required>
                <h4>Travel Destination</h4>
                <input type="radio" name="destination" value="Kashmir" id=""> Kashmir &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Istanbul" id=""> Istanbul &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Paris" id=""> Paris &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Bali" id=""> Bali &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Dubai" id=""> Dubai <br>
                <input type="radio" name="destination" value="Geneva" id=""> Geneva &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Port Blair" id=""> Port Blair &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Rome" id=""> Rome &nbsp; &nbsp; &nbsp;
                <input type="radio" name="destination" value="Gujarat" id=""> Gujarat &nbsp; &nbsp; &nbsp;
                <br> <br>
                <h4>Package</h4>
                <input type="radio" name="package" value="Bronze" id="loc1" required> Bronze &nbsp; &nbsp; &nbsp;
                <input type="radio" name="package" value="Silver" id="loc1"> Silver &nbsp; &nbsp; &nbsp;
                <input type="radio" name="package" value="Gold" id="loc1"> Gold &nbsp; &nbsp; &nbsp;
                <input type="radio" name="package" value="Platinum" id="loc1"> Platinum &nbsp; &nbsp; &nbsp;
                <br> <br>
                <input type="checkbox" name="t&c" id="" checked required> I accept the Terms & Conditions.
                <br> <br>
                <input type="submit" value="Submit" class="submitbtn">

            </form>
        </div>
    </section>

    
    <section class="footer">
        <div class="foot">
            <div class="footer-content">
    
                <div class="footlinks">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="./register.php">booking</a></li>
                        <li><a href="./about.php">About Us</a></li>
                        <li><a href="./contact.php">Contact Us</a></li>
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

    <script>
        function validateform() {
            var tel = document.getElementById("phonenum").value;

            if (tel.length < 10) {
                alert("Phone number must be of atleast 10 digits!");
                return false;
            } else if (isNaN(tel)) {
                alert("Phone number should not include character!");
                return false;
            }
            return true;
        }  
    </script>

</body>

</html>