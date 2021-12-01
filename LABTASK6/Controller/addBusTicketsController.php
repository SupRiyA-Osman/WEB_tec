<?php

require_once 'Model/Model.php';

session_start();

$msg = $busIdErr  = $ticketIdErr  = $fromErr = $toErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
    

    if (empty($_POST["busFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["busTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $msg = addBusTicket($_POST);
    } else {
        $msg = '<span class="red">Adding bus ticket failed</span>';
    }
}
