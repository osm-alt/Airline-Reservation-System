<?php
	require 'vendor/autoload.php';
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$database = $client->Airline_Reservation;
  //  $database -> createCollection('Customers');

    $customer_collection = $client->Airline_Reservation->Customers;
    define("encryption_method", "AES-128-CBC");
    define("key", "Thats my Kung Fu");
    
    $newCustomers = [
        		[
        			'Username' => 'omarmajzoub01',
        			'First_Name' => 'Omar',
                    'Last_Name' => 'Majzoub',
                    'Date_Of_Birth' => '01/02/2000',
                    'Cookie' => '',
                    'Email' => 'omar@hotmail.com',
                    'Password' => password_hash('password123', PASSWORD_DEFAULT),
                  'Credit_Card_Information' =>encrypt('1234 5678 9876 4321'),
                
                  
                ],
                [
        			'Username' => 'johndoe',
        			'First_Name' => 'John',
                    'Last_Name' => 'Doe',
                    'Date_Of_Birth' => '10/02/1996',
                    'Cookie' => '',
                    'Email' => 'johndoe@hotmail.com',
                    'Password' => password_hash('password345', PASSWORD_DEFAULT)
                ],
                [
        			'Username' => 'delilah_johnson',
        			'First_Name' => 'Delilah',
                    'Last_Name' => 'Johnson',
                    'Date_Of_Birth' => '23/12/2002',
                    'Cookie' => '',
                    'Email' => 'delilah_johnson@hotmail.com',
                    'Password' => password_hash('newyork345', PASSWORD_DEFAULT)
                ],
                [
        			'Username' => 'maroun_choucair',
        			'First_Name' => 'Maroun',
                    'Last_Name' => 'Choucair',
                    'Date_Of_Birth' => '22/11/1980',
                    'Cookie' => '',
                    'Email' => 'maroun_choucair@gmail.com',
                    'Password' => password_hash('webdev123', PASSWORD_DEFAULT)
                ],
                [
        			'Username' => 'shang_chi',
        			'First_Name' => 'Shang',
                    'Last_Name' => 'Chi',
                    'Date_Of_Birth' => '05/02/1990',
                    'Cookie' => '',
                    'Email' => 'shang_chi@yahoo.com',
                    'Password' => password_hash('pass_w0rd912', PASSWORD_DEFAULT)
                ],
        	];

        	
    $insertManyResult = $customer_collection->insertMany($newCustomers);

    //if we want to add cvv
    // $updateResult = $customer_collection->updateOne(
    //     [ 'Username' => 'omarmajzoub01' ],
    //     [ '$set' => [ 'cvv' => '123' ]]
    //  );
    
 //  $database -> createCollection('Bookings');

    $booking_collection = $client->Airline_Reservation->Bookings;

    $newBookings = [
        [
            'Brn' => 1,
            'Purchased' => True,
            'Flights' => [1],
            'Customer_Username' => 'omarmajzoub01',
            'Cabin_Class' => 'Business',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => 'None',
            'Special_Treatment' => 'Disabled person needs help walking',
            'Adults' => 1,
            'Children' => 1,
            'Infants' => 0,
            'Type_Of_Trip' => 'One-way',
            'Check_In' => False,
            'Adult_Meals' => ['Chicken with rice'],
            'Adult_Drinks' => ['Ayran'],
            'Children_Meals' => ['Turkey sandwich'],
            'Children_Drinks' => ['Orange juice'],
            'Price' => (round(60 * 1.4) + 10 + 10) * 1 + 10 + 3
        ],
        [
            'Brn' => 2,
            'Purchased' => True,
            'Flights' => [3],
            'Customer_Username' => 'johndoe',
            'Cabin_Class' => 'Economy',
            'Preferred_Seat_Location' => 'Window',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => 'Cat',
            'Adults' => 2,
            'Children' => 1,
            'Infants' => 0,
            'Type_Of_Trip' => 'One-way',
            'Check_In' => False,
            'Adult_Meals' => ['Chicken with rice','Ceaesar salad'],
            'Adult_Drinks' => ['Ayran','Coke'],
            'Children_Meals' => ['Chicken with rice'],
            'Children_Drinks' => ['Coke'],
            'Price' => (60 + 10 + 5 + 10) * 2 + round((60 + 10 + 5 + 10) * 0.75) + 10 * 3 + 2 + 2 + 3
        ],
        [
            'Brn' => 3,
            'Purchased' => False,
            'Flights' => [1,2],
            'Customer_Username' => 'delilah_johnson',
            'Cabin_Class' => 'Business',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => False,
            'Accompanying_Pet' => 'Dog',
            'Adults' => 1,
            'Children' => 1,
            'Infants' => 1,
            'Type_Of_Trip' => 'Round-Trip',
            'Check_In' => False,
            'Adult_Meals' => ['Turkey Sandwich'],
            'Adult_Drinks' => ['Apple Juice'],
            'Children_Meals' => ['Chicken with rice'],
            'Children_Drinks' => ['Coke'],
            'Price' => (round(90 * 1.4) + 5) * 1 + round((round(90 * 1.4) + 5) * 0.75) + round((round(90 * 1.4) + 5) * 0.5) + 10*2 + 2 + 3
        ],
        [
            'Brn' => 4,
            'Purchased' => True,
            'Flights' => [3,4],
            'Customer_Username' => 'maroun_choucair',
            'Cabin_Class' => 'First',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => 'Bird',
            'Adults' => 1,
            'Children' => 2,
            'Infants' => 1,
            'Type_Of_Trip' => 'Multi-City',
            'Check_In' => False,
            'Adult_Meals' => ['Chicken with rice'],
            'Adult_Drinks' => ['Coke'],
            'Children_Meals' => ['Chicken with rice','Turkey Sandwich'],
            'Children_Drinks' => ['Coke','Apple Juice'],
            'Price' => (round(105 * 1.75) + 10 + 5) * 1 + round((round(105 * 1.75) + 10 + 5) * 0.5) + 10 + 2
        ],
        [
            'Brn' => 5,
            'Purchased' => True,
            'Flights' => [9],
            'Customer_Username' => 'shang_chi',
            'Cabin_Class' => 'Economy',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => 'None',
            'Adults' => 1,
            'Children' => 1,
            'Infants' => 0,
            'Type_Of_Trip' => 'One-way',
            'Check_In' => False,
            'Adult_Meals' => ['Chicken with rice'],
            'Adult_Drinks' => ['Ayran'],
            'Children_Meals' => ['Turkey sandwich'],
            'Children_Drinks' => ['Orange juice'],
            'Price' => (60 + 10) * 1 + 10 + 2
        ],
    
    ];
    
    
    $insertManyResult = $booking_collection->insertMany($newBookings);

   // $database -> createCollection('Flights');

    $flight_collection = $client->Airline_Reservation->Flights;
    
    $newFlights = [
        [
            'Flight_ID' => 1,
            'Admin_Username' => 'Andrew',
            'From' => 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY',
            'To' => 'Disneyland Paris	France	DLP',
            'Departure_Date' => '2022-12-20',
            'Departure_Time' => '11:20',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 10,
            'FirstClass_Seats_Left' => 5
        ],
        [
            'Flight_ID' => 2,
            'Admin_Username' => 'Andrew',
            'From' => 'Disneyland Paris	France	DLP',
            'To' => 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY',
            'Departure_Date' => '2022-12-27',
            'Departure_Time' => '11:40',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 10,
            'FirstClass_Seats_Left' => 5
        ],
        [
            'Flight_ID' => 3,
            'Admin_Username' => 'Omar',
            'From' => 'Cairo - Cairo International Airport	Egypt	CAI',
            'To' => 'London Metropolitan Area	United Kingdom	LON',
            'Departure_Date' => '2023-01-29',
            'Departure_Time' => '05:35',
            'Economy_Seats_Left' => 12,
            'Business_Seats_Left' => 7,
            'FirstClass_Seats_Left' => 4
        ],
        [
            'Flight_ID' => 4,
            'Admin_Username' => 'Omar',
            'From' => 'London Metropolitan Area	United Kingdom	LON',
            'To' => 'Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA',
            'Departure_Date' => '2023-02-05',
            'Departure_Time' => '09:25',
            'Economy_Seats_Left' => 13,
            'Business_Seats_Left' => 8,
            'FirstClass_Seats_Left' => 5
        ],
        [
            'Flight_ID' => 5,
            'Admin_Username' => 'Robert',
            'From' => 'Dubai - Dubai International Airport	United Arab Emirates	DXB',
            'To' => 'Geneva - Geneva-Cointrin International Airport	Switzerland	GVA',
            'Departure_Date' => '2023-03-10',
            'Departure_Time' => '12:55',
            'Economy_Seats_Left' => 25,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 8
        ],
        [
            'Flight_ID' => 6,
            'Admin_Username' => 'Robert',
            'From' => 'Geneva - Geneva-Cointrin International Airport	Switzerland	GVA',
            'To' => 'Dubai - Dubai International Airport	United Arab Emirates	DXB',
            'Departure_Date' => '2023-03-17',
            'Departure_Time' => '12:00',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 7
        ],
        [
            'Flight_ID' => 7,
            'Admin_Username' => 'Andrew',
            'From' => 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY',
            'To' => 'Istanbul - Istanbul Atatürk Airport	Turkey	IST',
            'Departure_Date' => '2023-03-17',
            'Departure_Time' => '10:00',
            'Economy_Seats_Left' => 10,
            'Business_Seats_Left' => 3,
            'FirstClass_Seats_Left' => 2
        ],
        [
            'Flight_ID' => 8,
            'Admin_Username' => 'Omar',
            'From' => 'Jeddah - King Abdulaziz International	Saudi Arabia	JED',
            'To' => 'Doha - Doha International Airport	Qatar	DOH',
            'Departure_Date' => '2023-02-07',
            'Departure_Time' => '03:00',
            'Economy_Seats_Left' => 28,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 10
        ],
        [
            'Flight_ID' => 9,
            'Admin_Username' => 'Robert',
            'From' => 'Lagos - Murtala Muhammed Airport	Nigeria	LOS',
            'To' => 'Accra - Kotoka International Airport	Ghana	ACC',
            'Departure_Date' => '2023-01-10',
            'Departure_Time' => '12:00',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 7
        ],
        [
            'Flight_ID' => 10,
            'Admin_Username' => 'Robert',
            'From' => 'Accra - Kotoka International Airport	Ghana	ACC',
            'To' => 'Lagos - Murtala Muhammed Airport	Nigeria	LOS',
            'Departure_Date' => '2023-01-15',
            'Departure_Time' => '06:00',
            'Economy_Seats_Left' => 30,
            'Business_Seats_Left' => 16,
            'FirstClass_Seats_Left' => 10
        ]
        ];
        
        $insertManyResult = $flight_collection->insertMany($newFlights);

   // $database -> createCollection('Admin');

    $admin_collection = $client->Airline_Reservation->Admin;

    $newAdmins = [
        [
            'Username' => 'Andrew',
            'Password' => password_hash('RoverRovieEA', PASSWORD_DEFAULT),
            'Cookie' => ''
        ],
        [
            'Username' => 'Omar',
            'Password' => password_hash('Omar8319@hjs', PASSWORD_DEFAULT),
            'Cookie' => ''
        ],
        [
            'Username' => 'Robert',
            'Password' => password_hash('Rob932@691', PASSWORD_DEFAULT),
            'Cookie' => ''
        ],
    ];
    
    
    $insertManyResult = $admin_collection->insertMany($newAdmins);
function encrypt($data) {

    $key = key;
    $plaintext = $data;
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
    return $ciphertext;
}
function decrypt($data) {
    $key = key;
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    if (hash_equals($hmac, $calcmac))
    {
        return $original_plaintext;
    }
}
?>