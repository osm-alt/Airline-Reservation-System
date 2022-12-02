<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <title>Process booking</title>
    <style>
        body {

            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(13, 191, 158, 1) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);
        }

        h1  {
            color: white;
            text-align: center;
            margin: 1em;
        }

        p {
            color: white;
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
                <li><a href="login.html">Login/Register</a>
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

    <h1>ROA Airlines</h1>
    <?php
        $trip_type = isset($_POST[ "trip_type_search" ]) ? $_POST[ "trip_type_search" ] : "";
        $flight_id_1 = isset($_POST[ "flight_id" ]) ? intval($_POST[ "flight_id" ]) : "";
        $flight_id_2 = isset($_POST[ "flight_id_second" ]) ? intval($_POST[ "flight_id_second" ]) : "";
        $cabin_class = isset($_POST[ "cabin_search" ]) ? $_POST[ "cabin_search" ] : "";
        $preferred_seat_location = isset($_POST[ "seat_selection" ]) ? $_POST[ "seat_selection" ] : "";
        $airport_pickup = isset($_POST[ "airport_pickup" ]) ? $_POST[ "airport_pickup" ] : "";
        $accompanying_pet = isset($_POST[ "pet" ]) ? $_POST[ "pet" ] : "";
        $special_treatment = isset($_POST[ "special_treatment" ]) ? $_POST[ "special_treatment" ] : "";
        $adults = isset($_POST[ "adults_search" ]) ? $_POST[ "adults_search" ] : "";
        $children = isset($_POST[ "children_search" ]) ? $_POST[ "children_search" ] : "";
        $infants = isset($_POST[ "infants_search" ]) ? $_POST[ "infants_search" ] : "";
        $adult_meals = [];
        $adult_drinks = [];
        for($i = 0; $i < intval($adults); $i++)
        {
            $adult_i_meal = isset($_POST[ "special_meals_for_adult" . ($i + 1) ]) ? $_POST[ "special_meals_for_adult" . ($i + 1) ] : "";
            $adult_meals[$i] = $adult_i_meal;
            $adult_i_drink = isset($_POST[ "drink_for_adult" . ($i + 1) ]) ? $_POST[ "drink_for_adult" . ($i + 1) ] : "";
            $adult_drinks[$i] = $adult_i_drink;
        }
        $children_meals = [];
        $children_drinks = [];
        for($i = 0; $i < intval($children); $i++)
        {
            $child_i_meal = isset($_POST[ "special_meals_for_child" . ($i + 1) ]) ? $_POST[ "special_meals_for_child" . ($i + 1) ] : "";
            $children_meals[$i] = $child_i_meal;
            $child_i_drink = isset($_POST[ "drink_for_child" . ($i + 1) ]) ? $_POST[ "drink_for_child" . ($i + 1) ] : "";
            $children_drinks[$i] = $child_i_drink;
        }
        $price = isset($_POST[ "price_sent" ]) ? $_POST[ "price_sent" ] : "";

        require 'vendor/autoload.php';

	    $client = new MongoDB\Client("mongodb://localhost:27017");
        $bookings = $client->Airline_Reservation->Bookings;

        $departure_date = isset($_POST[ "depart_on_search" ]) ? $_POST[ "depart_on_search" ] : "";

        $departure_date = date_create($departure_date);
        $today = date_create(date("Y-m-d"));
        $diff= date_diff($today,$departure_date);
        if(intval($diff->format("%a")) < 7) //can buy or reserve tickets until one week before flight
        {
            print("Deadline passed to buy tickets for this flight!");
            die();
        }
        if($trip_type == "Round-trip")
        {
            $return_on = isset($_POST[ "return_on_search" ]) ? $_POST[ "return_on_search" ] : "";
            $return_on = date_create($return_on);
            $diff=date_diff($today,$return_on);
            if(intval($diff->format("%a")) < 7)
            {
                print("Deadline passed to buy tickets for the second flight!");
                die();
            }
        }        
        if($trip_type == "Multi-city")
        {
            $depart_on_second = isset($_POST[ "depart_on_second_search" ]) ? $_POST[ "depart_on_second_search" ] : "";
            $depart_on_second = date_create($depart_on_second);
            $diff=date_diff($today,$depart_on_second);
            if(intval($diff->format("%a")) < 7)
            {
                print("Deadline passed to buy tickets for the second flight!");
                die();
            }
        }

        if(isset($_POST["buy_tickets"]))
        {
            $result = $bookings->find([]);
            $brns = [];
            foreach($result as $entry)
            {
                array_push($brns, $entry['Brn']);
            }
            $new_brn = max($brns) + 1;

            $flights = [$flight_id_1];
            if($flight_id_2 != "")
            {
                array_push($flights, $flight_id_2);
            }

            $customers = $client->Airline_Reservation->Customers;
            $result = $customers->find(['Cookie' => $_COOKIE["username"]]);

            foreach($result as $entry)
            {
                $username = $entry['Username'];
                break;
            }            

            $bookings->insertOne( ['Brn' => $new_brn, 'Purchased' => True, 'Flights' => $flights, 'Customer_Username' => $username, 'Cabin_Class' => $cabin_class, 'Preferred_Seat_Location' => $preferred_seat_location, 'Airport_Pick_Up' => $airport_pickup, 'Accompanying_Pet' => $accompanying_pet, 'Special_Treatment' => $special_treatment, 'Adults' => intval($adults), 'Children' => intval($children), 'Infants' => intval($infants), 'Type_Of_Trip' => $trip_type, 'Check_In' => False, 'Adult_Meals' => $adult_meals, 'Adult_Drinks' => $adult_drinks, 'Children_Meals' => $children_meals, 'Children_Drinks' => $children_drinks, 'Price' => intval($price)] );
            print("<p style=\"text-align:center;\">Tickets purchased.</p>");
            print("<p style=\"text-align:center;\">Booking reference number: $new_brn</p>");
        }
        
        if(isset($_POST["reserve_booking"]))
        {
            $result = $bookings->find([]);
            $brns = [];
            foreach($result as $entry)
            {
                array_push($brns, $entry['Brn']);
            }
            $new_brn = max($brns) + 1;

            $flights = [$flight_id_1];
            if($flight_id_2 != "")
            {
                array_push($flights, $flight_id_2);
            }

            $customers = $client->Airline_Reservation->Customers;
            $result = $customers->find(['Cookie' => $_COOKIE["username"]]);

            foreach($result as $entry)
            {
                $username = $entry['Username'];
                break;
            }              

            $bookings->insertOne( ['Brn' => $new_brn, 'Purchased' => False, 'Flights' => $flights, 'Customer_Username' => $username, 'Cabin_Class' => $cabin_class, 'Preferred_Seat_Location' => $preferred_seat_location, 'Airport_Pick_Up' => $airport_pickup, 'Accompanying_Pet' => $accompanying_pet, 'Special_Treatment' => $special_treatment, 'Adults' => intval($adults), 'Children' => intval($children), 'Infants' => intval($infants), 'Type_Of_Trip' => $trip_type, 'Check_In' => False, 'Adult_Meals' => $adult_meals, 'Adult_Drinks' => $adult_drinks, 'Children_Meals' => $children_meals, 'Children_Drinks' => $children_drinks, 'Price' => intval($price)] );
            print("<p style=\"text-align:center;\">Booking reserved. Please choose to buy or cancel tickets one week before your flight.</p>");
            print("<p style=\"text-align:center;\">Booking reference number: $new_brn</p>");
        }
    ?>
</body>
</html>