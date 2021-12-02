<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
</head>

<body>

    <?php

    include 'Header.php';
    require_once 'Model/db_connect.php';
    ?>
    <div class="log-main">

        <div class="login">
            <?php

    session_start();

    $msg = '';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = db_conn();
        $selectQuery = "SELECT * FROM `bus_manager` where bm_email = ?";

        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$_POST['email']]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row["bm_email"] == $_POST['email'] && $row["bm_password"] == $_POST['password']) {
            $_SESSION['email'] = $row["bm_email"];
            $_SESSION['password'] = $row["bm_password"];

            if (!empty($_POST['rememberMe'])) {
                setcookie("email", $_POST['email'], time() + 60);
                setcookie("password", $_POST['password'], time() + 60);
                echo "Cookie set successfully";
            } else {
                setcookie("email", "");
                setcookie("password", "");
                echo "Cookie not set";
            }

            header("location:Bus_Manager_Home.php");
        } else {
            $msg = "Username or password invalid";
        }
    }

    ?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        
<br>
            <h2>BUSS MANAGERS LOGIN</h2>
            <br>
            Email: <input type="text" name="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                echo $_COOKIE['email'];
                                                            } ?>"><br><br>

            Password: <input type="password" name="password" id="pass" value="<?php if (isset($_COOKIE['password'])) {
                                                                                    echo $_COOKIE['password'];
                                                                                } ?>"><br><br>
            <input type="checkbox" onclick="showPass()"> Show password <br>

            <span class="error"> <?php echo $msg; ?></span><br>
            

            <input type="checkbox" name="rememberMe" value="rememberMe">
            <label >Remember me for a mintute</label><br>

            <input type="submit" name="submit" value="Login">
            <a href="Forget_Password.php">Forgot password?</a>
        
        <script>
            function showPass() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </form>

            
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br><br>
    <?php include 'Footer.php'; ?>

</body>

</html>




