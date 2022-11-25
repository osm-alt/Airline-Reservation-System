<!DOCTYPE html>
<html>

<head>
    <title>Results</title>
    <style>
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
</head>



<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Airline_Reservation;

$flight_collection = $client->Airline_Reservation->Flights;

$customer_collection = $client->Airline_Reservation->Customers;



if (isset($_POST["searchFlights"])) {
    print("<table>");
    print("<thead>");
    print("<tr><th>Flight ID</th><th>From</th><th>To</th><th>Departure Date</th><th>Depart Time</th><th>Economy Seats</th><th>Business Seats</th><th>FirstClass Seats</th> </tr>");
    print("</thead>");
    print("<tbody>");

    $result = $flight_collection->find();
    foreach ($result as $entry) {


        print("<tr>");
        print("<td>" . $entry['Flight_ID'] . "</td><td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td>" . "<td>" . $entry['Departure_Date'] . "</td>" . "<td>" . $entry['Departure_Time'] . "</td>" . "<td>" . $entry['Economy_Seats_Left'] . "</td>" . "<td>" . $entry['Business_Seats_Left'] . "</td>" . "<td>" . $entry['FirstClass_Seats_Left'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}




if (isset($_POST["searchCustomers"])){ 

    print("<table>");
    print("<thead>");
    print("<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Email</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $customer_collection->find();
    foreach ($result as $entry) {


        print("<tr>");
        print("<td>" . $entry['Username'] . "</td><td>" . $entry['First_Name'] . "</td><td>" . $entry['Last_Name'] . "</td>" . "<td>" . $entry['Date_Of_Birth'] . "</td>" . "<td>" . $entry['Email'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}




if (isset($_POST["addFlight"])){ 

    $flight_id = $_POST['Flight_ID'];
    $admin_id = $_POST['Admin_Username'];
    $from = $_POST['From'];
    $to = $_POST['To'];
    $departure_date = $_POST['Departure_Date'];
    $departure_time = $_POST['Departure_Time'];
    $economy_seats = $_POST['Economy_Seats_Left'];
    $business_seats = $_POST['Business_Seats_Left'];
    $firstclass_seats = $_POST['FirstClass_Seats_Left'];

    $flight_collection = $client->Airline_Reservation->Flights;

    $flight_collection->insertOne([
        'Flight_ID' => $flight_id,
        'Admin_Username' => $admin_id,
        'From' => $from,
        'To' => $to,
        'Departure_Date' => $departure_date,
        'Departure_Time' => $departure_time,
        'Economy_Seats_Left' => $economy_seats,
        'Business_Seats_Left' => $business_seats,
        'FirstClass_Seats_Left' => $firstclass_seats
    ]);
    
    // print("<table>");
    // print("<thead>");
    // print("<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Email</th></tr>");
    // print("</thead>");
    // print("<tbody>");

    // $result = $customer_collection->find();
    // foreach ($result as $entry) {



    //     print("<tr>");
    //     print("<td>" . $entry['Username'] . "</td><td>" . $entry['First_Name'] . "</td><td>" . $entry['Last_Name'] . "</td>" . "<td>" . $entry['Date_Of_Birth'] . "</td>" . "<td>" . $entry['Email'] . "</td>");
    //     print("</form></td>");
    //     print("</tr>");
    // }
    // print("</tbody>");
    // print("</table>");
}



if (isset($_POST["deleteFlight"])){ 

    print("<table>");
    print("<thead>");
    print("<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Email</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $customer_collection->find();
    foreach ($result as $entry) {

        // $storedUsername = $entry['Username'];
        // $storedFN = $entry['First_Name'];
        // $storedLN = $entry['Last_Name'];
        // $storedDOB = $entry['Date_Of_Birth'];
        // $storedEmail = $entry['Email'];


        print("<tr>");
        print("<td>" . $entry['Username'] . "</td><td>" . $entry['First_Name'] . "</td><td>" . $entry['Last_Name'] . "</td>" . "<td>" . $entry['Date_Of_Birth'] . "</td>" . "<td>" . $entry['Email'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}

?>