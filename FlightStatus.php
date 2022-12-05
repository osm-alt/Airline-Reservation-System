<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <title>FlightStatus</title>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(13, 191, 158, 1) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);
        }

        .center {
            text-align: center;
            font-size: larger;
            font-style: oblique;
        }
        .center:hover{
            color: white;
            font-size: 20px;
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
            margin-left: -3em;
            position: relative;
            bottom: .5em;

        }

        form p {
            margin-right: 1em;
        }

        form {
            border: 1px solid white;
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
            padding-bottom: .3em;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 10em;
            margin-right: 10em;
        }

        @media (max-width:1200px) {
            h1 {
                padding-left: clamp(2rem, 1.5vw + 3px, rem);

                font-size: clamp(rem, 2.5vw, 1rem);
            }

            form {
                width: 50%;
            }
        }
        table {
            margin-top: 2em;
            text-align: center;
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            border-collapse: collapse;
        }

        th {
            font-size: 1.2em;
            padding: .5em;
            background-color: rgb(84, 201, 247);
            color: white;
            border-style: solid;
            border-color: black;
        }

        table caption {
            color:white;
            margin-bottom: 1.5em;
            font-size: 1.3em;
        }

        td {
            background-color: white;
            padding: 1em;
            border-style: solid;
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
              <li><a class="active" href="FlightStatus.php">Flight Status</a></li>
            </div>
          </div>
          <div class="subnav">
            <li><a href="PassengerServices.html">Services <i class="fa fa-caret-down"></i></a></li></button>
            <div class="subnav-content">
              <li><a href="PassengerServices.html">Passenger Services</a></li>
              <li><a href="cargo.html">Cargo Services</a></li>
              <li><a href="BaggageInfo.html">Baggage Info</a></li>
              <li><a href="checkin.html">Check-in</a></li>
              <li><a href="admin.html">Admin</a></li>
            </div>
          </div>
          <li><a href="CovidRestrictions.html">Covid Restrictions</a></li>
          <li><a href="Faq.html">FAQ</a>
          <li><a  href="login.php">Login/Register</a>
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

    <body>

        <div style="text-align: center;">
            <img src="FlightStatusPics/statusf.jpg" width="50%" height="400" alt="flight status">
        </div>


            <h1 style="text-align: center;">Flight Status</h1>
            <br>
            <br>
            <br>
        <div class="center">Check in below the flight schedule of flights operated by ROA Airlines.<br>
            Fill in below the Flight ID of your flight in order to search for it.</div>

        <form method="post" action="FlightStatus.php" autocomplete="on" style="margin-bottom: 3rem;">
            <div class="form-elts">
                <p><label>Flight ID<input name="flightID" id="flightID" type="text" size="21" required></p>
                <p><input type="submit" name="CheckStatus" value="CheckStatus">
                </p>
            </div>
        </form>


    </body>
<?php
use MongoDB\Operation\Find;
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Airline_Reservation;
$flight_collection = $client->Airline_Reservation->Flights;
$customer_collection = $client->Airline_Reservation->Customers;
if (isset($_POST["CheckStatus"])) {
    $flightID =(int) $_POST["flightID"];
    $flightIDResult = $flight_collection->find(['Flight_ID'=>$flightID]);
    print("<table>");
    print("<thead>");
    print("<tr><th>Flight ID</th><th>From</th><th>To</th><th>Departure Date</th><th>Depart Time</th><th>Economy Seats</th><th>Business Seats</th><th>FirstClass Seats</th><th>Delay</th><th>Captain_Name</th> </tr>");
    print("</thead>");
    print("<tbody>");

    $result = $flight_collection->find(['Flight_ID'=>$flightID]);
    foreach ($result as $entry) {


        print("<tr>");
        print("<td>" . $entry['Flight_ID'] . "</td><td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td>" . "<td>" . $entry['Departure_Date'] . "</td>" . "<td>" . $entry['Departure_Time'] . "</td>" . "<td>" . $entry['Economy_Seats_Left'] . "</td>" . "<td>" . $entry['Business_Seats_Left'] . "</td>" . "<td>" . $entry['FirstClass_Seats_Left'] . "</td>". "<td>" . $entry['Delay'] . "</td>". "<td>" . $entry['Captain_Name'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}

?>
</html>