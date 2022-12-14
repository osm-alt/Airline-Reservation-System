<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Airline_Reservation;

$admin_collection = $client->Airline_Reservation->Admin;

$customer_collection = $client->Airline_Reservation->Customers;

$flag = 2;


foreach ($_COOKIE as $key => $value) {
  
  $result = $customer_collection->find(['Cookie' => $value]);
  foreach ($result as $entry) {
    $flag = 1;
    }
    // print("<p>$key: $value</p>");

}



$admin_collection = $client->Airline_Reservation->Admin;


foreach ($_COOKIE as $key => $value) {
  
  $result = $admin_collection->find(['Cookie' => $value]);

  foreach ($result as $entry) {
    $flag = 0;
    }
    // print("<p>$key: $value</p>");
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home Page</title>
  <link rel="stylesheet" href="main_style.css">
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <!-- this script is for the social media icons in the footer -->
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- this link is for the downwards arrow on Plan & book and services -->

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    }


    h1 {
      font-weight: bold;
      font-size: 2rem;
    }

    h2 {
      font-weight: bold;
      font-size: 0.5rem;
    }

    p {
      font-weight: 35;
      font-size: 1rem;
    }


    /* hero */
    main {
      height: 100vh;
      /* linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0 */
      background: url('mainpics/sky.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }


    section {
      padding: 10rem 0 5rem 0;
      background: rgb(34, 193, 195);
      background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(13, 191, 158, 1) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);

    }

    /* animation */
    svg {
      animation: infinite-spinning 3s infinite;
    }

    @keyframes infinite-spinning {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }



    img {
      width: 50%;
      height: auto;
      border: 0.5rem solid gray;
    }

    .container {
      display: flex;
      justify-content: center;
      width: 100%;
      align-items: center;
      margin: auto;
      padding-top: 2rem;

    }

    .container div {
      text-align: center;
      border: 2px #ccc solid;
      font-size: 100%;
      height: 12rem;
      margin: 10rem;
      max-width: 100vh;
      background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(41, 14, 68, 0.6225840678068102) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);
      z-index: 2;
    }

    .box1,
    .box2,
    .box3 {

      flex-basis: 70%;
      border-radius: 0.5em;
      flex-flow: column;
      transition: all 0.3s ease;
    }

    .container a {
      text-decoration: none;
      color: white;
      margin: 0.25rem;
      transition: color .1s ease-in-out;
    }

    .container a:hover {
      box-shadow: inset 200px 0 0 0 #54b3d6;
      color: black;
      transition: all 1s ease;

    }




    /* Covid19 section */
    .container1 {
      display: flex;
      justify-content: left;
      width: 100%;
      margin-top: -15rem;
      padding-top: 10rem;
    }

    .box4 h1 {
      color: white;
      padding-left: 10rem;
      white-space: nowrap;
      font-weight: bolder;
      font-family: Arial, Helvetica, sans-serif;

    }

    .box4 p {
      margin-left: 1em;
      text-align-last: left;
      font-size: 1.8rem;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: lighter;
      padding-top: 1rem;
      text-shadow: -4px 4px 6px dimgray;
      color: white;
    }

    #button1 {
      white-space: nowrap;
      margin: auto;
      cursor: pointer;
      border: none;
      padding: 1rem;
      /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,43,121,1) 44%, rgba(0,212,255,1) 100%); */
      /* color:white; */
      font-family: cursive;
      box-sizing: border-box;
      padding: 0.4em 0.7em;
      font-size: clamp(.5rem, 1.5vw + 3px, 2rem);
    }




    /* Contact Us Section*/

    .box5 {
      height: 80vh;
      margin-top: -5rem;
    }

    .ContactUs .box5 h1 {
      text-align: center;
      color: white;
      font-weight: bold;
      font-style: italic;
    }

    .ContactUs input {
      width: 30%;
      font-size: 1rem;
      padding: 1rem;
      margin: 1.1rem;
      display: block;
      border: 1px solid #ccc;
    }

    .ContactUs input[type=submit] {
      background-color: #4CAF50;
      color: white;
    }

    .ContactUs input::placeholder {
      font-size: 1rem;
    }


    .ContactUs form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .ContactUs textarea {
      width: 30%;
      height: 18rem;
      padding-top: 1rem;
      padding-left: 1rem;
      border: 1px solid #ccc;
      font-size: 1rem;
      margin: 1.1rem;
      font-family: sans-serif;
    }


    /* Footer part */
    footer {
      padding-bottom: 5rem;
      height: 1rem;
      background-color: black;
      line-height: 80px;
      text-align: center;
    }

    .Mediaicons {
      text-decoration: none;
      padding: 20px;
      margin: 0.1rem;
      font-size: 1rem;
      background-color: white;
    }

    .Mediaicons-facebook {
      background: #3B5998;
      color: white;
    }

    .Mediaicons-twitter {
      background: #55ACEE;
      color: white;
    }

    .Mediaicons-instagram {
      background: #125688;
      color: white;
    }

    .Mediaicons-youtube {
      background: #bb0000;
      color: white;
    }

    .Mediaicons-google {
      background: #dd4b39;
      color: white;
    }


    .Mediaicons:hover {
      opacity: 0.9;
    }


    /* --------------------------------------------------------- */
    /* MEDIA QUERIES */
    @media (max-width:1340px) {

      .container {
        display: flex;
        flex-direction: column;
        padding-top: 10rem;
        width: 100%;
      }

      .container div {
        width: 80%;
        justify-content: center;
        border: px #ccc solid;
        font-size: 100%;
        margin-top: -7rem;
      }


      .box4 h1 {
        padding-left: clamp(2rem, 1.5vw + 3px, 2rem);
        font-size: clamp(1rem, 2.5vw, 2rem);
      }

      .box4 p {
        margin-left: 1em;
        text-align-last: left;
        font-size: 3rem;

        padding-top: 1rem;
        font-size: clamp(1rem, 2.5vw, 2rem);
      }
    }

    @media (max-width:600px) {

      .box4 h1 {
        font-size: small;
        padding-left: clamp(2rem, 1.5vw + 3px, 2rem);
      }

      .box4 p {
        width: 50%;
        margin-left: 1em;
        text-align-last: left;
        font-size: 3rem;

        padding-top: 1rem;
        font-size: clamp(1rem, 2.5vw, 2rem);
      }
    }




    @media (max-height:700px) {

      .container div {

        /* height: 10rem; */
      }
    }

    @media (max-height:500px) {

      .container div {

        height: 10rem;
        margin-top: -1rem;
      }
    }

    @media (max-height:300px) {

      .container div {
        height: 10rem;
        margin-top: -10rem;
      }
    }


    @media (max-height:800px) and (max-width:1300px) {
      .container {
        display: flex;
        flex-direction: row;
        height: 10rem;
        /* min-height: 80vh; */
      }

      .container div {
        margin-top: -20rem;
        margin: 1rem;
        height: 10rem;
      }

    }


    @media (max-height:600px) and (max-width:800px) {
      .container {

        display: flex;
        flex-direction: row;
        height: 18rem;
      }

      .container div {
        margin-top: 4rem;
        width: 80%;
        height: 7rem;
        margin-top: -10rem;
      }

    }

    @media (max-height:400px) and (max-width:600px) {
      .container {

        display: flex;
        flex-direction: row;
        height: 18rem;
      }

      .container div {
        font-size: small;
        width: 50%;
        height: 10rem;
        margin-top: -10rem;
      }

    }
  </style>

</head>

<body>
  <main>
    <header>
      <nav>
        <ul>
          <li><a class="active" href="main_page.php">Home Page</a></li>
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
              <?php 
              if($flag == 0){
                print'<li><a href="admin.html">Admin</a></li>';
              }
              ?>
              <!-- <li><a href="admin.html">Admin</a></li> -->
            </div>
          </div>
          <li><a href="CovidRestrictions.html">Covid Restrictions</a></li>
          <li><a href="Faq.html">FAQ</a>
          <li><a href="login.php">Login/Register</a>
        </ul>

        <!-- hamburger menu, only essentiel links -->
        <div class="topnav">
          <a href="main_page.php" class="active">
            <ion-icon name="airplane-outline"></ion-icon>
          </a>
          <div id="myLinks">
            <a href="book_a_trip.php">Book a trip</a>
            <a href="checkin.php">Check-in</a>
            <a href="login.php">Login</a>
          </div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
      </nav>
    </header>



    <!-- hero -->
    <h1 style="margin-top: 2rem; text-align: center;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-airplane-engines-fill" viewBox="0 0 16 16">
        <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0Z" />
      </svg>Welcome
       <?php if ($flag==1)
      print($entry['First_Name']  . " " . $entry['Last_Name']);
      if($flag==0)
      {
        print("Admin " . $entry['Username']);
      }
      if($flag==2)
      {
        print("");
        // just avoiding error msg
      }
      
      ?>
       To ROA Airlines! <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-airplane-engines-fill" viewBox="0 0 16 16"> 
        <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0Z" />
      </svg></h1>




    <div class="container">
      <div class="box1">
        <a href="book_a_trip.php">
          <h1>Book a Trip</h1>
          <p>Search Flights & Book</p>
        </a>
      </div>
      <div class="box2">
        <a href="checkin.html">
          <h1>Check in</h1>
          <p>Check in Before Flight</p>
        </a>
      </div>
      <div class="box3">
        <a href="flight_schedule_search.php">
          <h1>Flight Status</h1>

          <p>Check Flight Schedule
          </p>
        </a>
      </div>
    </div>
  </main>



  <!-- Covid19 section -->
  <section>
    <div class="container1">
      <img src="mainpics/covid19airplane.png" alt="covid19 airplane" style="vertical-align: bottom;">
      <div class="box4">
        <h1>Covid19 Measures and Guidelines</h1>
        <p>We take our passenger's safety as a top priority, please visit our
          Guidelines page to learn more about our measures while travelling.
          <a href="CovidRestrictions.html"><button id="button1">Read More</button></a>
        </p>
      </div>
    </div>
  </section>




  <!-- Contact Us section -->
  <section class="ContactUs">
    <div class="box5">
      <h1>Contact Us</h1>
      <form>
        <input type="text" name="FullName" placeholder="First and Last Name" required>
        <input type="text" name="Email" placeholder="Enter your email" required>
        <textarea placeholder="Enter your message"></textarea>
        <input type="submit" value="Send Message">
      </form>
  </section>



  <!-- Footer -->
  <footer>
    <a href="#" class="Mediaicons Mediaicons-faceook">
      <ion-icon name="logo-facebook"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-twitter">
      <ion-icon name="logo-twitter"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-instagram">
      <ion-icon name="logo-instagram"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-youtube">
      <ion-icon name="logo-youtube"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-google">
      <ion-icon name="logo-google"></ion-icon>
    </a>
  </footer>

</body>





</html>