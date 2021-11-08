<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

  function addCustomer($data)
  {
    $conn = db_conn();
    $selectQuery = "INSERT into customer_info (C_Name, C_Email, C_PhoneNumber, C_Password, C_Gender, C_DOB, C_ProfilePicture) VALUES (:name, :email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name'             =>      test_input($data['name']),
            ':email'            =>      test_input($data['email']),
            ':phoneNo'          =>      test_input($data['phoneNo']),
            ':password'         =>      test_input($data['password']),
            ':gender'           =>      test_input($data['gender']),
            ':dateOfBirth'      =>      test_input($data['dateOfBirth']),
            ':profilePic'       =>      'Dummy.png'
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return '<span class="green">Registered successfully</span>';
   }
