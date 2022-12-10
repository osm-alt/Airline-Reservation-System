<?php
    session_start();
    if (!isset($_SESSION["saved_flights"])) $_SESSION["saved_flights"] = [];
?>
<!DOCTYPE html>

<html>

<head>
    <title>Flight Schedule Search</title>
    <link rel="stylesheet" href="main_style.css">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {

            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(13, 191, 158, 1) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%);
        }

        label {
            color: white;
        }

        h1 {
            color: white;
            text-align: center;
            margin: 1em;
        }

        p {
            color:white;
        }

        form p {
            margin-right: 1em;
        }

        form.search {
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
            padding-bottom: .3em;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 10em;
            margin-right: 10em;
            border-style: solid;
            border-width: 0.05em;
            border-radius: 0.5em;
            border-color: white;
        }

        div.form-elts {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
        }

        input,
        button,
        select {
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

        td {
            background-color: white;
            padding: 1em;
            border-style: solid;
        }
    </style>

    <script>
        function get_airports_from()
        {
            var airport_from = document.getElementById("departure_from").value;

            var jsonObj = {
                "airport" : airport_from,
            };
            var data = JSON.stringify(jsonObj); 
                
            try
            {
                var asyncRequest = new XMLHttpRequest(); // create request
            
                // set up callback function and store it
                asyncRequest.addEventListener("readystatechange",
                    function() { 
                        if (asyncRequest.readyState === 4 && asyncRequest.status === 200)   update_from(asyncRequest.responseText); //alert(asyncRequest.responseText);
                        }, false);

                // send the asynchronous request
                asyncRequest.open( "POST", "get_airports.php", true ); 
                asyncRequest.setRequestHeader("Content-Type", "application/json" ); 
                asyncRequest.send(data); // send request        
            } // end try
            catch ( exception ) 
            {
                alert ( "Request Failed" );
            } // end catch 
        }

        function update_from(response) {
            var data = JSON.parse(response);
            var datalist_from = document.getElementById("iata_list");
            datalist_from.innerHTML = "";
            
            var matching_airports_from = data.matching_airports;

            for(var i = 0; i < matching_airports_from.length; i++)
            {
                datalist_from.innerHTML += "<option value=\"" + matching_airports_from[i] + "\">";
            }
        }

        function get_airports_to()
        {
            var airport_to = document.getElementById("arrival_to").value;

            var jsonObj = {
                "airport" : airport_to,
            };
            var data = JSON.stringify(jsonObj); 
                
            try
            {
                var asyncRequest = new XMLHttpRequest(); // create request
            
                // set up callback function and store it
                asyncRequest.addEventListener("readystatechange",
                    function() { 
                        if (asyncRequest.readyState === 4 && asyncRequest.status === 200)   update_to(asyncRequest.responseText); //alert(asyncRequest.responseText);
                        }, false);

                // send the asynchronous request
                asyncRequest.open( "POST", "get_airports.php", true ); 
                asyncRequest.setRequestHeader("Content-Type", "application/json" ); 
                asyncRequest.send(data); // send request        
            } // end try
            catch ( exception ) 
            {
                alert ( "Request Failed" );
            } // end catch 
        }

        function update_to(response) {
            var data = JSON.parse(response);
            var datalist_to = document.getElementById("iata_list_to");
            datalist_to.innerHTML = "";
            
            var matching_airports_to = data.matching_airports;

            for(var i = 0; i < matching_airports_to.length; i++)
            {
                datalist_to.innerHTML += "<option value=\"" + matching_airports_to[i] + "\">";
            }
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
                        <li><a class="active" href="flight_schedule_search.php">Flight Schedule Search</a></li>
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
    <h1>Search Flight Schedule</h1>

    <p style="text-align:center; margin-bottom: 2em;"><a href="save_flights.php">View saved flights</a>

    <p style="text-align:center; margin-bottom: 2em;">Search for specific flights scheduled by our airline</p>
    <form class="search" method="post" action="flight_schedule_search.php">
        <div class="form-elts">
            <p>
                <label for="departure_from">From</label>
                <input onchange="get_airports_from()" type="text" id="departure_from" name="departure_from" list="iata_list" required>
                <datalist id="iata_list">
                        
                </datalist>
            </p>
            <p>
                <label for="arrival_to">To</label>
                <input onchange="get_airports_to()" type="text" id="arrival_to" name="arrival_to" list="iata_list_to" required>
                <datalist id="iata_list_to">
                    
                </datalist>
            </p>
            <p>
                <label for="depart_on">Depart On</label>
                <input type="date" id="depart_on" name="depart_on" required>
            </p>
            <!-- <p>
                <label for="return_on">Return On</label>
                <input type="date" id="return_on" name="return_on" required>
            </p> -->

            <input type="submit" name="submit" value="Search">
        </div>
    </form>
    
    <?php
        
        require 'vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->Airline_Reservation;
    
        $flight_collection = $client->Airline_Reservation->Flights;

        $departure_from = isset($_POST[ "departure_from" ]) ? $_POST[ "departure_from" ] : "";
        $arrival_to = isset($_POST[ "arrival_to" ]) ? $_POST[ "arrival_to" ] : "";
        $depart_on = isset($_POST[ "depart_on" ]) ? $_POST[ "depart_on" ] : "";

        if(isset($_POST["submit"]))
        {
            $result = $flight_collection->find(['From' => $departure_from, 'To' => $arrival_to, 'Departure_Date' => $depart_on]);
            foreach($result as $entry)
            {
                $first_entry = $entry;
                break;
            }
            if(!isset($first_entry))
            {
                print("<p style=\"text-align:center;font-size:1.2em;margin:2em;color:white\">No results</p>");
            }
            else
            {
                print("<table style=\"margin-bottom: 9rem;\">");
                print("<thead>");
                print("<tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Save Flight?</th></tr>");
                print("</thead>");
                print("<tbody>");
                
                
                foreach ($result as $entry) {
                    print("<tr>");
                    print("<td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td><td>" . $entry['Departure_Date'] . "</td><td>" . $entry['Departure_Time'] . "</td>");
                    print("<td><form method=\"post\" action = \"flight_schedule_search.php\"><input style=\"margin-left:0.5em;\" type = \"submit\" name = \"save_flight\" value = \"Save\">");
                    print("<input type = \"hidden\" name = \"departure_from\" value = \"" . $entry['From'] . "\">");
                    print("<input type = \"hidden\" name = \"arrival_to\" value = \"" . $entry['To'] . "\">");
                    print("<input type = \"hidden\" name = \"departure_date\" value = \"" . $entry['Departure_Date'] . "\">");
                    print("<input type = \"hidden\" name = \"departure_time\" value = \"" . $entry['Departure_Time'] . "\">");
                    print("</form></td>");
                    print("</tr>");
                }
                print("</tbody>");
                print("</table>");
            }
            
        }
        if(isset($_POST["save_flight"]))
            {
                $departure_from = isset($_POST[ "departure_from" ]) ? $_POST[ "departure_from" ] : "";
                $arrival_to = isset($_POST[ "arrival_to" ]) ? $_POST[ "arrival_to" ] : "";
                $departure_date = isset($_POST[ "departure_date" ]) ? $_POST[ "departure_date"] : "";
                $departure_time = isset($_POST[ "departure_time" ]) ? $_POST[ "departure_time"] : "";

                if(!in_array([$departure_from, $arrival_to, $departure_date, $departure_time], $_SESSION["saved_flights"]))
                {
                    array_push($_SESSION["saved_flights"], [$departure_from, $arrival_to, $departure_date, $departure_time]);
                }
            }
    ?>
</body>

</html>