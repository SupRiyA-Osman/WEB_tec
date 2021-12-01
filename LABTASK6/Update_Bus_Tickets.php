<!DOCTYPE html>
<html>

<head>
    <title>Update tickest</title>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php require_once 'Controller/updateBusTicketsController.php'; ?>

    <?php include 'Header.php'; ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>

        Go back to : <a href="Bus_Manager_Home.php">Home</a><br><br>

        <fieldset>
            <legend><b>UPDATE TICKETS FOR BUS</b></legend><br>
            <label>Ticket ID: </label>
            <input type="text" name="ticketId" value="<?php echo $ticketId ?>"><span class="red">
                <?php
                if ($ticketIdErr) {
                    echo $ticketIdErr;
                }
                ?></span>
            <input type="submit" name="search" value="Search" class="btn btn-info" />
            <hr>
          <label>Bus Id: </label>
            <input type="text" name="busId" value="<?php echo $busId ?>"><span class="red">
                <?php
                if ($busIdErr) {
                    echo $busIdErr;
                }
                ?></span>
            <hr>

           

            <label>From: </label>
            <select name="busFrom">
                <option value="<?php echo $from ?>"><?php echo $from ?></option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select><span class="red">
                <?php
                if ($fromErr) {
                    echo $fromErr;
                }
                ?></span>
            <hr>

            <label>To: </label>
            <select name="busTo">
                <option value="<?php echo $to ?>"><?php echo $to ?></option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select><span class="red">
                <?php
                if ($toErr) {
                    echo $toErr;
                }
                ?></span>
            <hr>

            <label>Price: </label>
            <input type="text" name="price" value="<?php echo $price ?>" /><br />
            <hr>

            <fieldset>
                <legend>
                    <label>Date: </label>
                </legend>
                <input type="Date" name="date" value="<?php echo $date ?>" /> (mm/dd/yyyy)<br />
            </fieldset>

            <fieldset>
                <legend>
                    <label>Time: </label>
                </legend>
                <input type="time" name="time" value="<?php echo $time ?>" /> (mm:ss am/pm)<br />
            </fieldset>
            <hr>

            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
        </fieldset>

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <?php include 'Footer.php'; ?>
    </form>
    </div>
    <br />

</body>

</html>