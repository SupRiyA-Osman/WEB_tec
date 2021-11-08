<!DOCTYPE html>
<html>

<head>
    <title>Add Bus Ticket</title>
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
    <?php require_once 'Controller/addBusTicketsController.php'; ?>

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
            <legend><b>ADD TICKETS FOR BUS</b></legend><br>
            <label>Bus ID: </label>
            <input type="text" name="busId"><span class="red">
                <?php
                if ($busIdErr) {
                    echo $busIdErr;
                }
                ?></span>
            <hr>

            <label>Bus Name: </label>
            <input type="text" name="busName"><span class="red">
                <?php
                if ($busNameErr) {
                    echo $busNameErr;
                }
                ?></span>
            <hr>

            <label>Bus Location: </label>
            <select name="busLocation">
                <option value="" disabled selected>Select a location</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select><span class="red">
                <?php
                if ($busLocationErr) {
                    echo $busLocationErr;
                }
                ?></span>
            <hr>

            <label>Ticket ID: </label>
            <input type="text" name="ticketId"><span class="red">
                <?php
                if ($ticketIdErr) {
                    echo $ticketIdErr;
                }
                ?></span>
            <hr>

            <label>From: </label>
            <select name="busFrom">
                <option value="" disabled selected>Select a location</option>
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
                <option value="" disabled selected>Select a location</option>
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
            <input type="text" name="price" /><br />
            <hr>

            <fieldset>
                <legend>
                    <label>Date: </label>
                </legend>
                <input type="Date" name="date" /> (mm/dd/yyyy)<br />
            </fieldset>

            <fieldset>
                <legend>
                    <label>Time: </label>
                </legend>
                <input type="time" name="time" /> (mm:ss am/pm)<br />
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