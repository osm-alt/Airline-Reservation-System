<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$customers = $client->Airline_Reservation->Customers;
$result = $customers->find();
$flag = 0;

// $username = "";
// foreach($result as $entry)
// {
//     $username = $entry['Username'];
//     $flag=1;
//     break;
// } 

$us = [];
foreach ($result as $entry) {
    array_push($us, $entry['Username']);
}

// USERNAME IS UNIQUE, WE CANNOT ALLOW 2 USERS TO HAVE THE SAME ONE!
// $usernameResult = $customer_collection->find(['Username' => $_POST["username"]]);

// foreach ($usernameResult as $searchFor) {
//     $storedUsername = $searchFor['Username'];
//     if ($inputtedUsername == $storedUsername) {
//         $flag = 1;
//     }
// }



// $bookings_collection = $client->Airline_Reservation->Bookings;

// $result = $bookings_collection->find(['Customer_Username' => $username]);

// $brns = [];
// foreach ($result as $entry) {
//     array_push($brns, $entry['Brn']);
// }

// $matching_airports = [];
// for($i = 0; $i < count($airports); $i++)
// {
//     if(str_contains(strtolower($airports[$i]), strtolower($data['airport'])))
//     {
//         array_push($matching_airports, $airports[$i]);
//     }
// }

// $returned_array = ['matching_airports' => $matching_airports];

// $jsonData = json_encode($returned_array);




$jsonData = json_encode($us);
echo $jsonData;
