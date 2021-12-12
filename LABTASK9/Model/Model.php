<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addBusManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into bus_manager (bm_email, bm_password) VALUES (:email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':email'            =>      test_input($data['email']),
            ':password'         =>      test_input($data['password']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Registered successfully</span>';
    }
}

function addBus($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into bus (b_name, b_location) VALUES (:busName, :busLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':busName'              =>         test_input($data['busName']),
            ':busLocation'          =>         test_input($data['busLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Bus added successfully</span>';
    }
}
function bookTicket($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set bookedBy = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($_SESSION['id']), $data['ticketId']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Ticket booked successfully and payment information is sent to your email address</span>';
}


function updateBus($data){
    $conn = db_conn();
    $selectQuery = "UPDATE bus set b_name = ?, b_location = ? where b_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['busName']), test_input($data['busLocation']), test_input($data['busId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deletebus($busId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `bus` WHERE `b_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$busId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';



}


//Ticket information upadte /delete / insert

function addBusTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets ( location_to,location_from, date, time, price, transportType, bookedBy, b_id) VALUES (:busTo, :busFrom, :date , :time, :price, :tType, :bookedBy, :busId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':busFrom'               =>        test_input($data["busFrom"]),
            ':busTo'                 =>        test_input($data["busTo"]),
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "Bus",
            ':bookedBy'              =>        "",
            // ':busId'                 =>        test_input($data["busId"])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}


function deletebustickes( $ticketId)
{
     $conn = db_conn();
    $selectQuery = "DELETE FROM `tickets` WHERE `ticket_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$ticketId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted  Ticket successfully</span>';



}
function updateBusTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_to = ?, location_from = ?,  date= ?, time = ?, price = ?, b_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['busFrom']), test_input($data['busTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']),test_input($data['busId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}


