<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Manager Home</title>
</head>

<body>
    <?php
    session_start();
    include 'Header.php';

    if (isset($_SESSION['email'])) {
        echo '<span style="display:inline-block; width:100%;text-align:left; height: 100%; padding:10px; border-right:2px solid black">';
        echo '------WELLCOME BUS MANAGERS---------';
        echo '<hr>';
        echo '<ul>';
        echo '<li><a href="Add_Bus_Tickets.php">Add Bus Tickets</a></li>';
        echo '<li><a href="Update_Bus_Tickets.php">Update Bus Tickets</a></li>';
        echo '<li><a href="Delete_Bus_Tickets.php">Delete Bus Tickets</a></li>';
        echo '<li><a href="View_Add_Tickets.php">View Add Bus Tickets</a></li>';


        echo '</ul>';
        echo '</span>';

        echo '<span style="display:inline-block; width:100%; height:100%; text-align:center"><a href="Logout.php">Logout</a>
    </span>';
    } else {
        $msg = "Error";
        header("location:Login.php");
    }
    ?>

    <?php include 'Footer.php'; ?>

</body>

</html>