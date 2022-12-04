    <?php
        require 'vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");

        $customers = $client->Airline_Reservation->Customers;
        $result = $customers->find(['Cookie' => $_COOKIE["username"]]);

        $username = "";
        foreach($result as $entry)
        {
            $username = $entry['Username'];
            break;
        } 

        $bookings_collection = $client->Airline_Reservation->Bookings;

        $result = $bookings_collection->find(['Customer_Username' => $username]);
        
        $brns = [];
        foreach ($result as $entry) {
            array_push($brns, $entry['Brn']);
        }

        $jsonData = json_encode($brns);
        echo $jsonData;
      ?>