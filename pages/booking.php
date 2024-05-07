<?php
    if(isset($_POST['submit'])){
        include "./connection.php";
        $username = $_POST['name'];
        $location = $_POST['location'];
        $email = $_POST['email'];
        $phone = $_POST['number'];
        $date = $_POST['day'];
        $time = $_POST['time'];
        $service = $_POST['service'];
        
        $sql = "INSERT INTO booking(name, location, email, number, day, time, service) VALUES ('$username','$location','$email','$phone','$date','$time','$service')";

        if(mysqli_query($conn, $sql)){
            echo '<script>alert("Booking successful!"); window.location.href = "./home.php";</script>';
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="../style/booking.css">
</head>
<body>
    <img id="logo" src="../assets/images/logo.png" alt="GentMode Barbers Logo">
    <nav>
        <!-- anchor tags -->
        <div class="anchors">
            <a href="./home.php" id="home_anchor">Home</a>
            <a href="./home.php" id="services_anchor">Services</a>
            <a href="./home.php" id="about_anchor">About</a>
            <a href="./home.php" id="contact_anchor">Contact</a>
        </div>
    </nav>
    <div class="container">
        <div id="booking-form">
            <h2>Book Now</h2>
            <form id="booking-form-content" class="clearfix" method="post" action="booking.php">
                <div class="left-div">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number" id="number" name="number" required maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                    </div>
                </div>
                <div class="right-div">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select id="location" name="location" required>
                            <option value="Location">Select a Branch</option>
                            <option value="Lilo-an">Lilo-an Branch</option>
                            <option value="Lacion">Consolation Branch</option>
                            <option value="Mandaue">Mandaue Branch</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day">Preferred Day</label>
                        <input type="date" id="day" name="day" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Preferred Time</label>
                        <select id="time" name="time" required>
                            <option value="tim">Select Time</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="1:00 PM">1:00 PM</option>
                            <option value="2:00 PM">2:00 PM</option>
                            <option value="3:00 PM">3:00 PM</option>
                            <option value="4:00 PM">4:00 PM</option>
                            <option value="5:00 PM">5:00 PM</option>
                            <option value="6:00 PM">6:00 PM</option>
                            <option value="7:00 PM">7:00 PM</option>
                            <option value="8:00 PM">8:00 PM</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label for="service">Type of Service</label>
                    <select id="service" name="service" required>
                        <option value="ser">Select service</option>
                        <option value="Gentmode Cut">GENTMODE CUT</option>
                        <option value="Bald Cut">BALD CUT</option>
                        <option value="Gentmode Cut w/ Treatment">GENTMODE CUT WITH HAIR TREATMENT</option>
                        <option value="Gentmode Cut w/ Haircolor">GENTMODE CUT WITH HAIRCOLOR</option>
                        <option value="Hair Color">COLORING (HAIR DYE)</option>
                        <option value="Gentmode Shave">GENTMODE SHAVE</option>
                        <option value="Gentmode Cut and Shave">GENTMODE CUT AND SHAVE</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
        <div id="summary-container">
            <div id="summary"></div>
        </div>
    </div>

    <script>
        function formatTime(time) {
            var splitTime = time.split(":");
            var hours = parseInt(splitTime[0]);
            var minutes = splitTime[1];

            var meridiem = hours >= 12 ? "PM" : "AM";

            hours = hours % 12;
            hours = hours ? hours : 12;

            return hours + ":" + "00" + " " + meridiem;
        }

        // document.getElementById("booking-form-content").addEventListener("submit", function(event) {
        //     //event.preventDefault();

        //     // Validate name
        //     var name = document.getElementById("name").value;
        //     if (!name) {
        //         alert("Please enter your name.");
        //         return;
        //     }

        //     // Validate email
        //     var email = document.getElementById("email").value;
        //     if (!email) {
        //         alert("Please enter your email address.");
        //         return;
        //     }

        //     // Validate phone number length
        //     var phoneNumber = document.getElementById("number").value;
        //     if (phoneNumber.length !== 11) {
        //         alert("Please enter a valid 11-digit phone number.");
        //         return;
        //     }

        //     // Validate location
        //     var location = document.getElementById("location").value;
        //     if (!location) {
        //         alert("Please select a location.");
        //         return;
        //     }

        //     // Validate preferred day
        //     var day = document.getElementById("day").value;
        //     if (!day) {
        //         alert("Please select a preferred day.");
        //         return;
        //     }

        //     // Validate preferred time
        //     var time = document.getElementById("time").value;
        //     if (!time) {
        //         alert("Please select a preferred time.");
        //         return;
        //     }

        //     // Validate service
        //     var service = document.getElementById("service").value;
        //     if (service === "ser") {
        //         alert("Please select a service.");
        //         return;
        //     }
            
        //     var formData = new FormData(this);
        //     var summary = "<h2>Booking Summary</h2>";
        //     formData.forEach(function(value, key) {
        //         var capitalizedKey = key.charAt(0).toUpperCase() + key.slice(1);
        //         if (key === 'time') {
        //             value = formatTime(value);
        //         }
        //         summary += "<p><strong>" + capitalizedKey + ":</strong> " + value + "</p>";
        //     });
        //     document.getElementById("summary").innerHTML = summary;

        //     document.getElementById("booking-form").style.display = "none";
        //     document.getElementById("summary-container").style.display = "block";
        // });
    </script>
</body>
</html>