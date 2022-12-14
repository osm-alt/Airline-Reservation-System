<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main_style.css">
  <title>Check in</title>

  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    h1 {
      text-align: center;
      font-weight: bold;
      font-size: 2rem;
      color: white;
    }

    h2 {
      font-weight: bold;
      font-size: 0.5rem;
    }

    p {
      color: white;
      font-weight: 35;
      font-size: 1rem;
    }

    body {
      background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(13, 191, 158, 1) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);
    }



    section {
      padding: 12rem 0 5rem 0;
    }


    .textcenter img {
      width: 100%;
    }


    .textcenter {
      position: relative;
    }

    .textcenter .text-centered {
      animation: shaketxt 3s infinite;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      position: absolute;
      top: 20%;
      left: 0;
      width: 100%;
      text-align: center;
      color: white;
      font-size: 4rem;
      font-weight: bolder;
      color: white;
      font-weight: 500;
    }

    @keyframes shaketxt {
      0% {
        transform: translateY(0)
      }

      25% {
        transform: translateY(10px);
      }

      50% {
        transform: translateY(10px);
      }

      100% {
        transform: translateY(0px);
      }
    }


    form p {
      margin-right: 1em;
    }

    form {
      padding-top: 1em;
      padding-left: 1em;
      padding-right: 1em;
      padding-bottom: .3em;
      margin-top: 1em;
      margin-bottom: 1em;
      margin-left: 10em;
      margin-right: 10em;
    }

    fieldset {
      background: linear-gradient(0deg, rgb(47, 220, 223) 0%, rgba(155, 92, 218, 0.623) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);
    }

    label {
      color: white;
    }

    div.form-elts {
      justify-content: center;
      display: flex;
      flex-wrap: wrap;
    }

    input {
      box-sizing: border-box;
      padding: .5em;
      margin: 1em;
    }

    input[type=submit] {
      font-size: 1.2em;
      background-color: rgb(84, 201, 247);
      color: white;
      border-radius: .5em;
      margin-left: 5em;
      position: relative;
      bottom: .5em;
    }




    @media (max-width:1200px) {
      h1 {
        padding-left: clamp(2rem, 1.5vw + 3px, rem);

        font-size: clamp(rem, 2.5vw, 1rem);
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
            <li><a class="active" href="checkin.html">Check-in</a></li>
          </div>
        </div>
        <li><a href="CovidRestrictions.html">Covid Restrictions</a></li>
        <li><a href="Faq.html">FAQ</a>
        <li><a href="login.php">Login/Register</a>
      </ul>

      <!-- hamburger menu, only essentiel links -->
      <div class="topnav">
        <a href="main_page.php">
          <ion-icon name="airplane-outline"></ion-icon>
        </a>
        <div id="myLinks">
          <a href="book_a_trip.php">Book a trip</a>
          <a href="checkin.html">Check-in</a>
          <a href="login.php">Login</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </nav>
  </header>



  <figure class="textcenter">
    <img src="checkinpics/checkin.jpg" width="100%" height="400" alt="checkin">
    <h1 class="text-centered">Check-In</h1>
  </figure>


  <h1 style="text-align: center;">Web Check-In</h1>
  <p style="text-align: center;">Web Check-in is available 48 hours to 1 hour before the flight departure.
  </p>

  <section>
    <form method="post" action="checkin.php" autocomplete="on" style="margin-top: -12em;">
      <fieldset>
        <legend style="margin-left: 2em;">Check-In</legend>
        <div class="form-elts">
          <p><label>Username<input name="username" type="text" size="21" required></p>
          <p><label>BRN<input name="BRN" type="text" size="21" required></p>
          <p><input type="submit" id="btn" name="submit" value="Check In">
        </div>
        </p>
      </fieldset>
    </form>
    <div id="animal-info"></div>
  </section>


  <?php

  use MongoDB\Operation\Find;

  require 'vendor/autoload.php';

  $client = new MongoDB\Client("mongodb://localhost:27017");
  $database = $client->Airline_Reservation;

  $booking_collection = $client->Airline_Reservation->Bookings;

  // $username = $_COOKIE["username"];
  if (!isset($_COOKIE["username"])) {
    print("<p style=\"text-align:center;color:white;margin-top:1em\">Please <a href=\"login.php\">login</a> before managing bookings.</p>");
    die();
  }

  if (isset($_POST['submit'])) {

    $flag = 0;
    $username = $_POST['username'];
    $BRN = $_POST['BRN'];

    $result = $booking_collection->find();


      foreach ($result as $entry) {
        if ($entry['Customer_Username'] == $username && $entry['Brn'] == $BRN && $entry['Purchased'] == true) {
          $booking_collection->updateOne(
            ['Customer_Username' => $username],
            ['$set' => ['Check_In' => true]]
          );
          print("<script>window.alert('Successfuly Checked in $username to BRN $BRN')</script>");
          $flag = 1;
        }
      }


      if ($flag == 0) {
        print("<script>window.alert('Incorrect username or BRN or not a purchased Booking')</script>");
      }
    }

  ?>




</body>

</html>