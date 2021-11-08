<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Header</title>
</head>

<body>
    <h1>Bus Manager </h1>
    <span style="display:inline-block; width:100%; height:5%; text-align:right">
        <?php

        if (isset($_SESSION['email'])) {
            echo " Logged in: ";
            echo '<a href="Bus_Manager_Home.php">';
            echo $_SESSION["email"];
            echo '</a> | ';
            echo "<a href='Logout.php'>Logout</a> | <a href='Add_Bus_Tickets.php'>Add tickets</a> | 
            <a href='Update_Bus_Tickets.php'>Update ticket</a>  | <a href='Delete_Bus_Tickets.php'>Delete ticket</a> |<a href='View_Add_Tickets.php'> View ticket</a>  ";
        } else {
            echo '<a href="Public_Home.php">Home</a> | <a href="Login.php">Login</a> |<a href="Registration.php">Registration</a>';
        }

        ?>
    </span>
    <hr>
</body>

</html>