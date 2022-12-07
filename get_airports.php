<?php
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $airports = ["Abidjan	Cote d'Ivoire	ABJ",
    "Abu Dhabi - Abu Dhabi International	United Arab Emirates	AUH",
    "Accra - Kotoka International Airport	Ghana	ACC",
    "Amsterdam - Amsterdam Airport Schiphol	Netherlands	AMS",
    "Athens - Elefthérios Venizélos International Airport	Greece	ATH",
    "Basra, Basrah	Iraq	BSR",
    "Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY",
    "Bergamo/Milan - Orio Al Serio	Italy	BGY",
    "Brussels - Brussels Airport	Belgium	BRU",
    "Cairo - Cairo International Airport	Egypt	CAI",
    "Copenhagen - Copenhagen Airport	Denmark	CPH",
    "Dammam, King Fahad International	Saudi Arabien	DMM",
    "Disneyland Paris	France	DLP",
    "Doha - Doha International Airport	Qatar	DOH",
    "Dubai - Dubai International Airport	United Arab Emirates	DXB",
    "East London	South Africa	ELS",
    "Eriwan (Yerevan, Jerevan)	Armenia	EVN",
    "Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA",
    "Geneva - Geneva-Cointrin International Airport	Switzerland	GVA",
    "Istanbul - Istanbul Atatürk Airport	Turkey	IST",
    "Jeddah - King Abdulaziz International	Saudi Arabia	JED",
    "Kuwait - Kuwait International	Kuwait	KWI",
    "Lagos - Murtala Muhammed Airport	Nigeria	LOS",
    "Larnaca	Cyprus	LCA",
    "London Metropolitan Area	United Kingdom	LON",
    "Madinah (Medina) - Mohammad Bin Abdulaziz	Saudi Arabia	MED",
    "Madrid - Barajas Airport	Spain	MAD",
    "Milan	Italy	MIL",
    "Nice - Cote D'Azur Airport	France	NCE",
    "Paris	France	PAR",
    "Riyadh - King Khaled International	Saudi Arabia	RUH",
    "Rome	Italy	ROM"];

    $matching_airports = [];
    for($i = 0; $i < count($airports); $i++)
    {
        if(str_contains(strtolower($airports[$i]), strtolower($data['airport'])))
        {
            array_push($matching_airports, $airports[$i]);
        }
    }

    $returned_array = ['matching_airports' => $matching_airports];

    $jsonData = json_encode($returned_array);
    echo $jsonData;
?>