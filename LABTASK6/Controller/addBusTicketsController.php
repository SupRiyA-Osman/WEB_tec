<?php
session_start();
$msg = $busIdErr = $busNameErr = $ticketIdErr = $busLocationErr = $fromErr = $toErr = '';
$valid = 1;
if (isset($_POST["submit"])) {

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

    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }

    if (empty($_POST["busFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["busTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        if (file_exists('Bus_Ticket_Data.json')) {
            $current_data = file_get_contents('Bus_Ticket_Data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'B_ID'                  =>        test_input($_POST["busId"]),
                'B_Name'                =>        test_input($_POST["busName"]),
                'B_Location'            =>        test_input($_POST["busLocation"]),
                'Ticket_ID'             =>        test_input($_POST["ticketId"]),
                'From'                  =>        test_input($_POST["busFrom"]),
                'To'                    =>        test_input($_POST["busTo"]),
                'Price'                 =>        test_input($_POST["price"]),
                'Date'                  =>        test_input($_POST["date"]),
                'Time'                  =>        test_input($_POST["time"]),
                'Booked_By'             =>        "",
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('Bus_Ticket_Data.json', $final_data)) {
                $msg = '<span class="green">Bus ticket added successfully</span>';
            } else {
                $msg = '<span class="red">Adding bus ticket failed</span>';
            }
        } else {
            $msg = '<span class="red">JSON file does not exit</span>';
        }
    } else {
        $msg = '<span class="red">Adding bus ticket failed</span>';
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
