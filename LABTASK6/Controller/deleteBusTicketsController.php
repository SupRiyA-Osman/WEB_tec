<?php
session_start();
$msg =  $ticketIdErr = '';
$valid = 1;
if (isset($_POST["submit"])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }
    if ($valid) {
        // read json file
        $data = file_get_contents('Bus_Ticket_Data.json');

        // decode json to associative array
        $json_arr = json_decode($data, true);

        // get array index to delete
        $arr_index = array();
        foreach ($json_arr as $key => $value) {
            if ($value['Ticket_ID'] == $_POST['ticketId']) {
                $arr_index[] = $key;
            }
        }

        // delete data
        foreach ($arr_index as $i) {
            unset($json_arr[$i]);
        }

        // rebase array
        $json_arr = array_values($json_arr);

        // encode array to json and save to file
        file_put_contents('Bus_Ticket_Data.json', json_encode($json_arr));
    }
}
