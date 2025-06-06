<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
</head>

<body class="contactbody">
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

        <section class="contact">
            <div class="contact-form">
                <h1>Contact <span>Us</span></h1>
                <p>We are always out there to help you! Fill out the form given below and get a reply from us within 2 business days.</p>
            <form action="../data/query.php" method="post">
                <input type="text" name="myname" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your E-mail" required>
                <input type="text" name="subject" placeholder="What brings you here?" required>
                <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <input type="submit" name="submit" value="Submit" class="submit-btn">
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

</body>
</html>
