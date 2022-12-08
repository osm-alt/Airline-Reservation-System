<!DOCTYPE html>

<html>

<head>
    <title>Manage Booking</title>
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

        h3 {
            color: white;
        }

        p {
            color: white;
        }

        form {
            padding: 1em;
            margin-top: 1em;
        }

        form.view-booking {
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
            padding-bottom: .3em;
            margin-top: 2em;
            margin-bottom: 1em;
            margin-left: 20em;
            margin-right: 20em;
            border-style: solid;
            border-width: 0.05em;
            border-radius: 0.5em;
            border-color: white;
        }

        input[type=submit] {
            font-size: 1.2em;
            background-color: rgb(84, 201, 247);
            color: white;
            border-radius: .5em;
        }

        form p {
            margin-right: 1em;
        }

        div.form-elts-search {
            padding-left: 2em;
            padding-top: 1em;
            display: flex;
            flex-wrap: wrap;
        }

        div.form-elts {
            display: flex;
            flex-wrap: wrap;
        }

        input[type=submit].view {
            margin-left: 5em;
            position: relative;
            bottom: .5em;
        }

        input,
        select {
            box-sizing: border-box;
            padding: .5em;
            margin: 1em;
        }

        .price_div {
            color:white;
        }

        fieldset {
            border-color: white;
        }

        legend {
            color: white;
        }

        table {
            margin-top: 2em;
            text-align: center;
            width: 30%;
            margin-left: 35%;
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

        var trip_type;
        var cabin_class;
        
        var meals;
        var drinks;
        var airport_pickup;
        var pet;
        var special_treatment;
        var adults;
        var children;
        var infants;
        var currency;
        var adults_meals_and_drinks;
        var children_meals_and_drinks;

        //initial values
        var initial_adults;
        var initial_children;
        var initial_infants;
        var initial_class;
        var initial_seat;
        var initial_airport_pickup;
        var initial_pet;
        var initial_special_treatment;
        var initial_adult_meals;
        var initial_adult_drinks;
        var initial_children_meals;
        var initial_children_drinks;
        var initial_price;

        function start(adults_number, children_number, adult_meals, adult_drinks, children_meals, children_drinks) {
            trip_type = document.getElementById("trip_type");
            cabin_class = document.getElementById("cabin");
            
            //meals = document.getElementById("special_meals");
            //drinks = document.getElementById("drinks");
            airport_pickup = document.getElementById("airport_pickup");
            pet = document.getElementById("pet");
            special_treatment = document.getElementById("special_treatment");
            adults = document.getElementById("adults");
            children = document.getElementById("children");
            infants = document.getElementById("infants");
            currency = document.getElementById("currency");
            modification_currency = document.getElementById("modification_currency");
            adults_meals_and_drinks = document.getElementById("adults_meals_and_drinks");
            children_meals_and_drinks = document.getElementById("children_meals_and_drinks");
            account_for_adult_passengers(adults_number, adult_meals, adult_drinks);
            account_for_child_passengers(children_number, children_meals, children_drinks);

            initial_adults = adults.innerText;
            initial_children = children.innerText;
            initial_infants = infants.innerText;
            initial_class = cabin_class.value;
            
            initial_airport_pickup = airport_pickup.checked; //to see if customer booked for airport pickup initially
            initial_pet = pet.value;
            initial_special_treatment = special_treatment.value;

            initial_adult_meals = [];

            for (var x = 0; x < parseInt(adults.innerText); x++) {
                initial_adult_meals.push(document.getElementById("special_meals_for_adult" + (x + 1)).value);
            }

            initial_adult_drinks = [];

            for (var x = 0; x < parseInt(adults.innerText); x++) {
                initial_adult_drinks.push(document.getElementById("drink_for_adult" + (x + 1)).value);
            }

            initial_children_meals = [];

            for (var x = 0; x < parseInt(children.innerText); x++) {
                initial_children_meals.push(document.getElementById("special_meals_for_child" + (x + 1)).value);
            }

            initial_children_drinks = [];

            for (var x = 0; x < parseInt(children.innerText); x++) {
                initial_children_drinks.push(document.getElementById("drink_for_child" + (x + 1)).value);
            }

            initial_price = document.getElementById("price").innerText; //in dollars
        }

        function ask_for_confirmation() {
            var modification_form = document.getElementById("modification_form");
            modification_form.addEventListener( "submit", 
                function() 
                {
                    if(confirmSubmit() == false)
                    {
                        event.preventDefault();
                    } 
                }, // end anonymous function
                false );
        }

        function confirmSubmit() 
        {
            return confirm( "Are you sure you want to submit?" );   
        }

        //change number displayed meals and drinks inputs for adult passengers
        function account_for_adult_passengers(adults_number, adult_meals, adult_drinks) {
            for(var x = 1; x <= parseInt(adults_number); x++)
            {
                meals_and_drinks_div = document.createElement("div");
                meals_and_drinks_div.setAttribute("class", "form-elts");
                new_meal = document.createElement("p");
                label_for_meal = document.createElement("label");
                label_for_meal.for = "special_meals_for_adult" + x;
                label_for_meal.innerText = "Special meal for adult " + x;
                new_meal.appendChild(label_for_meal);

                meal_list = document.createElement("select");
                meal_list.id = "special_meals_for_adult" + x;
                meal_list.name = "special_meals_for_adult" + x;
                meal_list.innerHTML = "";
                
                meal = adult_meals[x - 1];

                meal_options = ['None', 'Turkey sandwich', 'Chicken with rice', 'Ceasar Salad'];

                for(i = 0; i < meal_options.length; i++)
                {
                    if(meal_options[i] == meal)
                    {
                        meal_list.innerHTML += "<option selected>" + meal + "</option>";
                    }
                    else
                    {
                        meal_list.innerHTML += "<option>" + meal_options[i] + "</option>";
                    }
                }
                // meal_list.innerHTML = "<option selected>None</option>" +
                //     "<option>Turkey sandwich</option>" +
                //     "<option>Chicken with rice</option>" +
                //     "<option>Ceasar Salad</option>";

                new_meal.appendChild(meal_list);

                meals_and_drinks_div.appendChild(new_meal);

                new_drink = document.createElement("p");
                label_for_drink = document.createElement("label");
                label_for_drink.for = "drink_for_adult" + x;
                label_for_drink.innerText = "Drink for adult " + x;
                new_drink.appendChild(label_for_drink);

                drink_list = document.createElement("select");
                drink_list.id = "drink_for_adult" + x;
                drink_list.name = "drink_for_adult" + x;
                drink_list.innerHTML = "";

                drink = adult_drinks[x - 1];

                drink_options = ['Water','Orange juice', 'Apple juice', 'Coke', 'Sprite', 'Mirinda', 'Ayran'];

                for(i = 0; i < drink_options.length; i++)
                {
                    if(drink_options[i] == drink)
                    {
                        drink_list.innerHTML += "<option selected>" + drink + "</option>";
                    }
                    else
                    {
                        drink_list.innerHTML += "<option>" + drink_options[i] + "</option>";
                    }
                }
                // drink_list.innerHTML = "<option selected>Water</option>" +
                //     "<option>Orange juice</option>" +
                //     "<option>Apple juice</option>" +
                //     "<option>Coke</option>" +
                //     "<option>Sprite</option>" +
                //     "<option>Mirinda</option>" +
                //     "<option>Ayran</option>";

                new_drink.appendChild(drink_list);

                meals_and_drinks_div.appendChild(new_drink);

                adults_meals_and_drinks.appendChild(meals_and_drinks_div);
            }

        }

        //change number displayed meals and drinks inputs for child passengers
        function account_for_child_passengers(children_number, children_meals, children_drinks) {
            for(var x = 1; x <= parseInt(children_number); x++)
            {
                meals_and_drinks_div = document.createElement("div");
                meals_and_drinks_div.setAttribute("class", "form-elts");
                new_meal = document.createElement("p");
                label_for_meal = document.createElement("label");
                label_for_meal.for = "special_meals_for_child" + x;
                label_for_meal.innerText = "Special meal for child " + x;
                new_meal.appendChild(label_for_meal);

                meal_list = document.createElement("select");
                meal_list.id = "special_meals_for_child" + x;
                meal_list.name = "special_meals_for_child" + x;

                meal_list.innerHTML = "";

                meal = children_meals[x - 1];

                meal_options = ['None', 'Turkey sandwich', 'Chicken with rice', 'Ceasar Salad'];

                for(i = 0; i < meal_options.length; i++)
                {
                    if(meal_options[i] == meal)
                    {
                        meal_list.innerHTML += "<option selected>" + meal + "</option>";
                    }
                    else
                    {
                        meal_list.innerHTML += "<option>" + meal_options[i] + "</option>";
                    }
                }

                // meal_list.innerHTML = "<option selected>None</option>" +
                //     "<option>Turkey sandwich</option>" +
                //     "<option>Chicken with rice</option>" +
                //     "<option>Ceasar Salad</option>";

                new_meal.appendChild(meal_list);

                meals_and_drinks_div.appendChild(new_meal);

                new_drink = document.createElement("p");
                label_for_drink = document.createElement("label");
                label_for_drink.for = "drink_for_child" + x;
                label_for_drink.innerText = "Drink for child " + x;
                new_drink.appendChild(label_for_drink);

                drink_list = document.createElement("select");
                drink_list.id = "drink_for_child" + x;
                drink_list.name = "drink_for_child" + x;

                drink_list.innerHTML = "";

                drink = children_drinks[x - 1];

                drink_options = ['Water','Orange juice', 'Apple juice', 'Coke', 'Sprite', 'Mirinda', 'Ayran'];

                for(i = 0; i < drink_options.length; i++)
                {
                    if(drink_options[i] == drink)
                    {
                        drink_list.innerHTML += "<option selected>" + drink + "</option>";
                    }
                    else
                    {
                        drink_list.innerHTML += "<option>" + drink_options[i] + "</option>";
                    }
                }

                // drink_list.innerHTML = "<option selected>Water</option>" +
                //     "<option>Orange juice</option>" +
                //     "<option>Apple juice</option>" +
                //     "<option>Coke</option>" +
                //     "<option>Sprite</option>" +
                //     "<option>Mirinda</option>" +
                //     "<option>Ayran</option>";

                new_drink.appendChild(drink_list);

                meals_and_drinks_div.appendChild(new_drink);

                children_meals_and_drinks.appendChild(meals_and_drinks_div);
            }

        }

        var modification_fees;

        function compute_modification_price() {
            displayed_price = document.getElementById("modification_fees");
            modification_fees = 0;
            if (cabin_class.value != initial_class) {
                if (initial_class == "Economy class") {
                    if (cabin_class.value == "Business class") {
                        modification_fees = Math.round(parseInt(initial_price) * 1.4) - parseInt(initial_price);
                        modification_fees += 5; //additional modification fee
                    }
                    else if (cabin_class.value == "First class") {
                        modification_fees = Math.round(parseInt(initial_price) * 1.75) - parseInt(initial_price);
                        modification_fees += 5; //additional modification fee
                    }
                }
                else if (initial_class == "Business class") {
                    if (cabin_class.value == "Economy class") {
                        modification_fees += 5; //charge for downgrading
                    }
                    else if (cabin_class.value == "First class") {
                        modification_fees = Math.round(parseInt(initial_price) * (1.75 / 1.4)) - parseInt(initial_price);
                        modification_fees += 5; //additional modification fee
                    }
                }
                else //it was first class
                {
                    modification_fees += 10; //charge for downgrading
                }

            }

            // if (seat_location.value != initial_seat) {
            //     modification_fees += 5;
            // }

            if (airport_pickup.checked != initial_airport_pickup) {
                modification_fees += 10;
            }

            if (pet.value != initial_pet) {
                modification_fees += 5;
            }

            if (special_treatment.value != initial_special_treatment) {
                modification_fees += 7;
            }

            initial_fees = modification_fees;

            for (var x = 1; x <= adults_meals_and_drinks.childElementCount; x++) {
                var adult_meal = document.getElementById("special_meals_for_adult" + x);
                if (adult_meal.value != initial_adult_meals[x - 1]) {
                    modification_fees += 5;
                }

                var adult_drink = document.getElementById("drink_for_adult" + x);
                if (adult_drink.value != initial_adult_drinks[x - 1]) {
                    modification_fees += 2;
                }
            }

            for (var x = 1; x <= children_meals_and_drinks.childElementCount; x++) {
                var child_meal = document.getElementById("special_meals_for_child" + x);
                if (child_meal.value != initial_children_meals[x - 1]) {
                    modification_fees += 5;
                }

                var child_drink = document.getElementById("drink_for_child" + x);
                if (child_drink.value != initial_children_drinks[x - 1]) {
                    modification_fees += 2;
                }
            }

            var modification_fees_sent = document.getElementById("modification_fees_sent");
            modification_fees_sent.value = parseFloat(modification_fees);

            if (modification_currency.value == "€") {
                modification_fees *= 1.03;
            }
            else if (modification_currency.value == "£") {
                modification_fees *= 0.9;
            }
            else if (modification_currency.value == "L.L") {
                modification_fees *= 40000;
            }

            modification_fees = modification_fees.toFixed(2);

            displayed_price.innerText = modification_fees;
            
        }

        

        function change_currency_initial_price() {
            displayed_price = document.getElementById("price");

            if (currency.value == "€") {
                price = parseInt(initial_price) * 1.03;
            }
            else if (currency.value == "£") {
                price = parseInt(initial_price) * 0.9;
            }
            else if (currency.value == "L.L") {
                price = parseInt(initial_price) * 40000;
            }
            else {
                price = parseInt(initial_price); //in dollars
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
                        <li><a class="active" href="manage_booking.php">Manage Booking</a></li>
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
    <h1>Manage Booking</h1>
    <p style="text-align:center;">View your reservations and make changes to your flight details</p>

    <?php
        if(!isset($_COOKIE["username"]))
        {
            print("<p style=\"text-align:center;color:white;margin-top:1em\">Please <a href=\"login.php\">login</a> before managing bookings.</p>");
            die();
        } 
    ?> 

    <table id="brn-table"></table>
    <script>     
        try
        {
            var asyncRequest = new XMLHttpRequest(); // create request
        
            // set up callback function and store it
            asyncRequest.addEventListener("readystatechange",
                function() { 
                    if (asyncRequest.readyState === 4 && asyncRequest.status === 200)   create_brn_table(asyncRequest.responseText); 
                    //alert(asyncRequest.responseText);
                    }, false);

            // send the asynchronous request
            asyncRequest.open( "GET", "get_brns.php", true ); 
            asyncRequest.setRequestHeader("Content-Type", "application/json" ); 
            asyncRequest.send(); // send request        
        } // end try
        catch ( exception ) 
        {
            alert ( "Request Failed" );
        } // end catch 
        
        function create_brn_table(response) {
            var data = JSON.parse(response);
            var table = document.getElementById("brn-table");
            table.innerHTML = `<table style=\"margin-bottom: 9rem;\">
            <thead>
            <tr><th>Booking reference numbers of your bookings/reservations</th></tr>
            </thead>
            <tbody>`;
            for(var i = 0; i < data.length; i++)
            {
                table.innerHTML += "<tr><td>" + data[i] + "</td></tr>";
            }
            table.innerHTML += "</tbody>";
        }
    </script>

    <form method="post" action="manage_booking.php" class="view-booking">
        <div class="form-elts-search">
            <p>
                <label for="booking_reference">Booking Reference Number</label>
                <input type="text" name="booking_reference" id="booking_reference" required>
            </p>
            <input type="submit" name="view_reservation" value="View Reservation" class="view">
        </div>
    </form>

    <div style="text-align:center; margin-top: 1em; float: right; margin-left: 1em; margin-right: 1em;">
        <img src="bookingPics/istockphoto-950695812-612x612.jpg" alt="Book a flight">
    </div>

    <?php
        if(isset($_POST['view_reservation']))
        {
            require 'vendor/autoload.php';

            $client = new MongoDB\Client("mongodb://localhost:27017");
        
            $customers = $client->Airline_Reservation->Customers;
            $customer = $customers->findOne(['Cookie' => $_COOKIE["username"]]);

            $bookings_collection = $client->Airline_Reservation->Bookings;
    
            $brn = isset($_POST[ "booking_reference" ]) ? $_POST[ "booking_reference" ] : "";
                
            $entry = $bookings_collection->findOne(['Brn' => intval($brn), 'Customer_Username' => $customer['Username']]);

            if(!$entry)
            {
                print("<p style=\"text-align:center; color:white; margin-left:10em;\">You do not have a reservation/booking with that number.</p>");
                die();
            }
            print("<fieldset style=\"margin: 1em;\">");
            print("<legend style=\"margin-left: 2em;\">Reservation</legend>");
            print("<form method=\"post\" id=\"modification_form\" action=\"process_booking.php\" onchange=\"compute_modification_price()\">");
            print("<input type=\"hidden\" name=\"brn\" value=\"$brn\">");
            print("<p>");
            $trip_type = $entry['Type_Of_Trip'];
            print("Type of Trip: <span id=\"trip_type\">$trip_type</span>");
            print("</p>");
            print("<div class=\"form-elts\" style=\"margin-top:1em;\">");
            print("<p style=\"margin-right: 2em;\">");
            
            $flights_collection = $client->Airline_Reservation->Flights;
            $flight_one = $flights_collection->findOne(['Flight_ID' => $entry['Flights'][0]]);               
            $from_flight_one = $flight_one['From'];
            print("From: $from_flight_one");
            print("</p>");
            print("<p>");
            $to_flight_one = $flight_one['To'];
            print("To: $to_flight_one");
            print("</p>");
            print("</div>");
            print("<div class=\"form-elts\" style=\"margin-top:1em; margin-bottom: 1em;\">");
            print("<p style=\"margin-right: 2em;\">");
            $depart_on_flight_one = $flight_one['Departure_Date'];
            print("<input type=\"hidden\" name=\"departure_date\" value=\"$depart_on_flight_one\">");
            print("Depart On: $depart_on_flight_one");
            print("</p>");
            if($trip_type == "Round-trip")
            {
                print("<p style=\"margin-right: 2em;\">");
                $flight_two = $flights_collection->findOne(['Flight_ID' => $entry['Flights'][1]]);  
                $depart_on_flight_two = $flight_two['Departure_Date'];
                print("Return On: $depart_on_flight_two");
                print("</p>");
            }
            
            print("<p>");
            $departure_time_flight_one = $flight_one['Departure_Time'];
            print("Departure Time: $departure_time_flight_one");
            print("</p>");
            print("</div>");

            if($trip_type == "Multi-city")
            {
                print("<div class=\"form-elts\" style=\"margin-top:1em;\">");
                print("<p style=\"margin-right: 2em;\">");
                
                $flight_two = $flights_collection->findOne(['Flight_ID' => $entry['Flights'][1]]);               
                $from_flight_two = $flight_two['From'];
                print("From: $from_flight_two");
                print("</p>");
                print("<p>");
                $to_flight_two = $flight_two['To'];
                print("To: $to_flight_two");
                print("</p>");
                print("</div>");
                print("<div class=\"form-elts\" style=\"margin-top:1em; margin-bottom: 1em;\">");
                print("<p style=\"margin-right: 2em;\">");
                $depart_on_flight_two = $flight_two['Departure_Date'];
                print("Depart On: $depart_on_flight_two");
                print("</p>");
                
                print("<p>");
                $departure_time_flight_two = $flight_two['Departure_Time'];
                print("Departure Time: $departure_time_flight_two");
                print("</p>");
                print("</div>");
            }

            print("<div class=\"form-elts\">");
            print("<p>");
            print("<label for=\"cabin\">Cabin class</label>");
            print("<select id=\"cabin\" name=\"cabin\">");
            $cabin = $entry['Cabin_Class'];
            if($cabin == "Economy class")
            {
                print("<option selected>Economy class</option>");
                print("<option>Business class</option>");
                print("<option>First class</option>");
            }
            else if($cabin == "Business class")
            {
                print("<option>Economy class</option>");
                print("<option selected>Business class</option>");
                print("<option>First class</option>");
            }
            else if($cabin == "First class")
            {
                print("<option>Economy class</option>");
                print("<option>Business class</option>");
                print("<option selected>First class</option>");
            }
            
            print("</select>");
            print("</p>");
            
            print("</div>");
            print("<div class=\"form-elts\" style=\"margin-top:1em; margin-bottom: 1em;\">");
            print("<p>");
            $preferred_seat = $entry['Preferred_Seat_Location'];
            print("Preferred seat location for person who booked: $preferred_seat");
            print("</p>");
            print("</div>");
            
            print("<p>");
            print("<label>Airport pick-up: </label>");
            $airport_pick_up = $entry['Airport_Pick_Up'];
            print("<label>Yes</label>");
            if($airport_pick_up)
            {
                print("<input type=\"radio\" id=\"airport_pickup\" name=\"airport_pickup\" value=\"yes\" checked>");
                print("<label>No</label>");
                print("<input type=\"radio\" name=\"airport_pickup\" value=\"no\">");
            }
            else {
                print("<input type=\"radio\" id=\"airport_pickup\" name=\"airport_pickup\" value=\"yes\">");
                print("<label>No</label>");
                print("<input type=\"radio\" name=\"airport_pickup\" value=\"no\" checked>");
            }
            print("</p>");
            print("<p>");
            print("<label for=\"pet\">Accompanying pet</label>");
            print("<select id=\"pet\" name=\"pet\">");
            $pets = ['None', 'Dog', 'Cat', 'Bird'];
            $accompanying_pet = $entry['Accompanying_Pet'];
            foreach($pets as $pet)
            {
                if($pet == $accompanying_pet)
                {
                    print("<option selected>$accompanying_pet</option>");
                }
                else
                {
                    print("<option>$pet</option>");
                }
            }
            print("</select>");
            print("</p>");

            print("<p>");
            print("<label for=\"special_treatment\">Please specify a special treatment if needed:</label>");
            $special_treatment = $entry['Special_Treatment'];
            print("<input type=\"text\" id=\"special_treatment\" name=\"special_treatment\" value=\"$special_treatment\">");
            print("</p>");

            print("<h3 style=\"margin-top: 1em;\">Passengers</h3>");
            print("<div class=\"form-elts\" style=\"margin-top: 1em;\">");
            print("<p>");
            $adults = $entry['Adults'];
            print("<input type=\"hidden\" name=\"adults_search\" value=\"$adults\">");
            print("<label for=\"adults\">Adults (12+ years): </label>");
            print("<span id=\"adults\">$adults</span>");
            print("</p>");
            print("<p>");
            $children = $entry["Children"];
            print("<input type=\"hidden\" name=\"children_search\" value=\"$children\">");
            print("<label for=\"children\">Children (2-12 years): </label>");
            print("<span id=\"children\">$children</span>");
            print("</p>");
            print("<p>");
            $infants = $entry['Infants'];
            print("<label for=\"infants\">Infants (0-23 months): </label>");
            print("<span id=\"infants\">$infants</span>");
            print("</p>");
            print("</div>");

            print("<h3 style=\"margin-top: 1em;\">Meals and Drinks</h3>");
            print("<div id=\"meals_and_drinks\">");
            print("<div id=\"adults_meals_and_drinks\"></div>");
            print("<div id=\"children_meals_and_drinks\"></div>");

            print("</div>");

            print("<hr style=\"margin-top: 1em;\">");
            print("<div class=\"price_div\" style=\"font-size: 1.2em; margin-top: 1em;\">");
            $initial_price = intval($entry['Price']);
            print("<strong>Initial price: <span id=\"price\">$initial_price</span></strong>");

            print("<select id=\"currency\" name=\"currency\" style=\"font-size:0.75em; margin-left: .3em; border-color: silver;\" onchange=\"change_currency_initial_price()\">");
            print("<option selected>$</option>");
            print("<option>&euro;</option>");
            print("<option>&#163;</option>");
            print("<!--pound-->");
            print("<option>L.L</option>");
            print("</select>");
            print("</div>");
            print("<div class=\"price_div\" style=\"font-size: 1.2em; margin-top: 1em;\">");
            print("<strong>Modification fees: <span id=\"modification_fees\">0.00</span></strong>");
            print("<input type=\"hidden\" id=\"modification_fees_sent\" name=\"modification_fees_sent\">");
            print("<select id=\"modification_currency\" name=\"modification_currency\" style=\"font-size:0.75em; margin-left: .3em; border-color: silver;\">");
            print("<option selected>$</option>");
            print("<option>&euro;</option>");
            print("<option>&#163;</option>");
            print("<!--pound-->");
            print("<option>L.L</option>");
            print("</select>");
            print("</div>");

            print("<p>");
            if($entry['Purchased'] == False)
            {
                print("<input type=\"submit\" name=\"buy_reservation\" value=\"Buy Tickets\" style=\"background-color: green;\">");
            }
            print("<input type=\"submit\" name=\"modify_booking\" value=\"Submit Changes\">");
            print("<input type=\"submit\" name=\"cancel_booking\" value=\"Cancel Booking\" style=\"background-color: red;\">");
            print("</p>");
            print("</form>");
            print("</fieldset>");

            $adult_meals = [];
            foreach($entry['Adult_Meals'] as $adult_meal)
            {
                array_push($adult_meals, "\"$adult_meal\"");
            }
            $adult_meals = implode($adult_meals);
            $adult_drinks = [];
            foreach($entry['Adult_Drinks'] as $adult_drink)
            {
                array_push($adult_drinks, "\"$adult_drink\"");
            }
            $adult_drinks = implode($adult_drinks);
            $children_meals = [];
            foreach($entry['Children_Meals'] as $child_meal)
            {
                array_push($children_meals, "\"$child_meal\"");
            }
            $children_meals = implode($children_meals);
            $children_drinks = [];
            foreach($entry['Children_Drinks'] as $child_drink)
            {
                array_push($children_drinks, "\"$child_drink\"");
            }
            $children_drinks = implode($children_drinks);
            
            print("<script>start($adults, $children, [$adult_meals], [$adult_drinks], [$children_meals], [$children_drinks]);</script>");
            print("<script>ask_for_confirmation();</script>");
        }
    ?>
    
</body>

</html>