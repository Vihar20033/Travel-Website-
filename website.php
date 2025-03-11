<?php

session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
    $loggedin = false;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Travel Addicts</title>
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

  

    <div class="banner">
        <video src="./img/bgvid.mp4" type="video/mp4" autoplay muted loop></video>

    
        <div class="content" id="home">
            <nav>
                <img src="./img/logo.png" class="logo" alt="Logo" title="Travel Addicts">

                <ul class="navbar">
                    <li>
                        <a href="#home">Home</a>
                        <a href="#locations">Locations</a>
                        <a href="#package">Packages</a>
                        <a href="html/about.php">About Us</a>
                        <a href="html/contact.php">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <div class="title">
                <h1>Travel Addicts</h1>
                <p>Plan your trip with us and travel around the world with the most affordable packages!</p>
                <a href="html/register.php" class="button">Booking Now!</a>
            </div>
        </div>
    </div>

  

    <section class="container">
        <div class="text">
            <h2>We have the best services available for you!</h2>
        </div>
        <div class="rowitems">
            <div class="container-box">
                <div class="container-image">
                    <img src="./img/1a.jpg" alt="Flight Services">
                </div>
                <h4>Flight Services</h4>
                <p>Arrival and Departure</p>
            </div>

            <div class="container-box">
                <div class="container-image">
                    <img src="./img/2a.jpg" alt="Food Services">
                </div>
                <h4>Food Services</h4>
                <p>Catering</p>
            </div>

            <div class="container-box">
                <div class="container-image">
                    <img src="./img/3a.jpg" alt="Travel Services">
                </div>
                <h4>Travel Services</h4>
                <p>Pick-up/drop</p>
            </div>

            <div class="container-box">
                <div class="container-image">
                    <img src="./img/4a.jpg" alt="Hotel Services">
                </div>
                <h4>Hotel Services</h4>
                <p>Check-in/out</p>
            </div>

        </div>

        </div>

    </section>

    

    <section class="locations" id="locations">
        <div class="package-title">
            <h2>Locations</h2>
        </div>

        <div class="location-content">

            <a href="html/locations/gujarat.php" target="_blank">
                <div class="col-content">
                    <img src="./img/l1.jpg" alt="">
                    <h5>India</h5>
                    <p>Gujarat</p>
                </div>
            </a>



            <a href="html/locations/Kanagawa.php" target="_blank">
                <div class="col-content">
                    <img src="./img/l2.jpg" alt="">
                    <h5>Japan</h5>
                    <p>Kanagawa</p>
                </div>
            </a>

            <a href="html/locations/Paris.php" target="_blank">
                <div class="col-content">
                    <img src="./img/l3.jpg" alt="">
                    <h5>France</h5>
                    <p>Paris</p>
                </div>
            </a>

            <a href="html/locations/Cologne.php" target="_blank">
                <div class="col-content">
                    <img src="./img/l4.jpg" alt="">
                    <h5>Germany</h5>
                    <p>Cologne</p>
                </div>
            </a>

            <a href="html/locations/Dubai.php" target="_blank">
                <div class="col-content">
                    <img src="./img/l5.jpg" alt="">
                    <h5>United Arab Emirates</h5>
                    <p>Dubai</p>
                </div>
            </a>

            <a href="html/locations/NewYork.php" target="_blank">
                <div class="col-content">
                    <img src="./img/l6.jpg" alt="">
                    <h5>Usa</h5>
                    <p>New York</p>
                </div>
            </a>

            <a href="html/locations/PortBlair.php" target="_blank">
                <div class="col-content">
                    <img src="./img/t7.jpg" alt="">
                    <h5>Andaman & Nicobar</h5>
                    <p>Port Blair</p>
                </div>
            </a>

            <a href="html/locations/Rome.php" target="_blank">
                <div class="col-content">
                    <img src="./img/t8.jpg" alt="">
                    <h5>Italy</h5>
                    <p>Rome</p>
                </div>
            </a>

        </div>
    </section>

    

    <section class="package" id="package">
        <div class="package-title">
            <h2>Packages</h2>
        </div>

        <div class="package-content">

            <div class="box">
                <div class="image">
                    <img src="./img/p1.jpg" alt="">
                    <h3>Rs.9,999/-</h3>
                </div>

                <div class="dest-content">
                    <div class="location">
                        <h4>Bronze</h4>
                        <ul class="pac-details">
                            <li>2 Star Hotel</li>
                            <li>5 Nights Stay</li>
                            <li>Free photo Session</li>
                            <li>Friendly Tour Guide</li>
                            <li>24/7 Customer Help Center</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="./img/p2.jpg" alt="">
                    <h3>Rs.19,999/-</h3>
                </div>

                <div class="dest-content">
                    <div class="location">
                        <h4>Silver</h4>
                        <ul class="pac-details">
                            <li>3 Star Hotel</li>
                            <li>7 Nights Stay</li>
                            <li>Free photo Session</li>
                            <li>Friendly Tour Guide</li>
                            <li>24/7 Customer Help Center</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="./img/p3.jpg" alt="">
                    <h3>Rs.29,999/-</h3>
                </div>

                <div class="dest-content">
                    <div class="location">
                        <h4>Gold</h4>
                        <ul class="pac-details">
                            <li>4 Star Hotel</li>
                            <li>10 Nights Stay</li>
                            <li>Breakfast and Dinner</li>
                            <li>Free photo Session</li>
                            <li>Friendly Tour Guide</li>
                            <li>24/7 Customer Help Center</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="./img/p4.jpg" alt="">
                    <h3>Rs.39,999/-</h3>
                </div>

                <div class="dest-content">
                    <div class="location">
                        <h4>Platinum</h4>
                        <ul class="pac-details">
                            <li>5 Star Hotel</li>
                            <li>14 Nights Stay</li>
                            <li>Breakfast, Lunch and Dinner</li>
                            <li>Bornfire</li>
                            <li>Free photo Session</li>
                            <li>Friendly Tour Guide</li>
                            <li>24/7 Customer Help Center</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </section>

   

    <section class="newsletter">
        <div class="newstext">
            <h2>Newsletter</h2>
            <p>Login to get offers and latest<br>updates every week!</p>
        </div>

        <div class="send">
            <?php
            if(!$loggedin)
            {
                echo '<form action="user/login.php">
                    <input type="submit" value="login">
                </form>';
            }    

            if($loggedin)
            {
                echo '<form action="user/logout.php">
                    <input type="submit" value="logout">
                </form>';
            } 
            ?>
        </div>

    </section>


    <section class="footer">
        <div class="foot">
            <div class="footer-content">

                <div class="footlinks">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="html/register.php">booking</a></li>
                        <li><a href="html/about.php">About Us</a></li>
                        <li><a href="html/contact.php">Contact Us</a></li>
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



</body>

</html>