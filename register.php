<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
            /* margin: 1em; */
            /* border-style: solid; */
            border-width: 0.05em;
            border-radius: 0.5em;
        }

        fieldset {
            background: whitesmoke;
            width: 40em;
            height: 43rem;
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

        .date-field {
            float: right;

        }

        @media (max-width:700px) {
            fieldset {
                width: 20rem;
                height: 60rem;
            }

            body {
                background-image: url("mainpics/login.jpg");
                background-size: cover;
            }
        }
    </style>






</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="main_page.php">Home Page</a></li>
                <!-- Sub navigation menu -->
                <div class="subnav">
                    <li><a href="book_a_trip.php">Plan & Book <i class="fa fa-caret-down"></i></a></li>
                    <div class="subnav-content">
                        <li><a href="book_a_trip.php">Book a trip</a></li>
                        <li><a href="flight_schedule_search.php">Flight Schedule Search</a></li>
                        <li><a href="manage_booking.php">Manage Booking</a></li>
                        <li><a href="FlightStatus.php">Flight Status</a></li>
                    </div>
                </div>
                <div class="subnav">
                    <li><a href="PassengerServices.html">Services <i class="fa fa-caret-down"></i></a></li></button>
                    <div class="subnav-content">
                        <li><a href="PassengerServices.html">Passenger Services</a></li>
                        <li><a href="cargo.html">Cargo Services</a></li>
                        <li><a href="BaggageInfo.html">Baggage Info</a></li>
                        <li><a href="checkin.php">Check-in</a></li>
                    </div>
                </div>
                <li><a href="CovidRestrictions.html">Covid Restrictions</a></li>
                <li><a href="Faq.html">FAQ</a>
                <li><a class="active" href="login.php">Login/Register</a>
            </ul>

            <!-- hamburger menu, only essentiel links -->
            <div class="topnav">
                <a href="main_page.php">
                    <ion-icon name="airplane-outline"></ion-icon>
                </a>
                <div id="myLinks">
                    <a href="book_a_trip.php">Book a trip</a>
                    <a href="checkin.php">Check-in</a>
                    <a class="active" href="login.php">Login</a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
        </nav>
    </header>

    <!-- <h1 class="title">Welcome to ROA Airlines!</h1> -->

    <fieldset style="margin: 1em;">
        <legend style="margin-left: 2em;">Register</legend>
        <form method="post" action="register.php" id="registerForm" onsubmit="return passwordValidation();">
            <div class="date-field">
                <p><label>Credit Card Number<input name="card" id="Card" type="type" placeholder="4xxxxxxxxxxxxxxx (16 digits)" required></p>
                <div id="cardDiv"></div>
                <p><label>Expiry Month
                        <select name="month" id="month">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </label></p>
                <p><label>Expiry Year
                        <select name="year" id="Year">
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </label></p>
                <p><label>CVV <input type="text" name="cvv" id="Cvv" placeholder="CVV"></label></p>
                <div id="cvvDiv"></div>
            </div>
            <p><label>First Name<input name="firstname" id="Fname" type="text" placeholder="First Name" required></p>

            <p><label>Last Name<input name="lastname" id="Lname" type="text" placeholder="Last Name" required></p>

            <p><label>Username<input name="username" id="username" type="text" placeholder="Username" required></p>
            <div id="usernameDiv"></div>

            <p><label>Date of Birth<input name="dob" id="dob" type="date" placeholder="Last Name" required></p>

            <p><label>Email Address<input name="email" id="email" type="text" placeholder="Email Address" required></p>
            <div id="emailDiv"></div>

            <p><label>Password<input name="password" id="Password" type="password" placeholder="Password" onkeyup="passwordValidation()" required></p>
            <div id="passwordDiv"></div>

            <input type="submit" name="submit" id="submit" value="Register">
            <input type="reset" value="Clear">
            <p class="register"> Already have an account? <a href="login.php">Login</a></p>
        </form>
    </fieldset>



    <script>    
        var bt = document.getElementById("submit");

        $(document).ready(function() {

            $("input").focus(function() {
                $(this).css("background-color", "darkgray");
            });
            $("input").blur(function() {
                $(this).css("background-color", "#87CEFA");
            });

        });


        // Credit Card Visa Validation
        document.getElementById("Card").addEventListener("blur", function() {
            validateCard(this.value);
        }, false);

        function validateCard(Card) {
            // window.alert("Card number is ");

            CardValid = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/.test(Card);
            // valid test case: 4111111111111111   4012888888881881  (must start with 4 and 16 digits)
            if (CardValid) {
                document.getElementById("cardDiv").innerHTML = "Valid Card number";
                document.getElementById("cardDiv").style.color = "green";
                bt.disabled = false;
            } else {
                document.getElementById("cardDiv").innerHTML = "Invalid Card number";
                document.getElementById("cardDiv").style.color = "red";
                bt.disabled = true;
            }
        } // end function validatePhone


        // CVV Validation
        document.getElementById("Cvv").addEventListener("blur", function() {
            validateCvv(this.value);
        }, false);

        function validateCvv(Cvv) {
            // window.alert("Card number is ");

            CvvValid = /^[0-9]{3,4}$/.test(Cvv);
            // valid test case: 1234 4321 (3 or 4 digits)
            if (CvvValid) {
                document.getElementById("cvvDiv").innerHTML = "Valid CVV number";
                document.getElementById("cvvDiv").style.color = "green";
                bt.disabled = false;
            } else {
                document.getElementById("cvvDiv").innerHTML = "Invalid CVV number";
                document.getElementById("cvvDiv").style.color = "red";
                bt.disabled = true;
            }
        } // end function validatePhone


        // Email Validation
        document.getElementById("email").addEventListener("blur", function() {
            validateEmail(this.value);
        }, false);

        function validateEmail(email) {

            emailValid = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email);
            // valid test case: test@gmail.com test@g.mail.com
            if (emailValid) {
                document.getElementById("emailDiv").style.color = "green";
                document.getElementById("emailDiv").innerHTML = "Valid Email";
                bt.disabled = false;
            } else {
                document.getElementById("emailDiv").innerHTML = "Invalid Email";
                document.getElementById("emailDiv").style.color = "red";
                bt.disabled = true;
            }
        } // end function validatePhone


        function passwordValidation() {
            var input_password = document.getElementById("Password");
            var alert = document.getElementById("passwordDiv");

            if (input_password.value.length < 8) {
                // alert("Password must have at least 8 characters!");
                bt.disabled = true;
                alert.style.color = "red";
                alert.innerHTML = "Password must be at least 8 characters long!";
                return false;
            } else {
                bt.disabled = false;
                alert.style.color = "green";
                alert.innerHTML = "Password is valid!";
                return true;
            }
        }


        try {
            var asyncRequest = new XMLHttpRequest(); // create request

            // set up callback function and store it
            asyncRequest.addEventListener("readystatechange",
                function() {
                    if (asyncRequest.readyState === 4 && asyncRequest.status === 200) usernameTable(asyncRequest.responseText);
                    //alert(asyncRequest.responseText);
                }, false);

            // send the asynchronous request
            asyncRequest.open("GET", "get_usernames.php", true);
            asyncRequest.setRequestHeader("Content-Type", "application/json");
            asyncRequest.send(); // send request        
        } // end try
        catch (exception) {
            alert("Request Failed");
        } // end catch 





        function usernameTable(response) {
            // window.alert(response);
            var flag = 0;
            var data = JSON.parse(response);
            var table = document.getElementById("usernameDiv");

            // window.alert(data);

            var x = document.getElementById("username");
            x.addEventListener("keyup", myFunction1);
            // myFunction0(data);

            function myFunction1() {
                var table = document.getElementById("usernameDiv");

                let x = document.getElementById("username");
                // x.value = x.value.toLowerCase();
                var bt = document.getElementById("submit");

                for (var i = 0; i < data.length; i++) {
                    // window.alert(data[i]);
                    if (data[i] == x.value) {
                        flag = 1;
                        table.style.color = "red";
                        table.innerHTML = 'Username already exists! Please pick another one.';
                        bt.disabled = true;
                        return false;
                    } else {
                        table.style.color = "green";
                        table.innerHTML = 'Username Available!';
                        bt.disabled = false;
                    }
                }
            }
        }
    </script>


    <?php

    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $database = $client->Airline_Reservation;

    define("encryption_method", "AES-128-CBC");
    define("key", "Thats my Kung Fu");
    $customer_collection = $client->Airline_Reservation->Customers;

    function encrypt($data)
    {

        $key = key;
        $plaintext = $data;
        $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        return $ciphertext;
    }

    function decrypt($data)
    {
        $key = key;
        $c = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        if (hash_equals($hmac, $calcmac)) {
            return $original_plaintext;
        }
    }


    if (isset($_POST['submit'])) {

        echo "here";

        $inputtedFirstName = $_POST['firstname'];
        $inputtedLastName = $_POST['lastname'];
        $inputtedUsername = $_POST['username'];
        $inputtedDOB =  $_POST['dob'];
        $inputtedEmail = $_POST['email'];
        $inputtedPassword = $_POST['password'];
        $inputtedCard = $_POST['card'];
        $inputtedCVV = $_POST['cvv'];
        $inputtedMonth = $_POST['month'];
        $inputtedYear = $_POST['year'];

        $flag = 0;




        //this code part below was implemented before ajax, so when the user submits the form, it checks if the username already exists in the database and the user gets the error but
        //since we need to use ajax and its asynchronous, we will comment this method as its no longer needed as live updates are shown to the user.

        // USERNAME IS UNIQUE, WE CANNOT ALLOW 2 USERS TO HAVE THE SAME ONE!
        // $usernameResult = $customer_collection->find(['Username' => $inputtedUsername]);
        // foreach ($usernameResult as $searchFor) {
        //     $storedUsername = $searchFor['Username'];
        //     if ($inputtedUsername == $storedUsername) {
        //         $flag = 1;
        //     }
        // }
        // if ($flag == 1) {
        //     print("<script>window.alert('Username already exists! Please choose another one.');
        //     window.location.assign('register.php');
        //     </script>");
        //     die();
        // }



        $customer_collection = $client->Airline_Reservation->Customers;

        $newCustomers = [
            [
                'Username' => $inputtedUsername,
                'First_Name' => $inputtedFirstName,
                'Last_Name' => $inputtedLastName,
                'Date_Of_Birth' => $inputtedDOB,
                'Cookie' => '',
                'Email' => $inputtedEmail,
                'Password' => password_hash($inputtedPassword, PASSWORD_DEFAULT),
                'Credit_Card_Number' => encrypt($inputtedCard),
                'Credit_Card_CVV' => encrypt($inputtedCVV),
                'Credit_Card_Expiration_Month' => $inputtedMonth,
                'Credit_Card_Expiration_Year' => $inputtedYear
            ],
        ];
        $insertManyResult = $customer_collection->insertMany($newCustomers);




        print("<script>window.alert('Successfuly registered $inputtedUsername in the database. You can now Login')</script>");
        echo "<script> window.location.assign('login.php'); </script>";
    }

    ?>


</body>

</html>