<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
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
    <?php include 'Header.php'; ?>
    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <?php require_once 'Controller/addBusManager.php'; ?>

    <form method="post">

        <fieldset>
            <legend><b>REGISTRATION</b></legend><br>

            Email: <input type="text" name="email"><span class="red">
                <?php
                if ($emailErr) {
                    echo $emailErr;
                }
                ?></span>
            <hr>


            Password: <input type="password" name="password" id="pass"><span class="red">
                <?php
                if ($passErr) {
                    echo $passErr;
                }
                ?></span><br><br>
            <input type="checkbox" onclick="showPass()"> Show password
            <hr>

            Confirm Password: <input type="password" name="confirmPassword" id="conPass"><span class="red">
                <?php
                if ($conPassErr) {
                    echo $conPassErr;
                }
                ?></span><br><br>
            <input type="checkbox" onclick="showConPass()"> Show confirm password
            <hr>

            <input type="submit" name="submit" value="Sign up">
            <input type="reset" name="reset" value="Reset"><br><br>
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?><br>
        </fieldset>
        <script>
            function showPass() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function showConPass() {
                var x = document.getElementById("conPass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

        <?php include 'Footer.php'; ?>

    </form>

</body>

</html>