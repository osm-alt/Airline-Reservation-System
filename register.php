<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>

    <style>
        body {
            background-image: url("mainpics/login.jpg");
        }

        h1 {
            text-align: center;
            margin: 1em;
        }

        h2 {
            /* color: white; */
            font-weight: bold;
            font-size: 0.5rem;
        }

        p {
            /* color: white; */
            font-weight: 35;
            font-size: 1rem;
        }

        form p {
            margin-right: 1em;
        }

        form {
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
            padding-bottom: .3em;
            margin: 1em;
            /* border-style: solid; */
            border-width: 0.05em;
            border-radius: 0.5em;
        }

        fieldset {
            background: whitesmoke;
            width: 25em;
            height: 41rem;
            animation: flash_border 3s infinite;
        }


        @keyframes flash_border {
            0% {
                border-color: rgb(0, 115, 255);
            }

            50% {
                border-color: black;
            }

            100% {
                border-color: rgb(237, 239, 242);
            }
        }


        label {
            margin-left: 1rem;
        }

        div.form-elts {
            display: flex;
            flex-wrap: wrap;
        }

        input,
        button,
        select {
            display: block;
            width: 15rem;
            box-sizing: border-box;
            padding: .5em;
            margin: 1em;
        }

        input[type=submit] {
            width: 15rem;
            font-size: .9em;
            background-color: rgb(84, 201, 247);
            color: white;
            border-radius: .5em;
            margin-left: 1em;
            filter: hue-rotate(120deg);
            animation: coloredAnimation 3s infinite;
        }

        input[type=submit]:hover {
            cursor: pointer;
            color: black;
        }

        @keyframes coloredAnimation {
            0% {
                filter: hue-rotate(0deg);
            }

            100% {
                filter: hue-rotate(360);
            }
        }

        .forgotPassword {

            text-decoration: none;
            margin-left: 1em;
            /* font-size: 15px; */
        }

        a {
            text-decoration: none;
        }

        .register {
            font-size: small;
            margin-top: .1em;
            white-space: nowrap;
            text-decoration: none;
            margin-left: 1.1em;
            color: red;
        }
    </style>

</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="main_page.html">Home Page</a></li>
                <!-- Sub navigation menu -->
                <div class="subnav">
                    <li><a href="book_a_trip.html">Plan & Book <i class="fa fa-caret-down"></i></a></li>
                    <div class="subnav-content">
                        <li><a href="book_a_trip.html">Book a trip</a></li>
                        <li><a href="flight_schedule_search.html">Flight Schedule Search</a></li>
                        <li><a href="manage_booking.html">Manage Booking</a></li>
                        <li><a href="FlightStatus.html">Flight Status</a></li>
                    </div>
                </div>
                <div class="subnav">
                    <li><a href="PassengerServices.html">Services <i class="fa fa-caret-down"></i></a></li></button>
                    <div class="subnav-content">
                        <li><a href="PassengerServices.html">Passenger Services</a></li>
                        <li><a href="cargo.html">Cargo Services</a></li>
                        <li><a href="BaggageInfo.html">Baggage Info</a></li>
                        <li><a href="checkin.html">Check-in</a></li>
                    </div>
                </div>
                <li><a href="CovidRestrictions.html">Covid Restrictions</a></li>
                <li><a href="Faq.html">FAQ</a>
                <li><a class="active" href="login.html">Login/Register</a>
            </ul>

            <!-- hamburger menu, only essentiel links -->
            <div class="topnav">
                <a href="main_page.html" class="active">
                    <ion-icon name="airplane-outline"></ion-icon>
                </a>
                <div id="myLinks">
                    <a href="book_a_trip.html">Book a trip</a>
                    <a href="checkin.html">Check-in</a>
                    <a href="login.html">Login</a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
        </nav>
    </header>


    <!-- <h1 class="title">Welcome to ROA Airlines!</h1> -->

    <fieldset style="margin: 1em;">
        <legend style="margin-left: 2em;">Register</legend>
        <form method="post" action="register.php" id="registerForm" onsubmit="return validation();">

            <p><label>First Name<input name="firstname" id="Fname" type="text" placeholder="First Name" required></p>

            <p><label>Last Name<input name="lastname" id="Lname" type="text" placeholder="Last Name" required></p>

            <p><label>Username<input name="username" id="username" type="text" placeholder="Username" required></p>

            <p><label>Date of Birth<input name="dob" id="dob" type="date" placeholder="Last Name" required></p>


            <p><label>Email Address<input name="email" id="email" type="text" placeholder="Email Address" required></p>

            <p><label>Password<input name="password" id="Password" type="password" placeholder="Password" onsubmit="validation()" required></p>

            <span id="spanAlert"></span>

            <input type="submit" name="submit" value="Register">
            <input type="reset" value="Clear">
            <p class="register"> Already have an account? <a href="login.php">Login</a></p>

        </form>
    </fieldset>

    <script>
        function validation() {
            var input_password = document.getElementById("Password");
            var alert = document.getElementById("spanAlert");

            if (input_password.value.length < 8) {
                // alert("Password must have at least 8 characters!");
                alert.style.color = "red";
                alert.innerHTML = "Password must be at least 8 characters long!";
                return false;
            }
        }
    </script>

    <?php

    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $database = $client->Airline_Reservation;

    $customer_collection = $client->Airline_Reservation->Customers;



    if (isset($_POST['submit'])) {

        echo"here";

        $inputtedFirstName = $_POST['firstname'];
        $inputtedLastName = $_POST['lastname'];
        $inputtedUsername = $_POST['username'];
        $inputtedDOB =  $_POST['dob'];
        $inputtedEmail = $_POST['email'];
        $inputtedPassword = $_POST['password'];

        $flag = 0;


        // USERNAME IS UNIQUE, WE CANNOT ALLOW 2 USERS TO HAVE THE SAME ONE!
        // $usernameResult = $customer_collection->find(['Username' => $inputtedUsername]);

        // foreach ($usernameResult as $searchFor) {
        //     $storedUsername = $searchFor['Username'];
        //     if ($inputtedUsername == $storedUsername)
        //     {
        //         $flag=1;
        //     }
        // }

        // if($flag==1)
        // {
        //     echo " SIUUUUUUUUUUUUUUUUUUUUUUUU";
        //     print("<script>window.alert('Username already exists! Please choose another one.');
        //     window.reload();
        //     </script>");
        // }




        $newCustomer = [
            [
                'Username' => $inputtedUsername,
                'First_Name' => $inputtedFirstName,
                'Last_Name' => $inputtedLastName,
                'Date_Of_Birth' => $inputtedDOB,
                'Cookie' => '',
                'Email' => $inputtedEmail,
                // 'Password' => password_hash('$inputtedPassword', PASSWORD_DEFAULT),
                // 'Password1' => password_hash($inputtedPassword, PASSWORD_DEFAULT),
                'Password' => password_hash('pass_w0rd912', PASSWORD_DEFAULT)


                // 'Password' => $inputtedPassword,

            ],
        ];

        $insertResult = $customer_collection->insertOne($newCustomer);


        print("<script>window.alert('Successfuly register $inputtedUsername in the database. You can now Login')</script>");
    }

    ?>


</body>

</html>