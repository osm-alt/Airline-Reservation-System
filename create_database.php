<?php
	require 'vendor/autoload.php';

	$client = new MongoDB\Client("mongodb://localhost:27017");
	$database = $client->Airline_Reservation;
    //$database -> createCollection('Customers');

    $customer_collection = $client->Airline_Reservation->Customers;
    
    $newCustomers = [
        		[
        			'Username' => 'omarmajzoub01',
        			'First_Name' => 'Omar',
                    'Last_Name' => 'Majzoub',
                    'Date_Of_Birth' => '01/02/2000',
                    'Cookie' => '',
                    'Email' => 'omar@hotmail.com',
                    'Password' => password_hash('password123', PASSWORD_DEFAULT)
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
    
    //$database -> createCollection('Bookings');

    $booking_collection = $client->Airline_Reservation->Bookings;

    $newBookings = [
        [
            'Customer_Username' => 'omarmajzoub01',
            'Cabin_Class' => 'Business',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => True,
            'Adults' => 1,
            'Children' => 0,
            'Infants' => 0,
            'Type_Of_Trip' => 'One-way',
            'Check_In' => True,
            'Meals' => ['Adult1' => 'Chicken with rice'],
            'Drinks' => ['Adult2' => 'Coke']
        ],
        [
            'Customer_Username' => 'johndoe',
            'Cabin_Class' => 'Economy',
            'Preferred_Seat_Location' => 'Window',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => False,
            'Adults' => 2,
            'Children' => 1,
            'Infants' => 0,
            'Type_Of_Trip' => 'One-way',
            'Check_In' => True,
            'Meals' => 'Chicken with rice',
            'Drinks' => 'Apple Juice',
        ],
        [
            'Customer_Username' => 'delilah_johnson',
            'Cabin_Class' => 'Business',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => False,
            'Accompanying_Pet' => False,
            'Adults' => 1,
            'Children' => 0,
            'Infants' => 1,
            'Type_Of_Trip' => 'Round-Trip',
            'Check_In' => False,
            'Meals' => 'Turkey Sandwich',
            'Drinks' => 'Orange Juice',
        ],
        [
            'Customer_Username' => 'maroun_choucair',
            'Cabin_Class' => 'First',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => True,
            'Adults' => 1,
            'Children' => 1,
            'Infants' => 1,
            'Type_Of_Trip' => 'Multi-City',
            'Check_In' => True,
            'Meals' => 'Ceasar Salad',
            'Drinks' => 'Sprite',
        ],
        [
            'Customer_Username' => 'shang_chi',
            'Cabin_Class' => 'Economy',
            'Preferred_Seat_Location' => 'Aisle',
            'Airport_Pick_Up' => True,
            'Accompanying_Pet' => True,
            'Adults' => 1,
            'Children' => 0,
            'Infants' => 0,
            'Type_Of_Trip' => 'One-way',
            'Check_In' => True,
            'Meals' => 'Chicken with rice',
            'Drinks' => 'Ayran',
        ],
    
    ];
    
    
    $insertManyResult = $booking_collection->insertMany($newBookings);

    //$database -> createCollection('Flights');

    $flight_collection = $client->Airline_Reservation->Flights;
    
    $newFlights = [
        [
            'Admin_Username' => 'Andrew',
            //'BRN' => ,
            'From' => 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY',
            'To' => 'Disneyland Paris	France	DLP',
            'Departure_Date' => '2022-12-20',
            'Departure_Time' => '11:20 AM',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 10,
            'FirstClass_Seats_Left' => 5
        ],
        [
            'Admin_Username' => 'Andrew',
            'BRN' => $flight_collection->find([]),
            'From' => 'Disneyland Paris	France	DLP',
            'To' => 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY',
            'Departure_Date' => '2022-12-27',
            'Departure_Time' => '11:40 AM',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 10,
            'FirstClass_Seats_Left' => 5
        ],
        [
            'Admin_Username' => 'Omar',
            'BRN' => $flight_collection->find([]),
            'From' => 'Cairo - Cairo International Airport	Egypt	CAI',
            'To' => 'London Metropolitan Area	United Kingdom	LON',
            'Departure_Date' => '2023-01-29',
            'Departure_Time' => '05:35 PM',
            'Economy_Seats_Left' => 12,
            'Business_Seats_Left' => 7,
            'FirstClass_Seats_Left' => 4
        ],
        [
            'Admin_Username' => 'Omar',
            'BRN' => $flight_collection->find([]),
            'From' => 'London Metropolitan Area	United Kingdom	LON',
            'To' => 'Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA',
            'Departure_Date' => '2023-02-05',
            'Departure_Time' => '09:25 PM',
            'Economy_Seats_Left' => 13,
            'Business_Seats_Left' => 8,
            'FirstClass_Seats_Left' => 5
        ],
        [
            'Admin_Username' => 'Robert',
            'BRN' => $flight_collection->find([]),
            'From' => 'Dubai - Dubai International Airport	United Arab Emirates	DXB',
            'To' => 'Geneva - Geneva-Cointrin International Airport	Switzerland	GVA',
            'Departure_Date' => '2023-03-10',
            'Departure_Time' => '12:55 AM',
            'Economy_Seats_Left' => 25,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 8
        ],
        [
            'Admin_Username' => 'Robert',
            'BRN' => $flight_collection->find([]),
            'From' => 'Geneva - Geneva-Cointrin International Airport	Switzerland	GVA',
            'To' => 'Dubai - Dubai International Airport	United Arab Emirates	DXB',
            'Departure_Date' => '2023-03-17',
            'Departure_Time' => '12:00 AM',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 7
        ],
        [
            'Admin_Username' => 'Andrew',
            'BRN' => $flight_collection->find([]),
            'From' => 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY',
            'To' => 'Istanbul - Istanbul Atatürk Airport	Turkey	IST',
            'Departure_Date' => '2023-03-17',
            'Departure_Time' => '10:00 AM',
            'Economy_Seats_Left' => 10,
            'Business_Seats_Left' => 3,
            'FirstClass_Seats_Left' => 2
        ],
        [
            'Admin_Username' => 'Omar',
            'BRN' => $flight_collection->find([]),
            'From' => 'Jeddah - King Abdulaziz International	Saudi Arabia	JED',
            'To' => 'Doha - Doha International Airport	Qatar	DOH',
            'Departure_Date' => '2023-02-07',
            'Departure_Time' => '03:00 AM',
            'Economy_Seats_Left' => 28,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 10
        ],
        [
            'Admin_Username' => 'Robert',
            'BRN' => $flight_collection->find([]),
            'From' => 'Lagos - Murtala Muhammed Airport	Nigeria	LOS',
            'To' => 'Accra - Kotoka International Airport	Ghana	ACC',
            'Departure_Date' => '2023-01-10',
            'Departure_Time' => '12:00 AM',
            'Economy_Seats_Left' => 20,
            'Business_Seats_Left' => 15,
            'FirstClass_Seats_Left' => 7
        ],
        [
            'Admin_Username' => 'Robert',
            'BRN' => $flight_collection->find([]),
            'From' => 'Accra - Kotoka International Airport	Ghana	ACC',
            'To' => 'Lagos - Murtala Muhammed Airport	Nigeria	LOS',
            'Departure_Date' => '2023-01-15',
            'Departure_Time' => '06:00 PM',
            'Economy_Seats_Left' => 30,
            'Business_Seats_Left' => 16,
            'FirstClass_Seats_Left' => 10
        ]

        ];
        

    //$database -> createCollection('Admin');

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
?>