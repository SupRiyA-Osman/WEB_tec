<?php
session_start();
$ticketId = $busId = $busName = $busLocation = $from = $to = $price = $date = $time = '';
$msg = $busIdErr = $busNameErr = $ticketIdErr = $busLocationErr = $fromErr = $toErr = '';
$valid = 1;
if (isset($_POST['search'])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }
    $ticketId = $_POST["ticketId"];
    $data = file_get_contents("Bus_Ticket_Data.json");
    $data = json_decode($data, true);
    foreach ($data as $row) {
        if ($row['Ticket_ID'] == $_POST['ticketId']) {
            $busId = $row["B_ID"];
            $busName = $row["B_Name"];
            $busLocation = $row["B_Location"];
            $ticketId = $row["Ticket_ID"];
            $from = $row["From"];
            $to = $row["To"];
            $price = $row["Price"];
            $date = $row["Date"];
            $time = $row["Time"];
        } else {
            echo 'Error';
        }
    }
}
if (isset($_POST['submit'])) {
    if (empty($_POST["busId"])) {
        $busIdErr = "*Please enter bus ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{5}$/', $_POST["busId"])) {
        $busIdErr = "Bus ID must be five (5) digits";
        $valid = 0;
    }

    if (empty($_POST["busName"])) {
        $busNameErr = "*Please enter bus name";
        $valid = 0;
    } else if (str_word_count($_POST["busName"]) != 1) {
        $busNameErr = "*Bus name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["busName"])) {
        $busNameErr = "*For bus name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["busLocation"])) {
        $busLocationErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["from"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["to"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $current_data = file_get_contents("Bus_Ticket_Data.json");
        $current_data = json_decode($current_data, true);
        foreach ($current_data as $key => $entry) {
            if ($entry["Ticket_ID"] == $_POST['ticketId']) {
                $current_data[$key]['B_ID']             =   test_input($_POST["busId"]);
                $current_data[$key]['B_Name']           =   test_input($_POST["busName"]);
                $current_data[$key]['B_Location']       =   test_input($_POST["busLocation"]);
                $current_data[$key]['Ticket_ID']        =   $current_data[$key]['Ticket_ID'];
                $current_data[$key]['From']             =   test_input($_POST["from"]);
                $current_data[$key]['To']               =   test_input($_POST["to"]);
                $current_data[$key]['Price']            =   test_input($_POST["price"]);
                $current_data[$key]['Date']             =   test_input($_POST["date"]);
                $current_data[$key]['Time']             =   test_input($_POST["time"]);
                $current_data[$key]['Booked_By']        =   "";

                $updated_data = json_encode($current_data);

                if (file_put_contents('Bus_Ticket_Data.json', $updated_data)) {
                    $msg = '<span class="green">Updated successfully</span>';
                } else {
                    $msg = '<span class="red">Update failed</span>';
                }
            } else {
                $msg = '<span class="red">Update failed</span>';
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
