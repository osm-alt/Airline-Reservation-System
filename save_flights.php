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
</head>
<body>
<h1>ROA Airlines</h1>
    <h1>Saved flights</h1>
<?php

    print("<table style=\"margin-bottom: 9rem;\">");
            print("<thead>");
            print("<tr><th>Depart from</th><th>Arrive to</th><th>Departure date</th><th>Departure time</th></tr>");
            print("</thead>");
            print("<tbody>");
            foreach ($_SESSION["saved_flights"] as $entry) {
                print("<tr>");
            	print("<td>" . $entry[0] . "</td><td>" . $entry[1] . "</td><td>" . $entry[2] . "</td><td>" . $entry[3] . "</td>");
                print("</tr>");
            }
            print("</tbody>");
            print("</table>");
?>
</body>
</html>