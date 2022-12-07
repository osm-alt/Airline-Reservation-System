<!DOCTYPE html>

<html>

<head>
    <title>Book a trip</title>
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

        h1  {
            color: white;
            text-align: center;
            margin: 1em;
        }

        h3 {
            color: white;
        }

        form.styled {
            padding: 1em;
            margin-top: 1em;
        }

        button {
            background-color: skyblue;
        }

        input[type=submit],
        input[type=button],
        input[type=reset] {
            font-size: 1.2em;
            background-color: rgb(84, 201, 247);
            color: white;
            border-radius: .5em;
        }

        form p {
            margin-right: 1em;
            color: white;
        }

        div.form-elts,
        div.form-elts-span {
            display: flex;
            flex-wrap: wrap;
        }

        div.form-elts-span p {
            margin-top: 1em;
            margin-right: 1em;
        }

        input,
        button,
        select {
            box-sizing: border-box;
            padding: .5em;
            margin: 1em;
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

        table caption {
            color:white;
            margin-bottom: 1.5em;
            font-size: 1.3em;
        }

        td {
            background-color: white;
            padding: 1em;
            border-style: solid;
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
    </style>

    <script>
        //each flight in flights has [from, to, economy seats left, business seats left, first class seats left, departure date, departure time]
        //var flights = [['Geneva - Geneva-Cointrin International Airport\tSwitzerland\tGVA', 'Kuwait - Kuwait International\tKuwait\tKWI', 20, 2, 0, '11\\29\\2022', '03:30 PM'], ['Dubai - Dubai International Airport\tUnited Arab Emirates\tDXB', 'Abu Dhabi - Abu Dhabi International\tUnited Arab Emirates\tAUH', 49, 15, 8, '11\\23\\2022', '09:19 AM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'Riyadh - King Khaled International\tSaudi Arabia\tRUH', 36, 18, 1, '05\\04\\2024', '07:08 AM'], ['Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 'Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 9, 13, 9, '11\\12\\2023', '09:08 AM'], ['London Metropolitan Area\tUnited Kingdom\tLON', 'Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 1, 9, 0, '11\\30\\2022', '07:32 AM'], ['Milan\tItaly\tMIL', 'Doha - Doha International Airport\tQatar\tDOH', 12, 9, 6, '06\\05\\2023', '07:54 AM'], ['Disneyland Paris\tFrance\tDLP', 'Athens - Elefthérios Venizélos International Airport\tGreece\tATH', 6, 14, 2, '12\\07\\2022', '09:11 PM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'Doha - Doha International Airport\tQatar\tDOH', 49, 18, 8, '11\\23\\2022', '02:22 PM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'Basra, Basrah\tIraq\tBSR', 31, 11, 5, '10\\20\\2023', '11:06 PM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'Copenhagen - Copenhagen Airport\tDenmark\tCPH', 3, 1, 10, '11\\18\\2022', '08:31 AM'], ['Paris\tFrance\tPAR', 'Doha - Doha International Airport\tQatar\tDOH', 4, 20, 1, '05\\27\\2024', '11:03 AM'], ['Accra - Kotoka International Airport\tGhana\tACC', "Nice - Cote D'Azur Airport\tFrance\tNCE", 47, 18, 0, '03\\22\\2024', '07:08 PM'], ['Disneyland Paris\tFrance\tDLP', 'Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 35, 4, 3, '12\\19\\2022', '05:35 PM'], ['Doha - Doha International Airport\tQatar\tDOH', 'Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 25, 3, 3, '09\\12\\2023', '03:17 PM'], ['Disneyland Paris\tFrance\tDLP', 'Dubai - Dubai International Airport\tUnited Arab Emirates\tDXB', 43, 3, 10, '08\\02\\2023', '04:26 AM'], ["Abidjan\tCote d'Ivoire\tABJ", 'Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 2, 11, 4, '11\\18\\2022', '08:30 PM'], ['Cairo - Cairo International Airport\tEgypt\tCAI', 'Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 5, 5, 4, '09\\07\\2024', '02:23 PM'], ['Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', "Nice - Cote D'Azur Airport\tFrance\tNCE", 14, 11, 0, '09\\01\\2024', '10:26 AM'], ['Copenhagen - Copenhagen Airport\tDenmark\tCPH', 'Bergamo/Milan - Orio Al Serio\tItaly\tBGY', 0, 17, 2, '12\\12\\2022', '03:29 PM'], ['Rome\tItaly\tROM', 'Accra - Kotoka International Airport\tGhana\tACC', 21, 3, 5, '11\\12\\2024', '11:40 PM'], ['Larnaca\tCyprus\tLCA', 'Brussels - Brussels Airport\tBelgium\tBRU', 20, 15, 1, '11\\30\\2024', '03:32 PM'], ['Riyadh - King Khaled International\tSaudi Arabia\tRUH', 'Milan\tItaly\tMIL', 23, 18, 3, '11\\08\\2023', '08:20 PM'], ['Doha - Doha International Airport\tQatar\tDOH', 'Kuwait - Kuwait International\tKuwait\tKWI', 0, 13, 1, '10\\28\\2024', '11:48 AM'], ['Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 'Madrid - Barajas Airport\tSpain\tMAD', 22, 17, 9, '05\\27\\2023', '12:22 AM'], ['Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 'Larnaca\tCyprus\tLCA', 23, 15, 2, '10\\25\\2023', '07:46 PM'], ['Copenhagen - Copenhagen Airport\tDenmark\tCPH', 'Disneyland Paris\tFrance\tDLP', 42, 16, 2, '03\\30\\2024', '04:05 AM'], ['Rome\tItaly\tROM', 'Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)\tGermany\tFRA', 28, 20, 5, '12\\18\\2022', '10:54 AM'], ['Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 'Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 14, 14, 6, '11\\21\\2022', '12:10 AM'], ['Doha - Doha International Airport\tQatar\tDOH', 'Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 23, 1, 8, '01\\24\\2023', '07:22 AM'], ['Copenhagen - Copenhagen Airport\tDenmark\tCPH', 'Dammam, King Fahad International\tSaudi Arabien\tDMM', 0, 9, 9, '03\\03\\2023', '06:35 PM'], ['Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 'Brussels - Brussels Airport\tBelgium\tBRU', 42, 9, 0, '12\\17\\2022', '02:10 PM'], ['East London\tSouth Africa\tELS', 'Rome\tItaly\tROM', 18, 10, 8, '05\\06\\2023', '02:13 AM'], ['Brussels - Brussels Airport\tBelgium\tBRU', 'Paris\tFrance\tPAR', 6, 17, 2, '11\\05\\2023', '08:27 AM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'Dammam, King Fahad International\tSaudi Arabien\tDMM', 0, 17, 6, '12\\12\\2022', '06:04 PM'], ['Brussels - Brussels Airport\tBelgium\tBRU', 'Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', 0, 14, 4, '02\\22\\2024', '04:55 AM'], ['Geneva - Geneva-Cointrin International Airport\tSwitzerland\tGVA', 'Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 12, 2, 4, '11\\27\\2022', '07:35 AM'], ['Cairo - Cairo International Airport\tEgypt\tCAI', 'Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 12, 17, 5, '01\\25\\2023', '05:41 PM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', 18, 6, 2, '11\\18\\2024', '11:52 AM'], ['Kuwait - Kuwait International\tKuwait\tKWI', 'Dammam, King Fahad International\tSaudi Arabien\tDMM', 5, 14, 9, '12\\18\\2022', '06:22 PM'], ['Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 'Madrid - Barajas Airport\tSpain\tMAD', 20, 4, 5, '11\\21\\2022', '12:41 AM'], ['Larnaca\tCyprus\tLCA', "Abidjan\tCote d'Ivoire\tABJ", 28, 8, 10, '12\\06\\2023', '06:21 AM'], ["Nice - Cote D'Azur Airport\tFrance\tNCE", 'Brussels - Brussels Airport\tBelgium\tBRU', 28, 11, 3, '11\\29\\2022', '06:44 PM'], ['Dammam, King Fahad International\tSaudi Arabien\tDMM', 'Dubai - Dubai International Airport\tUnited Arab Emirates\tDXB', 17, 6, 4, '09\\25\\2023', '08:23 AM'], ['Disneyland Paris\tFrance\tDLP', 'Riyadh - King Khaled International\tSaudi Arabia\tRUH', 40, 19, 7, '08\\01\\2024', '04:09 PM'], ['Milan\tItaly\tMIL', 'Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 14, 16, 8, '01\\22\\2024', '12:28 PM'], ['Lagos - Murtala Muhammed Airport\tNigeria\tLOS', "Nice - Cote D'Azur Airport\tFrance\tNCE", 22, 17, 1, '12\\06\\2022', '07:53 PM'], ['Abu Dhabi - Abu Dhabi International\tUnited Arab Emirates\tAUH', 'Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 26, 18, 8, '12\\24\\2022', '07:49 PM'], ['Abu Dhabi - Abu Dhabi International\tUnited Arab Emirates\tAUH', 'Larnaca\tCyprus\tLCA', 42, 4, 0, '04\\26\\2023', '05:59 PM'], ['Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 'Disneyland Paris\tFrance\tDLP', 4, 11, 8, '09\\16\\2023', '08:44 PM'], ["Nice - Cote D'Azur Airport\tFrance\tNCE", 'Doha - Doha International Airport\tQatar\tDOH', 39, 13, 2, '11\\10\\2023', '05:29 PM'], ['Istanbul - Istanbul Atatürk Airport\tTurkey\tIST', 'Athens - Elefthérios Venizélos International Airport\tGreece\tATH', 20, 11, 6, '11\\11\\2024', '02:28 AM'], ['Bergamo/Milan - Orio Al Serio\tItaly\tBGY', 'East London\tSouth Africa\tELS', 20, 17, 6, '10\\02\\2024', '04:00 PM'], ['Dammam, King Fahad International\tSaudi Arabien\tDMM', 'Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 7, 1, 4, '12\\27\\2022', '01:27 AM'], ['Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 'Paris\tFrance\tPAR', 11, 10, 7, '08\\28\\2023', '10:42 PM'], ["Nice - Cote D'Azur Airport\tFrance\tNCE", 'Dubai - Dubai International Airport\tUnited Arab Emirates\tDXB', 25, 20, 0, '10\\01\\2024', '06:37 PM'], ['Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 'Disneyland Paris\tFrance\tDLP', 16, 18, 9, '04\\21\\2023', '03:52 PM'], ['Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', 'Cairo - Cairo International Airport\tEgypt\tCAI', 19, 13, 3, '12\\15\\2022', '06:19 AM'], ['Kuwait - Kuwait International\tKuwait\tKWI', 'Bergamo/Milan - Orio Al Serio\tItaly\tBGY', 23, 6, 0, '11\\17\\2023', '04:37 AM'], ['Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', 'Basra, Basrah\tIraq\tBSR', 17, 7, 8, '12\\28\\2022', '07:16 PM'], ['Accra - Kotoka International Airport\tGhana\tACC', "Abidjan\tCote d'Ivoire\tABJ", 48, 19, 9, '11\\22\\2022', '01:03 AM'], ['Dammam, King Fahad International\tSaudi Arabien\tDMM', 'Bergamo/Milan - Orio Al Serio\tItaly\tBGY', 6, 0, 8, '08\\23\\2024', '08:14 PM'], ['Geneva - Geneva-Cointrin International Airport\tSwitzerland\tGVA', 'Kuwait - Kuwait International\tKuwait\tKWI', 50, 13, 0, '11\\15\\2022', '03:55 AM'], ['Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', 'Copenhagen - Copenhagen Airport\tDenmark\tCPH', 10, 10, 9, '12\\22\\2022', '01:46 AM'], ['Geneva - Geneva-Cointrin International Airport\tSwitzerland\tGVA', 'Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 18, 15, 1, '11\\15\\2022', '10:21 AM'], ['Disneyland Paris\tFrance\tDLP', 'Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 19, 8, 2, '04\\07\\2024', '03:29 PM'], ['Copenhagen - Copenhagen Airport\tDenmark\tCPH', 'Amsterdam - Amsterdam Airport Schiphol\tNetherlands\tAMS', 12, 5, 0, '12\\23\\2022', '12:50 AM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', "Nice - Cote D'Azur Airport\tFrance\tNCE", 24, 5, 4, '11\\18\\2022', '12:56 AM'], ['Bergamo/Milan - Orio Al Serio\tItaly\tBGY', 'Kuwait - Kuwait International\tKuwait\tKWI', 42, 11, 3, '12\\05\\2023', '03:08 PM'], ['Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 'Abu Dhabi - Abu Dhabi International\tUnited Arab Emirates\tAUH', 17, 20, 6, '12\\02\\2022', '12:10 AM'], ['Dammam, King Fahad International\tSaudi Arabien\tDMM', 'Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 8, 1, 2, '05\\17\\2024', '03:38 PM'], ['Abu Dhabi - Abu Dhabi International\tUnited Arab Emirates\tAUH', 'Disneyland Paris\tFrance\tDLP', 45, 5, 5, '12\\10\\2022', '01:08 AM'], ['Accra - Kotoka International Airport\tGhana\tACC', 'Dubai - Dubai International Airport\tUnited Arab Emirates\tDXB', 22, 8, 10, '02\\24\\2023', '01:51 AM'], ['Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 'Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)\tGermany\tFRA', 14, 10, 6, '01\\29\\2024', '03:50 AM'], ['Larnaca\tCyprus\tLCA', 'Kuwait - Kuwait International\tKuwait\tKWI', 7, 3, 6, '03\\19\\2024', '03:47 AM'], ['Madrid - Barajas Airport\tSpain\tMAD', 'Basra, Basrah\tIraq\tBSR', 50, 20, 8, '02\\02\\2024', '04:46 AM'], ['Doha - Doha International Airport\tQatar\tDOH', 'Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 8, 13, 4, '07\\20\\2024', '09:28 PM'], ['Kuwait - Kuwait International\tKuwait\tKWI', 'Istanbul - Istanbul Atatürk Airport\tTurkey\tIST', 30, 9, 8, '07\\23\\2024', '02:21 PM'], ['Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 'Athens - Elefthérios Venizélos International Airport\tGreece\tATH', 39, 6, 4, '11\\22\\2022', '04:01 AM'], ['Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 'Doha - Doha International Airport\tQatar\tDOH', 46, 18, 6, '02\\17\\2023', '12:03 PM'], ['Accra - Kotoka International Airport\tGhana\tACC', 'Milan\tItaly\tMIL', 0, 10, 7, '07\\08\\2023', '08:12 AM'], ['Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', "Abidjan\tCote d'Ivoire\tABJ", 28, 16, 3, '11\\22\\2024', '02:12 PM'], ['Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 'Riyadh - King Khaled International\tSaudi Arabia\tRUH', 22, 6, 4, '09\\29\\2024', '08:54 PM'], ['Kuwait - Kuwait International\tKuwait\tKWI', 'Madrid - Barajas Airport\tSpain\tMAD', 48, 15, 3, '09\\30\\2024', '05:48 AM'], ['Basra, Basrah\tIraq\tBSR', 'Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 2, 5, 3, '10\\25\\2024', '05:11 AM'], ['Lagos - Murtala Muhammed Airport\tNigeria\tLOS', 'Paris\tFrance\tPAR', 35, 4, 5, '12\\26\\2024', '10:45 AM'], ['Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 'East London\tSouth Africa\tELS', 3, 1, 9, '12\\10\\2022', '01:28 PM'], ['Larnaca\tCyprus\tLCA', 'Doha - Doha International Airport\tQatar\tDOH', 37, 18, 3, '11\\30\\2022', '05:06 AM'], ['Dubai - Dubai International Airport\tUnited Arab Emirates\tDXB', 'Disneyland Paris\tFrance\tDLP', 40, 19, 7, '04\\27\\2024', '09:06 AM'], ['Istanbul - Istanbul Atatürk Airport\tTurkey\tIST', 'Madinah (Medina) - Mohammad Bin Abdulaziz\tSaudi Arabia\tMED', 14, 2, 5, '06\\10\\2023', '06:18 PM'], ['Dammam, King Fahad International\tSaudi Arabien\tDMM', 'East London\tSouth Africa\tELS', 42, 6, 7, '01\\25\\2024', '04:45 AM'], ['Copenhagen - Copenhagen Airport\tDenmark\tCPH', 'Kuwait - Kuwait International\tKuwait\tKWI', 18, 10, 0, '03\\18\\2024', '11:37 AM'], ['London Metropolitan Area\tUnited Kingdom\tLON', 'Eriwan (Yerevan, Jerevan)\tArmenia\tEVN', 36, 10, 9, '07\\28\\2023', '10:06 PM'], ['Larnaca\tCyprus\tLCA', 'Istanbul - Istanbul Atatürk Airport\tTurkey\tIST', 21, 8, 4, '04\\01\\2024', '10:44 PM'], ['East London\tSouth Africa\tELS', 'Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 27, 0, 3, '10\\02\\2023', '08:05 PM'], ['Accra - Kotoka International Airport\tGhana\tACC', 'Beirut - Beirut Rafic Hariri International Airport\tLebanon\tBEY', 47, 9, 5, '02\\03\\2023', '02:20 PM'], ['Kuwait - Kuwait International\tKuwait\tKWI', 'Cairo - Cairo International Airport\tEgypt\tCAI', 43, 1, 4, '09\\05\\2023', '02:17 PM'], ['Dammam, King Fahad International\tSaudi Arabien\tDMM', 'Paris\tFrance\tPAR', 38, 5, 4, '01\\22\\2024', '09:58 PM'], ["Nice - Cote D'Azur Airport\tFrance\tNCE", 'Paris\tFrance\tPAR', 48, 12, 3, '11\\22\\2022', '01:37 AM'], ['Istanbul - Istanbul Atatürk Airport\tTurkey\tIST', 'Jeddah - King Abdulaziz International\tSaudi Arabia\tJED', 6, 4, 2, '05\\08\\2023', '12:02 AM'], ['Doha - Doha International Airport\tQatar\tDOH', "Abidjan\tCote d'Ivoire\tABJ", 11, 19, 0, '11\\23\\2022', '12:55 AM']]
        var test_flights = [
            ['Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY', 'Disneyland Paris	France	DLP', 20, 10, 5, "2022-12-20", "11:20 AM"],
            ['Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY', 'Disneyland Paris	France	DLP', 20, 10, 5, "2022-12-20", "11:40 AM"],
            ['Disneyland Paris	France	DLP', 'Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY', 20, 10, 5, "2022-12-27", "11:40 AM"]
        ]
        function check_trip_type() {
            var departure_from = document.getElementById("departure_from");
            var arrival_to = document.getElementById("arrival_to");
            var depart_on = document.getElementById("depart_on");
            var return_on = document.getElementById("return_on");

            var departure_from_second = document.getElementById("departure_from_second");
            var arrival_to_second = document.getElementById("arrival_to_second");
            var depart_on_second = document.getElementById("depart_on_second");

            if (document.getElementById("trip_type").innerText == "Round-trip") {
                document.getElementById("return").style.display = "block";
                document.getElementById("second-city").style.display = "none";
                document.getElementById("return_on").required = true;
                document.getElementById("departure_from_second").required = false;
                document.getElementById("arrival_to_second").required = false;
                document.getElementById("depart_on_second").required = false;

            }
            else if (document.getElementById("trip_type").innerText == "One-way") {
                document.getElementById("return").style.display = "none";
                document.getElementById("second-city").style.display = "none";
                document.getElementById("return_on").required = false;
                document.getElementById("departure_from_second").required = false;
                document.getElementById("arrival_to_second").required = false;
                document.getElementById("depart_on_second").required = false;
            }
            else if (document.getElementById("trip_type").innerText == "Multi-city") {
                document.getElementById("return").style.display = "none";
                document.getElementById("second-city").style.display = "flex";
                document.getElementById("return_on").required = false;
                document.getElementById("departure_from_second").required = true;
                document.getElementById("arrival_to_second").required = true;
                document.getElementById("depart_on_second").required = true;
            }
        }


        function check_trip_type_search() {
            if (document.getElementById("trip_type_search").value == "Round-trip") {
                document.getElementById("return_search").style.display = "block";
                document.getElementById("second-city_search").style.display = "none";
                document.getElementById("return_on_search").required = true;
                document.getElementById("departure_from_second_search").required = false;
                document.getElementById("arrival_to_second_search").required = false;
                document.getElementById("depart_on_second_search").required = false;
            }
            else if (document.getElementById("trip_type_search").value == "One-way") {
                document.getElementById("return_search").style.display = "none";
                document.getElementById("second-city_search").style.display = "none";
                document.getElementById("return_on_search").required = false;
                document.getElementById("departure_from_second_search").required = false;
                document.getElementById("arrival_to_second_search").required = false;
                document.getElementById("depart_on_second_search").required = false;
            }
            else if (document.getElementById("trip_type_search").value == "Multi-city") {
                document.getElementById("return_search").style.display = "none";
                document.getElementById("second-city_search").style.display = "flex";
                document.getElementById("return_on_search").required = false;
                document.getElementById("departure_from_second_search").required = true;
                document.getElementById("arrival_to_second_search").required = true;
                document.getElementById("depart_on_second_search").required = true;
            }
        }

        function check_passengers_in_search() {
            if ((document.getElementById("adults_search").value == "0" && document.getElementById("children_search").value == "0") || (parseInt(document.getElementById("infants_search").value) > 0 && document.getElementById("adults_search").value == "0")) {
                document.getElementById("search").style.display = "none";
            }
            else {
                document.getElementById("search").style.display = "inline";
            }
        }

        window.addEventListener("load", start);

        var trip_type;
        var cabin_class;
        var seat_location;
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

        var search_button;
        var trip_type_search;
        var cabin_class_search;
        var adults_search;
        var children_search;
        var infants_search;
        var departure_from_search;
        var arrival_to_search;
        var depart_on_search;
        var return_on_search;
        var departure_from_second_search;
        var arrival_to_second_search;
        var depart_on_second_search;
        var return_on_second_search;
        var search_form;

        function start() {
            //search_button = document.getElementById("search");
            search_form = document.getElementById("search_form");

            // search_button.addEventListener("click", search_for_flights, false);

            // search_form.addEventListener("submit", function (e) {
            //     e.preventDefault();
            //     search_for_flights();
            // })


            trip_type_search = document.getElementById("trip_type_search");
            cabin_class_search = document.getElementById("cabin_search");
            adults_search = document.getElementById("adults_search");
            children_search = document.getElementById("children_search");
            infants_search = document.getElementById("infants_search");
            departure_from_search = document.getElementById("departure_from_search");
            arrival_to_search = document.getElementById("arrival_to_search");
            depart_on_search = document.getElementById("depart_on_search");
            return_on_search = document.getElementById("return_on_search");
            departure_from_second_search = document.getElementById("departure_from_second_search");
            arrival_to_second_search = document.getElementById("arrival_to_second_search");;
            depart_on_second_search = document.getElementById("depart_on_second_search");
            return_on_second_search = document.getElementById("return_on_second_search");

        }


        // function search_for_flights() {
        //     var passengers_count = parseInt(adults_search.value) + parseInt(children_search.value) + parseInt(infants_search.value);
        //     var results_div = document.getElementById("flight_results");
        //     results_div.innerHTML = "";

        //     var first_flight_results = [];
        //     var second_flight_results = [];

        //     for (var i = 0; i < test_flights.length; i++) {
        //         if (trip_type_search.value == "One-way") {
        //             if (cabin_class_search.value == "Economy class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][2] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]);
        //                 }
        //             }
        //             else if (cabin_class_search.value == "Business class") {

        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][3] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]);
        //                 }
        //             }
        //             else if (cabin_class_search.value == "First class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][4] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]);
        //                 }
        //             }
        //         }
        //         else if (trip_type_search.value == "Round-trip") {
        //             if (cabin_class_search.value == "Economy class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][2] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]); //departure flight
        //                 }
        //                 if (test_flights[i][0] == arrival_to_search.value && test_flights[i][1] == departure_from_search.value && passengers_count <= test_flights[i][2] && return_on_search.value == test_flights[i][5]) {
        //                     second_flight_results.push(test_flights[i]); //return flight
        //                 }
        //             }
        //             else if (cabin_class_search.value == "Business class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][3] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]); //departure
        //                 }
        //                 if (test_flights[i][0] == arrival_to_search.value && test_flights[i][1] == departure_from_search.value && passengers_count <= test_flights[i][3] && return_on_search.value == test_flights[i][5]) {
        //                     second_flight_results.push(test_flights[i]); //return flight
        //                 }
        //             }
        //             else if (cabin_class_search.value == "First class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][4] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]); //departure
        //                 }
        //                 if (test_flights[i][0] == arrival_to_search.value && test_flights[i][1] == departure_from_search.value && passengers_count <= test_flights[i][4] && return_on_search.value == test_flights[i][5]) {
        //                     second_flight_results.push(test_flights[i]); //return flight
        //                 }
        //             }
        //         }
        //         else if (trip_type_search.value == "Multi-city") {
        //             if (cabin_class_search.value == "Economy class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][2] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]); //first flight
        //                 }
        //                 if (test_flights[i][0] == departure_from_second_search.value && test_flights[i][1] == arrival_to_second_search.value && passengers_count <= test_flights[i][2] && depart_on_second_search.value == test_flights[i][5]) {
        //                     second_flight_results.push(test_flights[i]); //second flight
        //                 }
        //             }
        //             else if (cabin_class_search.value == "Business class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][3] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]); //first flight
        //                 }
        //                 if (test_flights[i][0] == departure_from_second_search.value && test_flights[i][1] == arrival_to_second_search.value && passengers_count <= test_flights[i][3] && depart_on_second_search.value == test_flights[i][5]) {
        //                     second_flight_results.push(test_flights[i]); //second flight
        //                 }
        //             }
        //             else if (cabin_class_search.value == "First class") {
        //                 if (test_flights[i][0] == departure_from_search.value && test_flights[i][1] == arrival_to_search.value && passengers_count <= test_flights[i][4] && depart_on_search.value == test_flights[i][5]) {
        //                     first_flight_results.push(test_flights[i]); //first flight
        //                 }
        //                 if (test_flights[i][0] == departure_from_second_search.value && test_flights[i][1] == arrival_to_second_search.value && passengers_count <= test_flights[i][4] && depart_on_second_search.value == test_flights[i][5]) {
        //                     second_flight_results.push(test_flights[i]); //second flight
        //                 }
        //             }
        //         }

        //     }

        //     if (trip_type_search.value == "One-way") {
        //         if (first_flight_results.length == 0) {
        //             results_div.innerHTML = "<p style=\"text-align:center;font-size:1.2em;margin:2em\">No results</p>";
        //         }
        //         else {
        //             results_table = document.createElement("table");
        //             results_table.innerHTML = "<caption>Pick your first flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>";
        //             for (var i = 0; i < first_flight_results.length; i++) {
        //                 var button_cell = "<td><input type=\"radio\" name=\"first_flight_result\" id=\"first_flight_result" + i + "\"></td>";
        //                 results_table.innerHTML += "<tr>" + "<td>" + first_flight_results[i][0] + "</td>" + "<td>" + first_flight_results[i][1] + "</td>" + "<td>" + first_flight_results[i][5] + "</td>" + "<td>" + first_flight_results[i][6] + "</td>" + button_cell + "</tr>";
        //             }
        //             results_table.innerHTML += "</tbody>"
        //             results_div.appendChild(results_table);
        //             var book_trip_button = document.createElement("input");
        //             book_trip_button.type = "button";
        //             book_trip_button.value = "Book a trip";
        //             book_trip_button.style.margin = "2em";
        //             book_trip_button.style.position = "relative";
        //             book_trip_button.style.left = "6em";

        //             results_div.appendChild(book_trip_button);
        //             book_trip_button.addEventListener("click", startBooking, false);
        //         }
        //     }
        //     else if (trip_type_search.value == "Round-trip" || trip_type_search.value == "Multi-city") {
        //         if (first_flight_results.length == 0 || second_flight_results.length == 0) {
        //             results_div.innerHTML = "<p style=\"text-align:center;font-size:1.2em;margin:2em\">No results for specified round-trip/multi-city flight</p>";
        //         }
        //         else {
        //             results_table = document.createElement("table");
        //             results_table.innerHTML = "<caption>Pick your first flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>";
        //             for (var i = 0; i < first_flight_results.length; i++) {
        //                 var button_cell = "<td><input type=\"radio\" name=\"first_flight_result\" id=\"first_flight_result" + i + "\"></td>";
        //                 results_table.innerHTML += "<tr>" + "<td>" + first_flight_results[i][0] + "</td>" + "<td>" + first_flight_results[i][1] + "</td>" + "<td>" + first_flight_results[i][5] + "</td>" + "<td>" + first_flight_results[i][6] + "</td>" + button_cell + "</tr>";
        //             }
        //             results_table.innerHTML += "</tbody>"
        //             results_div.appendChild(results_table);
        //             results_table = document.createElement("table");
        //             results_table.innerHTML = "<caption>Pick your second flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>";
        //             for (var i = 0; i < second_flight_results.length; i++) {
        //                 var button_cell = "<td><input type=\"radio\" name=\"second_flight_result\" id=\"second_flight_result" + i + "\"></td>";
        //                 results_table.innerHTML += "<tr>" + "<td>" + second_flight_results[i][0] + "</td>" + "<td>" + second_flight_results[i][1] + "</td>" + "<td>" + second_flight_results[i][5] + "</td>" + "<td>" + second_flight_results[i][6] + "</td>" + button_cell + "</tr>";
        //             }
        //             results_table.innerHTML += "</tbody>"
        //             results_div.appendChild(results_table);
        //             var book_trip_button = document.createElement("input");
        //             book_trip_button.type = "button";
        //             book_trip_button.value = "Book a trip";
        //             book_trip_button.style.margin = "2em";
        //             book_trip_button.style.position = "relative";
        //             book_trip_button.style.left = "6em";

        //             results_div.appendChild(book_trip_button);
        //             book_trip_button.addEventListener("click", startBooking, false);
        //         }
        //     }
        // }

        function confirmSubmit() 
        {
            return confirm( "Are you sure you want to submit?" );   
        }

        function confirmReset() 
        {
            return confirm( "Are you sure you want to clear the form?" );   
        }

        function startBooking(adults_number, children_number) {
            var booking_form = document.getElementById("booking_form");

            booking_form.addEventListener( "submit", 
                function() 
                {
                    if(confirmSubmit() == false)
                    {
                        event.preventDefault();
                    } 
                }, // end anonymous function
                false );

            booking_form.addEventListener( "reset", 
                function()
                {                                                         
                    if(confirmReset() == false)
                    {
                        event.preventDefault();
                    } 
                }, // end anonymous function
                false );

            trip_type = document.getElementById("trip_type");
            cabin_class = document.getElementById("cabin");
            seat_location = document.getElementById("seat_selection");
            meals = document.getElementById("special_meals");
            drinks = document.getElementById("drinks");
            airport_pickup = document.getElementById("airport_pickup");
            pet = document.getElementById("pet");
            special_treatment = document.getElementById("special_treatment");
            adults = document.getElementById("adults");
            children = document.getElementById("children");
            infants = document.getElementById("infants");
            currency = document.getElementById("currency");
            adults_meals_and_drinks = document.getElementById("adults_meals_and_drinks");
            children_meals_and_drinks = document.getElementById("children_meals_and_drinks");

            check_trip_type();

            account_for_adult_passengers(adults_number);
            account_for_child_passengers(children_number);

            computePrice();
        }

        //change number displayed meals and drinks inputs for adult passengers
        function account_for_adult_passengers(adults_number) {
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

                meal_list.innerHTML = "<option selected>None</option>" +
                    "<option>Turkey sandwich</option>" +
                    "<option>Chicken with rice</option>" +
                    "<option>Ceasar Salad</option>";

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

                drink_list.innerHTML = "<option selected>Water</option>" +
                    "<option>Orange juice</option>" +
                    "<option>Apple juice</option>" +
                    "<option>Coke</option>" +
                    "<option>Sprite</option>" +
                    "<option>Mirinda</option>" +
                    "<option>Ayran</option>";

                new_drink.appendChild(drink_list);

                meals_and_drinks_div.appendChild(new_drink);

                adults_meals_and_drinks.appendChild(meals_and_drinks_div);
            }

        }

        //change number displayed meals and drinks inputs for child passengers
        function account_for_child_passengers(children_number) {
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

                meal_list.innerHTML = "<option selected>None</option>" +
                    "<option>Turkey sandwich</option>" +
                    "<option>Chicken with rice</option>" +
                    "<option>Ceasar Salad</option>";

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

                drink_list.innerHTML = "<option selected>Water</option>" +
                    "<option>Orange juice</option>" +
                    "<option>Apple juice</option>" +
                    "<option>Coke</option>" +
                    "<option>Sprite</option>" +
                    "<option>Mirinda</option>" +
                    "<option>Ayran</option>";

                new_drink.appendChild(drink_list);

                meals_and_drinks_div.appendChild(new_drink);

                children_meals_and_drinks.appendChild(meals_and_drinks_div);
            }

        }

        var price;

        function computePrice() {
            displayed_price = document.getElementById("price");
            price = 0;
            if (trip_type.innerText == "Round-trip") {
                price += 90;
            }
            else if (trip_type.innerText == "One-way") {
                price += 60;
            }
            else {
                price += 105;
            }

            if (cabin_class.innerText == "Business class") {
                price = Math.round(price * 1.4);
            }
            else if (cabin_class.innerText == "First class") {
                price = Math.round(price * 1.75);
            }

            // if (seat_location.value == "Window seat") {
            //     price += 5;
            // }

            if (airport_pickup.checked) {
                price += 10;
            }

            if (pet.value != "None") {
                price += 5;
            }

            if (special_treatment.value != "") {
                price += 10;
            }

            initial_price = price;

            if (adults.innerText != "0") {
                price *= parseInt(adults.innerText);
            }

            if (children.innerText != "0") {
                if (adults.innerText != "0") //price changed due to adult passengers
                {
                    price += Math.round(initial_price * parseInt(children.innerText) * 0.75);
                }
                else {
                    price = Math.round(initial_price * parseInt(children.innerText) * 0.75);
                }
            }

            if (infants.innerText != "0") {
                if (adults.innerText != "0" || children.innerText != "0") //price changed due to non-infant passengers
                {
                    price += Math.round(initial_price * parseInt(infants.innerText) * 0.5);
                }
                else {
                    price = Math.round(initial_price * parseInt(infants.innerText) * 0.5);
                }
            }

            for (var x = 1; x <= adults_meals_and_drinks.childElementCount; x++) {
                var adult_meal = document.getElementById("special_meals_for_adult" + x);
                if (adult_meal.value != "None") {
                    price += 10;
                }

                var adult_drink = document.getElementById("drink_for_adult" + x);
                if (adult_drink.value == "Orange juice" || adult_drink.value == "Apple juice" || adult_drink.value == "Ayran") {
                    price += 2;
                }
                else if (adult_drink.value == "Coke" || adult_drink.value == "Sprite" || adult_drink.value == "Mirinda") {
                    price += 3;
                }
            }

            for (var x = 1; x <= children_meals_and_drinks.childElementCount; x++) {
                var child_meal = document.getElementById("special_meals_for_child" + x);
                if (child_meal.value != "None") {
                    price += 10;
                }

                var child_drink = document.getElementById("drink_for_child" + x);
                if (child_drink.value == "Orange juice" || child_drink.value == "Apple juice" || child_drink.value == "Ayran") {
                    price += 2;
                }
                else if (child_drink.value == "Coke" || child_drink.value == "Sprite" || child_drink.value == "Mirinda") {
                    price += 3;
                }
            }

            if (currency.value == "€") {
                price *= 1.03;
            }
            else if (currency.value == "£") {
                price *= 0.9;
            }
            else if (currency.value == "L.L") {
                price *= 40000;
            }

            price = price.toFixed(2);

            displayed_price.innerText = price;
            var price_sent = document.getElementById("price_sent");
            price_sent.value = price;
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
                        <li><a class="active" href="book_a_trip.php">Book a trip</a></li>
                        <li><a href="flight_schedule_search.php">Flight Schedule Search</a></li>
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
                        <li><a href="checkin.html">Check-in</a></li>
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
                    <a href="checkin.html">Check-in</a>
                    <a href="login.php">Login</a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
        </nav>
    </header>

    <h1>ROA Airlines</h1>
    <h1>Book a Trip</h1>
    <div style="text-align:center;">
        <img src="bookingPics/Book-Flights-Indigo-759.jpg" alt="Book a flight">
    </div>

    <?php
        if(!isset($_COOKIE["username"]))
        {
            print("<p style=\"text-align:center;color:white;margin-top:1em\">Please <a href=\"login.php\">login</a> before booking.</p>");
            die();
        }  
    ?>

    <fieldset style="margin: 1em;">
        <legend style="margin-left: 2em;">Search for flights</legend>
        <form class="styled" id="search_form" method="post" action="book_a_trip.php">
            <p>
                <label for="trip_type_search">Type of trip</label>
                <select onchange="check_trip_type_search()" id="trip_type_search" name="trip_type_search">
                    <option selected>Round-trip</option>
                    <option>One-way</option>
                    <option>Multi-city</option>
                </select>
            </p>
            <div class="form-elts">
                <p>
                    <label for="departure_from_search">From</label>
                    <input type="text" id="departure_from_search" name="departure_from_search" list="iata_list" required>
                    <datalist id="iata_list">
                        <option value="Abidjan	Cote d'Ivoire	ABJ">
                        <option value="Abu Dhabi - Abu Dhabi International	United Arab Emirates	AUH">
                        <option value="Accra - Kotoka International Airport	Ghana	ACC">
                        <option value="Amsterdam - Amsterdam Airport Schiphol	Netherlands	AMS">
                        <option value="Athens - Elefthérios Venizélos International Airport	Greece	ATH">
                        <option value="Basra, Basrah	Iraq	BSR">
                        <option value="Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY">
                        <option value="Brussels - Brussels Airport	Belgium	BRU">
                        <option value="Cairo - Cairo International Airport	Egypt	CAI">
                        <option value="Copenhagen - Copenhagen Airport	Denmark	CPH">
                        <option value="Dammam, King Fahad International	Saudi Arabien	DMM">
                        <option value="Disneyland Paris	France	DLP">
                        <option value="Doha - Doha International Airport	Qatar	DOH">
                        <option value="Dubai - Dubai International Airport	United Arab Emirates	DXB">
                        <option value="East London	South Africa	ELS">
                        <option value="Eriwan (Yerevan, Jerevan)	Armenia	EVN">
                        <option value="Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA">
                        <option value="Geneva - Geneva-Cointrin International Airport	Switzerland	GVA">
                        <option value="Istanbul - Istanbul Atatürk Airport	Turkey	IST">
                        <option value="Jeddah - King Abdulaziz International	Saudi Arabia	JED">
                        <option value="Kuwait - Kuwait International	Kuwait	KWI">
                        <option value="Lagos - Murtala Muhammed Airport	Nigeria	LOS">
                        <option value="Larnaca	Cyprus	LCA">
                        <option value="London Metropolitan Area	United Kingdom	LON">
                        <option value="Madinah (Medina) - Mohammad Bin Abdulaziz	Saudi Arabia	MED">
                        <option value="Madrid - Barajas Airport	Spain	MAD">
                        <option value="Milan	Italy	MIL">
                        <option value="Nice - Cote D'Azur Airport	France	NCE">
                        <option value="Paris	France	PAR">
                        <option value="Riyadh - King Khaled International	Saudi Arabia	RUH">
                        <option value="Rome	Italy	ROM">
                    </datalist>
                </p>
                <p>
                    <label for="arrival_to_search">To</label>
                    <input type="text" id="arrival_to_search" name="arrival_to_search" list="iata_list_to" required>
                    <datalist id="iata_list_to">
                        <option value="Abidjan	Cote d'Ivoire	ABJ">
                        <option value="Abu Dhabi - Abu Dhabi International	United Arab Emirates	AUH">
                        <option value="Accra - Kotoka International Airport	Ghana	ACC">
                        <option value="Amsterdam - Amsterdam Airport Schiphol	Netherlands	AMS">
                        <option value="Athens - Elefthérios Venizélos International Airport	Greece	ATH">
                        <option value="Basra, Basrah	Iraq	BSR">
                        <option value="Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY">
                        <option value="Brussels - Brussels Airport	Belgium	BRU">
                        <option value="Cairo - Cairo International Airport	Egypt	CAI">
                        <option value="Copenhagen - Copenhagen Airport	Denmark	CPH">
                        <option value="Dammam, King Fahad International	Saudi Arabien	DMM">
                        <option value="Disneyland Paris	France	DLP">
                        <option value="Doha - Doha International Airport	Qatar	DOH">
                        <option value="Dubai - Dubai International Airport	United Arab Emirates	DXB">
                        <option value="East London	South Africa	ELS">
                        <option value="Eriwan (Yerevan, Jerevan)	Armenia	EVN">
                        <option value="Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA">
                        <option value="Geneva - Geneva-Cointrin International Airport	Switzerland	GVA">
                        <option value="Istanbul - Istanbul Atatürk Airport	Turkey	IST">
                        <option value="Jeddah - King Abdulaziz International	Saudi Arabia	JED">
                        <option value="Kuwait - Kuwait International	Kuwait	KWI">
                        <option value="Lagos - Murtala Muhammed Airport	Nigeria	LOS">
                        <option value="Larnaca	Cyprus	LCA">
                        <option value="London Metropolitan Area	United Kingdom	LON">
                        <option value="Madinah (Medina) - Mohammad Bin Abdulaziz	Saudi Arabia	MED">
                        <option value="Madrid - Barajas Airport	Spain	MAD">
                        <option value="Milan	Italy	MIL">
                        <option value="Nice - Cote D'Azur Airport	France	NCE">
                        <option value="Paris	France	PAR">
                        <option value="Riyadh - King Khaled International	Saudi Arabia	RUH">
                        <option value="Rome	Italy	ROM">
                    </datalist>
                </p>
                <p>
                    <label for="depart_on_search">Depart On</label>
                    <input type="date" id="depart_on_search" name="depart_on_search" required>
                </p>
                <p id="return_search">
                    <label for="return_on_search">Return On</label>
                    <input type="date" id="return_on_search" name="return_on_search" required>
                </p>
            </div>

            <div class="form-elts" id="second-city_search" style="display:none">
                <p>
                    <label for="departure_from_second_search">From</label>
                    <input type="text" id="departure_from_second_search" name="departure_from_second_search" list="iata_list">
                    <datalist id="iata_list">
                        <option value="Abidjan	Cote d'Ivoire	ABJ">
                        <option value="Abu Dhabi - Abu Dhabi International	United Arab Emirates	AUH">
                        <option value="Accra - Kotoka International Airport	Ghana	ACC">
                        <option value="Amsterdam - Amsterdam Airport Schiphol	Netherlands	AMS">
                        <option value="Athens - Elefthérios Venizélos International Airport	Greece	ATH">
                        <option value="Basra, Basrah	Iraq	BSR">
                        <option value="Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY">
                        <option value="Brussels - Brussels Airport	Belgium	BRU">
                        <option value="Cairo - Cairo International Airport	Egypt	CAI">
                        <option value="Copenhagen - Copenhagen Airport	Denmark	CPH">
                        <option value="Dammam, King Fahad International	Saudi Arabien	DMM">
                        <option value="Disneyland Paris	France	DLP">
                        <option value="Doha - Doha International Airport	Qatar	DOH">
                        <option value="Dubai - Dubai International Airport	United Arab Emirates	DXB">
                        <option value="East London	South Africa	ELS">
                        <option value="Eriwan (Yerevan, Jerevan)	Armenia	EVN">
                        <option value="Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA">
                        <option value="Geneva - Geneva-Cointrin International Airport	Switzerland	GVA">
                        <option value="Istanbul - Istanbul Atatürk Airport	Turkey	IST">
                        <option value="Jeddah - King Abdulaziz International	Saudi Arabia	JED">
                        <option value="Kuwait - Kuwait International	Kuwait	KWI">
                        <option value="Lagos - Murtala Muhammed Airport	Nigeria	LOS">
                        <option value="Larnaca	Cyprus	LCA">
                        <option value="London Metropolitan Area	United Kingdom	LON">
                        <option value="Madinah (Medina) - Mohammad Bin Abdulaziz	Saudi Arabia	MED">
                        <option value="Madrid - Barajas Airport	Spain	MAD">
                        <option value="Milan	Italy	MIL">
                        <option value="Nice - Cote D'Azur Airport	France	NCE">
                        <option value="Paris	France	PAR">
                        <option value="Riyadh - King Khaled International	Saudi Arabia	RUH">
                        <option value="Rome	Italy	ROM">
                    </datalist>
                </p>
                <p>
                    <label for="arrival_to_second_search">To</label>
                    <input type="text" id="arrival_to_second_search" name="arrival_to_second_search"
                        list="iata_list_to">
                    <datalist id="iata_list_to">
                        <option value="Abidjan	Cote d'Ivoire	ABJ">
                        <option value="Abu Dhabi - Abu Dhabi International	United Arab Emirates	AUH">
                        <option value="Accra - Kotoka International Airport	Ghana	ACC">
                        <option value="Amsterdam - Amsterdam Airport Schiphol	Netherlands	AMS">
                        <option value="Athens - Elefthérios Venizélos International Airport	Greece	ATH">
                        <option value="Basra, Basrah	Iraq	BSR">
                        <option value="Beirut - Beirut Rafic Hariri International Airport	Lebanon	BEY">
                        <option value="Brussels - Brussels Airport	Belgium	BRU">
                        <option value="Cairo - Cairo International Airport	Egypt	CAI">
                        <option value="Copenhagen - Copenhagen Airport	Denmark	CPH">
                        <option value="Dammam, King Fahad International	Saudi Arabien	DMM">
                        <option value="Disneyland Paris	France	DLP">
                        <option value="Doha - Doha International Airport	Qatar	DOH">
                        <option value="Dubai - Dubai International Airport	United Arab Emirates	DXB">
                        <option value="East London	South Africa	ELS">
                        <option value="Eriwan (Yerevan, Jerevan)	Armenia	EVN">
                        <option value="Frankfurt/Main - Frankfurt Airport (Rhein-Main-Flughafen)	Germany	FRA">
                        <option value="Geneva - Geneva-Cointrin International Airport	Switzerland	GVA">
                        <option value="Istanbul - Istanbul Atatürk Airport	Turkey	IST">
                        <option value="Jeddah - King Abdulaziz International	Saudi Arabia	JED">
                        <option value="Kuwait - Kuwait International	Kuwait	KWI">
                        <option value="Lagos - Murtala Muhammed Airport	Nigeria	LOS">
                        <option value="Larnaca	Cyprus	LCA">
                        <option value="London Metropolitan Area	United Kingdom	LON">
                        <option value="Madinah (Medina) - Mohammad Bin Abdulaziz	Saudi Arabia	MED">
                        <option value="Madrid - Barajas Airport	Spain	MAD">
                        <option value="Milan	Italy	MIL">
                        <option value="Nice - Cote D'Azur Airport	France	NCE">
                        <option value="Paris	France	PAR">
                        <option value="Riyadh - King Khaled International	Saudi Arabia	RUH">
                        <option value="Rome	Italy	ROM">
                    </datalist>
                </p>
                <p>
                    <label for="depart_on_second_search">Depart On</label>
                    <input type="date" id="depart_on_second_search" name="depart_on_second_search">
                </p>
            </div>

            <div class="form-elts">
                <p>
                    <label for="cabin_search">Cabin class</label>
                    <select id="cabin_search" name="cabin_search">
                        <option selected>Economy class</option>
                        <option>Business class</option>
                        <option>First class</option>
                    </select>
                </p>
            </div>

            <h3 style="margin-top: 1em;">Passengers</h3>
            <div class="form-elts">
                <p>
                    <label for="adults_search">Adults (12+ years)</label>
                    <input type="number" id="adults_search" name="adults_search" min="0" max="9" value="0" required
                        onchange="check_passengers_in_search()">
                </p>
                <p>
                    <label for="children_search">Children (2-12 years)</label>
                    <input type="number" id="children_search" name="children_search" min="0" max="9" value="0" required
                        onchange="check_passengers_in_search()">
                </p>
                <p>
                    <label for="infants_search">Infants (0-23 months)</label>
                    <input type="number" id="infants_search" name="infants_search" min="0" max="9" value="0" required
                        onchange="check_passengers_in_search()">
                </p>
            </div>

            <p>
                <input type="submit" id="search" name="submit_search" value="Search for flights" style="display:none">
                <input type="reset" value="Clear">
            </p>
        </form>
    </fieldset>

    <div id="flight_results">
    </div>

    <?php
        require 'vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->Airline_Reservation;
    
        $flight_collection = $client->Airline_Reservation->Flights;

        $trip_type_search = isset($_POST[ "trip_type_search" ]) ? $_POST[ "trip_type_search" ] : "";
        $departure_from_search = isset($_POST[ "departure_from_search" ]) ? $_POST[ "departure_from_search" ] : "";
        $departure_from_second_search = isset($_POST[ "departure_from_second_search" ]) ? $_POST[ "departure_from_second_search" ] : "";
        $arrival_to_search = isset($_POST[ "arrival_to_search" ]) ? $_POST[ "arrival_to_search" ] : "";
        $arrival_to_second_search = isset($_POST[ "arrival_to_second_search" ]) ? $_POST[ "arrival_to_second_search" ] : "";
        $depart_on_search = isset($_POST[ "depart_on_search" ]) ? $_POST[ "depart_on_search" ] : "";
        $return_on_search = isset($_POST[ "return_on_search" ]) ? $_POST[ "return_on_search" ] : "";
        $depart_on_second_search = isset($_POST[ "depart_on_second_search" ]) ? $_POST[ "depart_on_second_search" ] : "";
        $cabin_search = isset($_POST[ "cabin_search" ]) ? $_POST[ "cabin_search" ] : "";
        $adults_search = isset($_POST[ "adults_search" ]) ? $_POST[ "adults_search" ] : "";
        $children_search = isset($_POST[ "children_search" ]) ? $_POST[ "children_search" ] : "";
        $infants_search = isset($_POST[ "infants_search" ]) ? $_POST[ "infants_search" ] : "";

        if(isset($_POST["submit_search"]))
        {
            $passengers_count = intval($adults_search) + intval($children_search) + intval($infants_search);
            
            if($trip_type_search == "One-way")
            {
                if($cabin_search == "Economy class"){
                    $result = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'Economy_Seats_Left' => ['$gte' => $passengers_count]]);
                }
                else if($cabin_search == "Business class"){
                    $result = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'Business_Seats_Left' => ['$gte' => $passengers_count]]);
                }
                else if($cabin_search == "First class"){
                    $result = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'FirstClass_Seats_Left' => ['$gte' => $passengers_count]]);
                }

                
                foreach($result as $entry)
                {
                    $first_entry = $entry;
                    break;
                }
                if(!isset($first_entry))
                {
                    print("<p style=\"text-align:center;font-size:1.2em;margin:2em;color:white\">No results</p>");
                }
                else{
                    print("<form method=\"post\" action = \"book_a_trip.php\">");
                    print("<table>");
                    print("<caption>Pick your flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>");
                    print("<input type = \"hidden\" name = \"trip_type_search\" value = \"" . $trip_type_search . "\">");
                    print("<input type = \"hidden\" name = \"departure_from_search\" value = \"" . $departure_from_search . "\">");
                    print("<input type = \"hidden\" name = \"arrival_to_search\" value = \"" . $arrival_to_search . "\">");
                    print("<input type = \"hidden\" name = \"depart_on_search\" value = \"" . $depart_on_search . "\">");
                    print("<input type = \"hidden\" name = \"cabin_search\" value = \"" . $cabin_search . "\">");
                    print("<input type = \"hidden\" name = \"adults_search\" value = \"" . $adults_search . "\">");
                    print("<input type = \"hidden\" name = \"children_search\" value = \"" . $children_search . "\">");
                    print("<input type = \"hidden\" name = \"infants_search\" value = \"" . $infants_search . "\">");

                    foreach ($result as $entry) {
                        print("<tr>");
                        print("<td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td><td>" . $entry['Departure_Date'] . "</td><td>" . $entry['Departure_Time'] . "</td>");
                        print("<td>");
                        print("<input type = \"radio\" required name = \"departure_time\" value = \"" . $entry['Departure_Time'] . "\">");
                        print("<input type = \"hidden\" name = \"flight_id\" value = \"" . $entry['Flight_ID'] . "\">");
                        print("</td>");
                        print("</tr>");
                    }
                    print("</tbody>");
                    print("</table>");
                    print("<input type=\"submit\" name=\"choose_flights\" value=\"Book a trip\" style=\"margin:2em; position=relative; left=6em\">");
                    print("</form>");
                }
            }
            else if($trip_type_search == "Round-trip")
            {
                if($cabin_search == "Economy class"){
                    $result_depart = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'Economy_Seats_Left' => ['$gte' => $passengers_count]]);
                    $result_return = $flight_collection->find(['From' => $arrival_to_search, 'To' => $departure_from_search, 'Departure_Date' => $return_on_search, 'Economy_Seats_Left' => ['$gte' => $passengers_count]]);
                }
                else if($cabin_search == "Business class"){
                    $result_depart = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'Business_Seats_Left' => ['$gte' => $passengers_count]]);
                    $result_return = $flight_collection->find(['From' => $arrival_to_search, 'To' => $departure_from_search, 'Departure_Date' => $return_on_search, 'Business_Seats_Left' => ['$gte' => $passengers_count]]);
                }
                else if($cabin_search == "First class"){
                    $result_depart = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'FirstClass_Seats_Left' => ['$gte' => $passengers_count]]);
                    $result_return = $flight_collection->find(['From' => $arrival_to_search, 'To' => $departure_from_search, 'Departure_Date' => $return_on_search, 'FirstClass_Seats_Left' => ['$gte' => $passengers_count]]);
                }

                foreach($result_depart as $entry)
                {
                    $first_depart_entry = $entry;
                    break;
                }
                
                foreach($result_return as $entry)
                {
                    $first_return_entry = $entry;
                    break;
                }

                if(!isset($first_depart_entry) or !isset($first_return_entry))
                {
                    print("<p style=\"text-align:center;font-size:1.2em;margin:2em; color:white;\">No results</p>");
                }
                else{
                    print("<form method=\"post\" action = \"book_a_trip.php\">");
                    print("<table>");
                    print("<caption>Pick your first flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>");
                    print("<input type = \"hidden\" name = \"trip_type_search\" value = \"" . $trip_type_search . "\">");
                    print("<input type = \"hidden\" name = \"departure_from_search\" value = \"" . $departure_from_search . "\">");
                    print("<input type = \"hidden\" name = \"arrival_to_search\" value = \"" . $arrival_to_search . "\">");
                    print("<input type = \"hidden\" name = \"depart_on_search\" value = \"" . $depart_on_search . "\">");
                    print("<input type = \"hidden\" name = \"return_on_search\" value = \"" . $return_on_search . "\">");
                    print("<input type = \"hidden\" name = \"cabin_search\" value = \"" . $cabin_search . "\">");
                    print("<input type = \"hidden\" name = \"adults_search\" value = \"" . $adults_search . "\">");
                    print("<input type = \"hidden\" name = \"children_search\" value = \"" . $children_search . "\">");
                    print("<input type = \"hidden\" name = \"infants_search\" value = \"" . $infants_search . "\">");

                    foreach ($result_depart as $entry) {
                        print("<tr>");
                        print("<td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td><td>" . $entry['Departure_Date'] . "</td><td>" . $entry['Departure_Time'] . "</td>");
                        print("<td>");
                        print("<input type = \"radio\" required name = \"departure_time\" value = \"" . $entry['Departure_Time'] . "\">");
                        print("<input type = \"hidden\" name = \"flight_id\" value = \"" . $entry['Flight_ID'] . "\">");
                        print("</td>");
                        print("</tr>");
                    }
                    print("</tbody>");
                    print("</table>");

                    print("<table>");
                    print("<caption>Pick your second flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>");
                    foreach ($result_return as $entry) {
                        print("<tr>");
                        print("<td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td><td>" . $entry['Departure_Date'] . "</td><td>" . $entry['Departure_Time'] . "</td>");
                        print("<td>");
                        print("<input type = \"radio\" required name = \"return_time\" value = \"" . $entry['Departure_Time'] . "\">");
                        print("<input type = \"hidden\" name = \"flight_id_second\" value = \"" . $entry['Flight_ID'] . "\">");
                        print("</td>");
                        print("</tr>");
                    }
                    print("</tbody>");
                    print("</table>");
                    print("<input type=\"submit\" name=\"choose_flights\" value=\"Book a trip\" style=\"margin:2em; position=relative; left=6em\">");
                    print("</form>");
                }
            }
            else if($trip_type_search == "Multi-city")
            {
                if($cabin_search == "Economy class"){
                    $result_first = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'Economy_Seats_Left' => ['$gte' => $passengers_count]]);
                    $result_second = $flight_collection->find(['From' => $departure_from_second_search, 'To' => $arrival_to_second_search, 'Departure_Date' => $depart_on_second_search, 'Economy_Seats_Left' => ['$gte' => $passengers_count]]);
                }
                else if($cabin_search == "Business class"){
                    $result_first = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'Business_Seats_Left' => ['$gte' => $passengers_count]]);
                    $result_second = $flight_collection->find(['From' => $depart_on_second_search, 'To' => $arrival_to_second_search, 'Departure_Date' => $depart_on_second_search, 'Business_Seats_Left' => ['$gte' => $passengers_count]]);
                }
                else if($cabin_search == "First class"){
                    $result_first = $flight_collection->find(['From' => $departure_from_search, 'To' => $arrival_to_search, 'Departure_Date' => $depart_on_search, 'FirstClass_Seats_Left' => ['$gte' => $passengers_count]]);
                    $result_second = $flight_collection->find(['From' => $departure_from_second_search, 'To' => $arrival_to_second_search, 'Departure_Date' => $depart_on_second_search, 'FirstClass_Seats_Left' => ['$gte' => $passengers_count]]);
                }

                foreach($result_first as $entry)
                {
                    $first_first_entry = $entry;
                    break;
                }
                
                foreach($result_second as $entry)
                {
                    $first_second_entry = $entry;
                    break;
                }

                if(!isset($first_first_entry) or !isset($first_second_entry))
                {
                    print("<p style=\"text-align:center;font-size:1.2em;margin:2em; color:white;\">No results</p>");
                }
                else{
                    print("<form method=\"post\" action = \"book_a_trip.php\">");
                    print("<table>");

                    print("<input type = \"hidden\" name = \"trip_type_search\" value = \"" . $trip_type_search . "\">");
                    print("<input type = \"hidden\" name = \"departure_from_search\" value = \"" . $departure_from_search . "\">");
                    print("<input type = \"hidden\" name = \"arrival_to_search\" value = \"" . $arrival_to_search . "\">");
                    print("<input type = \"hidden\" name = \"depart_on_search\" value = \"" . $depart_on_search . "\">");
                    print("<input type = \"hidden\" name = \"departure_from_second_search\" value = \"" . $departure_from_second_search . "\">");
                    print("<input type = \"hidden\" name = \"arrival_to_second_search\" value = \"" . $arrival_to_second_search . "\">");
                    print("<input type = \"hidden\" name = \"depart_on_second_search\" value = \"" . $depart_on_second_search . "\">");
                    print("<input type = \"hidden\" name = \"cabin_search\" value = \"" . $cabin_search . "\">");
                    print("<input type = \"hidden\" name = \"adults_search\" value = \"" . $adults_search . "\">");
                    print("<input type = \"hidden\" name = \"children_search\" value = \"" . $children_search . "\">");
                    print("<input type = \"hidden\" name = \"infants_search\" value = \"" . $infants_search . "\">");

                    print("<caption>Pick your first flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>");
                    foreach ($result_first as $entry) {
                        print("<tr>");
                        print("<td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td><td>" . $entry['Departure_Date'] . "</td><td>" . $entry['Departure_Time'] . "</td>");
                        print("<td>");
                        print("<input type = \"radio\" required name = \"departure_time\" value = \"" . $entry['Departure_Time'] . "\">");
                        print("<input type = \"hidden\" name = \"flight_id\" value = \"" . $entry['Flight_ID'] . "\">");
                        print("</td>");
                        print("</tr>");
                    }
                    print("</tbody>");
                    print("</table>");

                    print("<table>");
                    print("<caption>Pick your second flight:</caption><thead><tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th><th>Select flight</th></tr></thead><tbody>");
                    foreach ($result_second as $entry) {
                        print("<tr>");
                        print("<td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td><td>" . $entry['Departure_Date'] . "</td><td>" . $entry['Departure_Time'] . "</td>");
                        print("<td>");
                        print("<input type = \"radio\" required name = \"departure_time_second\" value = \"" . $entry['Departure_Time'] . "\">");
                        print("<input type = \"hidden\" name = \"flight_id_second\" value = \"" . $entry['Flight_ID'] . "\">");
                        print("</td>");
                        print("</tr>");
                    }
                    print("</tbody>");
                    print("</table>");
                    print("<input type=\"submit\" name=\"choose_flights\" value=\"Book a trip\" style=\"margin:2em; position=relative; left=6em\">");
                    print("</form>");
                }
            }
        }       
         
        if(isset($_POST["choose_flights"]))
        { 
            $departure_time = isset($_POST[ "departure_time" ]) ? $_POST[ "departure_time" ] : "";
            $departure_time_second = isset($_POST[ "departure_time_second" ]) ? $_POST[ "departure_time_second" ] : "";
            $return_time = isset($_POST[ "return_time" ]) ? $_POST[ "return_time" ] : "";
            $flight_id = isset($_POST[ "flight_id" ]) ? $_POST[ "flight_id" ] : "";
            $flight_id_second = isset($_POST[ "flight_id_second" ]) ? $_POST[ "flight_id_second" ] : "";

            print("<fieldset id=\"booking_form_fieldset\" style=\"margin: 1em;\">");
            print("<legend style=\"margin-left: 2em;\">Booking</legend>");
            print("<form class=\"styled\" id=\"booking_form\" method=\"post\" action=\"process_booking.php\" onchange=\"computePrice()\">");
            
            print("<input type = \"hidden\" name = \"flight_id\" value = \"" . $flight_id . "\">");
            print("<input type = \"hidden\" name = \"trip_type_search\" value = \"" . $trip_type_search . "\">");
            print("<input type = \"hidden\" name = \"departure_from_search\" value = \"" . $departure_from_search . "\">");
            print("<input type = \"hidden\" name = \"arrival_to_search\" value = \"" . $arrival_to_search . "\">");
            print("<input type = \"hidden\" name = \"depart_on_search\" value = \"" . $depart_on_search . "\">");
            print("<input type = \"hidden\" name = \"departure_time\" value = \"" . $departure_time . "\">");
            if($trip_type_search == "Round-trip")
            {
                print("<input type = \"hidden\" name = \"return_on_search\" value = \"" . $return_on_search . "\">");
                print("<input type = \"hidden\" name = \"departure_time_second\" value = \"" . $departure_time_second . "\">");
                print("<input type = \"hidden\" name = \"flight_id_second\" value = \"" . $flight_id_second . "\">");
            }
            if($trip_type_search == "Multi-city")
            {
                print("<input type = \"hidden\" name = \"departure_from_second_search\" value = \"" . $departure_from_second_search . "\">");
                print("<input type = \"hidden\" name = \"arrival_to_second_search\" value = \"" . $arrival_to_second_search . "\">");
                print("<input type = \"hidden\" name = \"depart_on_second_search\" value = \"" . $depart_on_second_search . "\">");
                print("<input type = \"hidden\" name = \"departure_time_second\" value = \"" . $departure_time_second . "\">");
                print("<input type = \"hidden\" name = \"flight_id_second\" value = \"" . $flight_id_second . "\">");
            }
            print("<input type = \"hidden\" name = \"cabin_search\" value = \"" . $cabin_search . "\">");
            print("<input type = \"hidden\" name = \"adults_search\" value = \"" . $adults_search . "\">");
            print("<input type = \"hidden\" name = \"children_search\" value = \"" . $children_search . "\">");
            print("<input type = \"hidden\" name = \"infants_search\" value = \"" . $infants_search . "\">");

            print("<p><label for=\"trip_type\">Type of trip: </label><span id=\"trip_type\" name=\"trip_type\">$trip_type_search</span></p>");
            print("<div class=\"form-elts-span\">");
            
            print("<p>");
            print("<label for=\"departure_from\">From: </label>");
            print("<span id=\"departure_from\" name=\"departure_from\" required>");
            print($departure_from_search);
            print("</span>");
            print("</p>");
            print("<p>");
            print("<label for=\"arrival_to\">To: </label>");
            print("<span id=\"arrival_to\" name=\"arrival_to\" required>");
            print($arrival_to_search);
            print("</span>");
            print("</p>");
            print("<p>");
            print("<label for=\"depart_on\">Depart On: </label>");
            print("<span id=\"depart_on\" name=\"depart_on\" required>");
            print($depart_on_search);
            print("</span>");
            print("<span>");
            print(" Time: " . $departure_time);
            print("</span>");
            print("</p>");

            print("<p id=\"return\">");
            print("<label for=\"return_on\">Return On: </label>");
            print("<span id=\"return_on\" name=\"return_on\" required>");
            print($return_on_search);
            print("</span>");
            print("<span>");
            print(" Time: " . $return_time);
            print("</span>");
            print("</p>");
            print("</div>");
            
            print("<div class=\"form-elts-span\" id=\"second-city\" style=\"display:none\">");
            print("<p>");
            print("<label for=\"departure_from_second\">From: </label>");
            print("<span id=\"departure_from_second\" name=\"departure_from_second\">");
            print($departure_from_second_search);
            print("</span>");
            print("</p>");
            print("<p>");
            print("<label for=\"arrival_to_second\">To: </label>");
            print("<span id=\"arrival_to_second\" name=\"arrival_to_second\">");
            print($arrival_to_second_search);
            print("</span>");
            print("</p>");
            print("<p>");
            print("<label for=\"depart_on_second\">Depart On: </label>");
            print("<span id=\"depart_on_second\" name=\"depart_on_second\">");
            print($depart_on_second_search);
            print("</span>");
            print("<span>");
            print(" Time: " . $departure_time_second);
            print("</span>");
            print("</p>");
            print("</div>");

            print("<div class=\"form-elts-span\">");
            print("<p>");
            print("<label for=\"cabin\">Cabin class: </label>");
            print("<span id=\"cabin\" name=\"cabin\">");
            print($cabin_search);
            print("</span>");
            print("</p>");
            print("</div>");

            print("<p>");
            print("<label for=\"seat_selection\">Preferred seat location for the person booking:</label>");
            print("<select id=\"seat_selection\" name=\"seat_selection\">");
            print("<option selected>Aisle</option>");
            print("<option>Window</option>");
            print("</select>");
            print("</p>");

            print("<p>");
            print("<label>Airport pick-up: </label>");
            print("<label>Yes</label>");
            print("<input type=\"radio\" id=\"airport_pickup\" name=\"airport_pickup\" value=\"yes\">");
            print("<label>No</label>");
            print("<input type=\"radio\" name=\"airport_pickup\" value=\"no\">");
            print("</p>");
            print("<p>");
            print("<label for=\"pet\">Accompanying pet</label>");
            print("<select id=\"pet\" name=\"pet\">");
            print("<option selected>None</option>");
            print("<option>Dog</option>");
            print("<option>Cat</option>");
            print("<option>Bird</option>");
            print("</select>");
            print("</p>");
            print("<p>");
            print("<label for=\"special_treatment\">Please specify a special treatment if needed:</label>");
            print("<input type=\"text\" id=\"special_treatment\" name=\"special_treatment\">");
            print("</p>");

            print("<h3 style=\"margin-top: 1em;\">Passengers</h3>");
            print("<div class=\"form-elts-span\">");
            print("<p>");
            print("<label for=\"adults\">Adults (12+ years): </label>");
            print("<span id=\"adults\" name=\"adults\" required>$adults_search</span>");
            print("</p>");
            print("<p>");
            print("<label for=\"children\">Children (2-12 years): </label>");
            print("<span id=\"children\" name=\"children\" required>$children_search</span>");
            print("</p>");
            print("<p>");
            print("<label for=\"infants\">Infants (0-23 months): </label>");
            print("<span id=\"infants\" name=\"infants\" required>$infants_search</span>");
            print("</p>");
            print("</div>");

            print("<h3 style=\"margin-top: 1em;\">Meals and Drinks</h3>");
            print("<div id=\"meals_and_drinks\">");
            print("<div id=\"adults_meals_and_drinks\"></div>");
            print("<div id=\"children_meals_and_drinks\"></div>");
            print("</div>");
            print("<hr style=\"margin-top: 1em;\">");
            print("<div class=\"price_div\" style=\"font-size: 1.2em; margin-top: 1em;\">");
            print("<strong>Total price: <span id=\"price\"></span></strong>");
            print("<input type=\"hidden\" id=\"price_sent\" name=\"price_sent\">");

            print("<select id=\"currency\" name=\"currency\"");
            print("style=\"font-size:0.75em; margin-left: .3em; border-color: silver;\">");
            print("<option selected>$</option>");
            print("<option>&euro;</option>");
            print("<option>&#163;</option>");
            print("<!--pound-->");
            print("<option>L.L</option>");
            print("</select>");
            print("</div>");
            print("<p>");
            print("<input type=\"submit\" name=\"buy_tickets\" id=\"submit\" value=\"Buy tickets\">");
            print("<input type=\"submit\" name=\"reserve_booking\" id=\"submit\" value=\"Reserve booking\">");
            print("<input type=\"reset\" value=\"Clear\">");
            print("</p>");
            print("</form>");
            print("</fieldset>");
            print("<script>startBooking($adults_search, $children_search);</script>");
            print("<p style=\"margin: 1em; text-align:center;\">");
            print("<label for=\"reserve_hotel\">Want to make a hotel reservation?</label>");
            print("<a href=\"https://www.trivago.com/\" target=\"_blank\"><button id=\"reserve_hotel\"");
            print("style=\"background-color: rgb(84, 201, 247); color:white; border-radius: .5em;\">Check");
            print(" Trivago</button></a>");
            print("</p>"); 
        }
        
            
    ?>

</body>

</html>