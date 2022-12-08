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
    <script>
        var initial_price;
        function get_initial_fee() {
            displayed_price = document.getElementById("price");
            initial_price = parseInt(displayed_price.innerText);
        }
        
        function change_currency_price() {
            var currency = document.getElementById("currency");
            displayed_price = document.getElementById("price");
            var price = 0;
            if (currency.value == "€") {
                price = (initial_price) * 1.03;
            }
            else if (currency.value == "£") {
                price = (initial_price) * 0.9;
            }
            else if (currency.value == "L.L") {
                price = (initial_price) * 40000;
            }
            else {
                price = (initial_price); //in dollars
            }

            price = price.toFixed(2);

            displayed_price.innerText = price;
        }
    </script>
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
                        <li><a href="FlightStatus.html">Flight Status</a></li>
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

    <h1>ROA Airlines</h1>
    <?php
        $trip_type = isset($_POST[ "trip_type_search" ]) ? $_POST[ "trip_type_search" ] : "";
        $flight_id_1 = isset($_POST[ "flight_id" ]) ? intval($_POST[ "flight_id" ]) : "";
        $flight_id_2 = isset($_POST[ "flight_id_second" ]) ? intval($_POST[ "flight_id_second" ]) : "";
        $cabin_class = isset($_POST[ "cabin_search" ]) ? $_POST[ "cabin_search" ] : "";
        $preferred_seat_location = isset($_POST[ "seat_selection" ]) ? $_POST[ "seat_selection" ] : "";
        $airport_pickup = isset($_POST[ "airport_pickup" ]) ? ($_POST[ "airport_pickup" ] == 'yes' ? True : False) : False;
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

        if(isset($_POST['buy_reservation']))
        {
            $brn = isset($_POST['brn']) ? $_POST['brn'] : "";
            $departure_date = isset($_POST[ "departure_date" ]) ? $_POST[ "departure_date" ] : "";
            $departure_date = date_create($departure_date);
            $today = date_create(date("Y-m-d"));
            $diff= date_diff($today,$departure_date);
            if(intval($diff->format("%a")) < 7) //Deadline one week before flight
            {
                print("<p style=\"text-align:center;\">Deadline has passed for buying tickets for the flight/s specified.</p>");
                die();
            }
            else
            {
                $bookings->updateOne(
                    ['Brn' => intval($brn)],
                    ['$set' => ['Purchased' => True]]
                );
                print("<p style=\"text-align:center;\">Tickets purchased.</p>");
                die();
            }

        }


        if(isset($_POST['modify_booking']))
        {
            $brn = isset($_POST['brn']) ? $_POST['brn'] : "";
            $cabin = isset($_POST['cabin']) ? $_POST['cabin'] : "";
            $modification_fees = isset($_POST['modification_fees_sent']) ? $_POST['modification_fees_sent'] : "";
            
            $booking = $bookings->findOne(['Brn' => intval($brn)]);
            $initial_price = intval($booking['Price']);
            $new_price = floatval($modification_fees) + $initial_price;

            $bookings->updateOne(
                ['Brn' => intval($brn)],
                ['$set' => ['Cabin_Class' => $cabin, 'Airport_Pick_Up' => $airport_pickup, 'Accompanying_Pet' => $accompanying_pet, 'Special_Treatment' => $special_treatment, 'Adult_Meals' => $adult_meals, 'Adult_Drinks' => $adult_drinks, 'Children_Meals' => $children_meals, 'Children_Drinks' => $children_drinks, 'Price' => $new_price]]
            );

            print("<p style=\"text-align:center;\">Booking modified.</p>");

            die();
        }

        if(isset($_POST['cancel_booking']))
        {
            $brn = isset($_POST['brn']) ? $_POST['brn'] : "";

            $booking = $bookings->findOne(['Brn' => intval($brn)]);

            $flights_collection = $client->Airline_Reservation->Flights;

            $flights = $booking['Flights'];

            $flight_id_1 = $flights_collection->findOne(['Flight_ID' => $flights[0]]);

            $cabin_class = $booking['Cabin_Class'];

            $cabin_seats = "";
            if($cabin_class == "Economy class")
            {
                $cabin_seats = "Economy_Seats_Left";
            }
            else if($cabin_class == "Business class")
            {
                $cabin_seats = "Business_Seats_Left";
            }
            else
            {
                $cabin_seats = "FirstClass_Seats_Left";
            }

            $first_flight = $flights_collection->findOne(['Flight_ID' => intval($flights[0])]);

            $first_flight_cabin_seats = intval($first_flight[$cabin_seats]);

            $passengers = intval($booking['Adults']) + intval($booking['Children']) + intval($booking['Infants']);
            //update seats left in the chosen cabin class of that flight
            $flights_collection->updateOne(
                ['Flight_ID' => intval($flights[0])],
                ['$set' => [$cabin_seats => ($first_flight_cabin_seats + $passengers)]]
            );

            
            if(count($flights) > 1)
            {
                $second_flight = $flights_collection->findOne(['Flight_ID' => intval($flights[1])]);

                $second_flight_cabin_seats = intval($second_flight[$cabin_seats]);
    
                $flights_collection->updateOne(
                    ['Flight_ID' => intval($flights[1])],
                    ['$set' => [$cabin_seats => ($second_flight_cabin_seats + $passengers)]]
                );
            }

            if($booking['Purchased'] == True)
            {
                $departure_date = isset($_POST[ "departure_date" ]) ? $_POST[ "departure_date" ] : "";
                $departure_date = date_create($departure_date);
                $today = date_create(date("Y-m-d"));
                $diff= date_diff($today,$departure_date);
                if(intval($diff->format("%a")) < 7) //Deadline one week before flight
                {
                    $bookings->deleteOne(['Brn' => intval($brn)]);
                    print("<p style=\"text-align:center;\">Booking canceled but no refund can be given as the deadline has passed.</p>");
                    die();
                }
                else
                {
                    $refund = round(intval($booking['Price']) / 2);
                    $bookings->deleteOne(['Brn' => intval($brn)]);
                    print("<p style=\"text-align:center;\">Booking canceled. A refund of \$$refund has been transferred to your account.</p>");
                    print("<p style=\"text-align:center; margin-top:1em;\"><strong>Refund: <span id=\"price\">$refund</span></strong>");
                    print("<script>get_initial_fee();</script>");
                    print("<select id=\"currency\" name=\"currency\" style=\"font-size:0.75em; margin-left: .3em; border-color: silver;\" onchange=\"change_currency_price()\">");
                    print("<option selected>$</option>");
                    print("<option>&euro;</option>");
                    print("<option>&#163;</option>");
                    print("<!--pound-->");
                    print("<option>L.L</option>");
                    print("</select></p>");
                    die();
                }
            }
            else 
            {
                $bookings->deleteOne(['Brn' => intval($brn)]);
                print("<p style=\"text-align:center;\">Reservation canceled.</p>");
                die();   
            }

        }


        if(isset($_POST["buy_tickets"]))
        {
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
            
            $flights_collection = $client->Airline_Reservation->Flights;

            $cabin_seats = "";
            if($cabin_class == "Economy class")
            {
                $cabin_seats = "Economy_Seats_Left";
            }
            else if($cabin_class == "Business class")
            {
                $cabin_seats = "Business_Seats_Left";
            }
            else
            {
                $cabin_seats = "FirstClass_Seats_Left";
            }

            $first_flight = $flights_collection->findOne(['Flight_ID' => intval($flight_id_1)]);

            $first_flight_cabin_seats = intval($first_flight[$cabin_seats]);

            $passengers = intval($adults) + intval($children) + intval($infants);
            //update seats left in the chosen cabin class of that flight
            $flights_collection->updateOne(
                ['Flight_ID' => intval($flight_id_1)],
                ['$set' => [$cabin_seats => ($first_flight_cabin_seats - $passengers)]]
            );

            if($flight_id_2 != "")
            {
                $second_flight = $flights_collection->findOne(['Flight_ID' => intval($flight_id_2)]);

                $second_flight_cabin_seats = intval($second_flight[$cabin_seats]);
    
                $passengers = intval($adults) + intval($children) + intval($infants);
                $flights_collection->updateOne(
                    ['Flight_ID' => intval($flight_id_2)],
                    ['$set' => [$cabin_seats => ($second_flight_cabin_seats - $passengers)]]
                );
            }
            
            print("<p style=\"text-align:center;\">Tickets purchased.</p>");
            print("<p style=\"text-align:center;\">Booking reference number: $new_brn</p>");
        }
        
        if(isset($_POST["reserve_booking"]))
        {
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
            
            
            $flights_collection = $client->Airline_Reservation->Flights;

            $cabin_seats = "";
            if($cabin_class == "Economy class")
            {
                $cabin_seats = "Economy_Seats_Left";
            }
            else if($cabin_class == "Business class")
            {
                $cabin_seats = "Business_Seats_Left";
            }
            else
            {
                $cabin_seats = "FirstClass_Seats_Left";
            }

            $first_flight = $flights_collection->findOne(['Flight_ID' => intval($flight_id_1)]);

            $first_flight_cabin_seats = intval($first_flight[$cabin_seats]);

            $passengers = intval($adults) + intval($children) + intval($infants);
            //update seats left in the chosen cabin class of that flight
            $flights_collection->updateOne(
                ['Flight_ID' => intval($flight_id_1)],
                ['$set' => [$cabin_seats => ($first_flight_cabin_seats - $passengers)]]
            );

            if($flight_id_2 != "")
            {
                $second_flight = $flights_collection->findOne(['Flight_ID' => intval($flight_id_2)]);

                $second_flight_cabin_seats = intval($second_flight[$cabin_seats]);
    
                $passengers = intval($adults) + intval($children) + intval($infants);
                $flights_collection->updateOne(
                    ['Flight_ID' => intval($flight_id_2)],
                    ['$set' => [$cabin_seats => ($second_flight_cabin_seats - $passengers)]]
                );
            }
            
            
            print("<p style=\"text-align:center;\">Booking reserved. $5 were transferred from your account. Please choose to buy or cancel tickets one week before your flight.</p>");
            print("<p style=\"text-align:center;\">Booking reference number: $new_brn</p>");

            print("<p style=\"text-align:center; margin-top:1em;\"><strong>Reservation fee: <span id=\"price\">5</span></strong>");
            print("<script>get_initial_fee();</script>");
            print("<select id=\"currency\" name=\"currency\" style=\"font-size:0.75em; margin-left: .3em; border-color: silver;\" onchange=\"change_currency_price()\">");
            print("<option selected>$</option>");
            print("<option>&euro;</option>");
            print("<option>&#163;</option>");
            print("<!--pound-->");
            print("<option>L.L</option>");
            print("</select></p>");
        }
    ?>
</body>
</html>