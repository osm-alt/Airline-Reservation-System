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
    <title>Login</title>

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
            width: 25rem;
            height: 25rem;
            border: 5px solid white;
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

        @keyframes coloredAnimation {
            0% {
                filter: hue-rotate(0deg);
            }

            100% {
                filter: hue-rotate(360);
            }
        }

        input[type=submit]:hover {
            cursor: pointer;
            color: black;
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
            margin-top: .5em;
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
                    <a class="active" href="login.html">Login</a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
        </nav>
    </header>


    <!-- <h1 class="title">Welcome to ROA Airlines!</h1> -->

    <fieldset style="margin: 1em; margin-top: 5em;">
        <legend style="margin-left: 2em;">Login</legend>
        <form method="post" action="login.php">


            <p><label>Username<input name="username" type="text" placeholder="Enter your username" required></p>

            <p><label>Password<input name="password" type="password" placeholder="Enter your Password" required></p>

            <input type="submit" name="submit" value="Login">
            <a class="forgotPassword" href="#">Forgot Password</a><br>
            <p class="register"> Dont have an account yet? <a href="register.html">Create your account</a></p>
            <input type="reset" value="Clear">
            </p>
        </form>
    </fieldset>


    <?php

    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $database = $client->Airline_Reservation;

    $admin_collection = $client->Airline_Reservation->Admin;

    $customer_collection = $client->Airline_Reservation->Customers;



    if (isset($_POST['submit'])) {

        $inputtedUsername = $_POST['username'];
        $inputtedPassword =  $_POST['password'];
        $flag = 0;
        // flag to check if login is successful


        // CUSTOMER LOGIN PART
        $CustomerResultCredentials = $customer_collection->find(['Username' => $inputtedUsername]);

        foreach ($CustomerResultCredentials as $searchFor) {

            $storedUsername = $searchFor['Username'];
            $storedPassword = $searchFor['Password'];


            // password_verify checks if the inputted password is = to the hashed password stored inside the database.
            if ($inputtedUsername == $storedUsername && password_verify($inputtedPassword, $storedPassword)) {
                // Valid credentials were intered: Admin will get access and be redirected to the Admin page UI
                $flag = 1;
                print("<script>window.alert('Welcome $inputtedUsername!')</script>");
                echo "<script> window.location.assign('main_page.html'); </script>";
            }
        }


        // ADMIN LOGIN PART
        $adminResultCredentials = $admin_collection->find(['Username' => $inputtedUsername]);

        foreach ($adminResultCredentials as $searchFor) {

            $storedUsername = $searchFor['Username'];
            $storedPassword = $searchFor['Password'];


            // password_verify checks if the inputted password is = to the hashed password stored inside the database.
            if ($inputtedUsername == $storedUsername && password_verify($inputtedPassword, $storedPassword)) {
                // Valid credentials were intered: Admin will get access and be redirected to the Admin page UI
                $flag = 1;
                // $_SESSION[''] ???
                print("<script>window.alert('Welcome Admin $inputtedUsername!')</script>");
                echo "<script> window.location.assign('admin.html'); </script>";

            }
        }

        // in case the user or admin inputs wrong credentials, flag is set to 0 this message is displayed
        if ($flag == 0) {
            print("<script>window.alert('Wrong username or password!')</script>");
            // echo "Wrong Credentials!";
        }
    }

    ?>

</body>

</html>