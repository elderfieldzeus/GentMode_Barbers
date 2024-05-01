<?php
    session_start();
    require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GentMode Barbers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/svg.css">
</head>

<body>
    <!-- LANDING PAGE -->
    <section class="landing_page">
<!-- NAV BAR -->
<nav>
    <img id="logo" src="../assets/images/logo.png" alt="GentMode Barbers Logo">

    <!-- anchor tags -->
    <div class="anchors">
        <a href="#" id="home_anchor">Home</a>
        <a href="#" id="services_anchor">Services</a>
        <a href="#" id="about_anchor">About</a>
        <a href="#" id="contact_anchor">Contact</a>
    </div>

            <!-- Dropdown container -->
            <div class="dropdown">
                <!-- Font Awesome user icon -->
                <i class="fas fa-user"></i>
                <!-- Dropdown content -->
                <div class="dropdown-content">
                    <a href="../pages/logout.php">Logout</a>
                </div>
            </div>

    <button id="book_button" type="button">Book Now</button>
</nav>


        <!-- COMPANY NAME -->
        <p id="company_name">GENTMODE</br>BARBER</p>
    </section>

    <!-- SERVICE PAGE -->
    <section class="service_page">
        <!-- left header -->
        <div class="our_services">
            <p id="p1">OUR HANDLING</p>
            <p id="p2">OUR SERVICES</p>
        </div>

        <!-- VIEW MORE -->
        <button id="view_more" type="button">VIEW MORE</button>

        <!-- SERVICES -->
        <div class="services">
            <!-- CARD TEMPLATE -->
            <div class="card card1">
                <!-- image -->
                <img src="../assets/images/shave.png" alt="GentMode Shave">

                <!-- content -->
                <div class="content">
                    <p class="title">Shave</p>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>

                <!-- icon w/shadow-->
                <div class="icon_container">
                    <div class="icon">
                        <span class="razor_svg"></span>
                    </div>
                    <div class="shadow"></div>
                </div>
            </div>

            <div class="card card2">
                <!-- image -->
                <img src="../assets/images/shave.png" alt="GentMode Shave">

                <!-- content -->
                <div class="content">
                    <p class="title">Shave</p>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>

                <!-- icon w/shadow-->
                <div class="icon_container">
                    <div class="icon">
                        <span class="razor_svg"></span>
                    </div>
                    <div class="shadow"></div>
                </div>
            </div>

            <div class="card card3">
                <!-- image -->
                <img src="../assets/images/shave.png" alt="GentMode Shave">

                <!-- content -->
                <div class="content">
                    <p class="title">Shave</p>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>

                <!-- icon w/shadow-->
                <div class="icon_container">
                    <div class="icon">
                        <span class="razor_svg"></span>
                    </div>
                    <div class="shadow"></div>
                </div>
            </div>

            <div class="card card4">
                <!-- image -->
                <img src="../assets/images/shave.png" alt="GentMode Shave">

                <!-- content -->
                <div class="content">
                    <p class="title">Shave</p>
                    <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div>

                <!-- icon w/shadow-->
                <div class="icon_container">
                    <div class="icon">
                        <span class="razor_svg"></span>
                    </div>
                    <div class="shadow"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHAT IS GENTMODE -->
    <section class="what_is_gentmode">
        <div class="filter">
            <p>WHAT IS GENTMODE BARBER?</p>
        </div>
    </section>

    <!-- OUR STORY -->
    <section class="our_story">
        <!-- about pic -->
        <img src="../assets/images/about_pic.jpg" alt="GentMode Cut">

        <div class="story">
            <p class="title">Our Story</p>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a euismod orci. Vestibulum hendrerit dapibus consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam sit amet mi vitae augue
                pulvinar pulvinar quis luctus nibh. Etiam mattis felis id justo hendrerit, ac interdum magna rutrum. Nunc eget sollicitudin eros. Nunc sed dapibus felis. Suspendisse tristique semper feugiat. Maecenas et ornare massa. Curabitur laoreet
                risus sed diam gravida blandit. Phasellus eget ex vestibulum, dapibus magna eget, pharetra odio. In nec dui sit amet ligula venenatis vehicula. Fusce tortor nisl, scelerisque quis arcu eu, fermentum condimentum libero. Donec quis sodales
                eros. Integer laoreet arcu id quam finibus fermentum. Fusce consectetur odio non urna posuere interdum.</p>
        </div>
    </section>

    <!-- CONTACT US -->
    <section class="contact_us">
        <!-- form container -->
        <div class="form_container">
            <!-- actual form -->
            <form class="contact_form" action="../pages/process.php" method="post">
                <label for="name">fullname (family name, first name, middle name) :</label>
                <input id="name" type="text" name="fullname">
                <label for="email">email address : </label>
                <input id="email" type="email" name="email">
                <label for="number">Subject :</label>
                <input id="number" type="text" name="subject">
                <label for="message">message:</label>
                <textarea name="message" id="message" rows="2"></textarea>
                <input type="submit" id="form_submit" value="SUBMIT" name="submit">
            </form>
            <!-- social media -->
            <div class="socials">
                <div class="social_container">
                    <span class="facebook_svg"></span>
                    <p class="title">GENT MODE BARBERS</p>
                </div>
                <div class="social_container">
                    <span class="instagram_svg"></span>
                    <p class="title">GENTMODEBARBERS</p>
                </div>
                <div class="social_container">
                    <span class="location_svg"></span>
                    <p class="title">3 Juana Osmeña St,<br> Baseline, Cebu City,<br> 6000 Cebu, Cebu<br> City, Philippines,<br> 6000
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER ONE -->
    <section class="footer_one">
        <!-- information, service, contact -->
        <div class="topic_container">
            <div class="topic">
                <p class="title">Information</p>
                <p class="subtopic">About</p>
                <p class="subtopic">Services</p>
                <p class="subtopic">Contact</p>
            </div>

            <div class="topic">
                <p class="title">Services</p>
                <p class="subtopic">Haircut</p>
                <p class="subtopic">Shave</p>
                <p class="subtopic">Hair Treatment</p>
            </div>

            <div class="topic">
                <p class="title">Contact</p>
                <p class="subtopic">Phone: (+63) 998 570 2003</p>
                <p class="subtopic">email: email@domain.com</p>
                <p class="subtopic">Monday - Friday: 10AM - 8PM<br>Saturday - Sunday: 9AM - 9PM</p>
            </div>

            <div class="topic">
                <p class="title">Sign up for our Newsletter</p>
                <p class="subtopic">Get offers and discounts to your inbox</p>

                <!-- newsletter form -->
                <form class="newsletter_form" action="submit">
                    <input id="email" type="email" placeholder="Your Email Address*">
                    <button id="subscribe_button" type="submit">SUBSCRIBE</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER TWO -->
    <section class="footer_two">
        <p>Copyright © 2024 - GentMode Barbers.</p>
        <p id="created_by">Created by Elderfield, Montera & Rondina</p>
        <!-- insert socials if necessary -->
        <p>socials</p>
    </section>

</body>

</html>