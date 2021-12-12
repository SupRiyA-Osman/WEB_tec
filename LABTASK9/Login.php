<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
    <script>
        function checkEmail() {
            if (document.getElementById("email").value == "") {
                document.getElementById("emailErr").innerHTML = "*The Email field is required.";
                document.getElementById("email").style.borderColor = "red";
            } else {
                document.getElementById("emailErr").innerHTML = "";
                document.getElementById("email").style.borderColor = "purple";
            }
        }

        function checkPass() {
            if (document.getElementById("pass").value == "") {
                document.getElementById("passErr").innerHTML = "*The Password field is required.";
                document.getElementById("pass").style.borderColor = "red";
            } else {
                document.getElementById("passErr").innerHTML = "";
                document.getElementById("pass").style.borderColor = "purple";
            }
        }
    </script>
<script>
function showHint(str) {
  if (str.length == 0) { 
    document.getElementById("email").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("email").innerHTML =
    this.responseText;
  }
  xhttp.open("GET", "Regestation.php?q="+str);
  xhttp.send();   
}
</script>

    
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

                <h2>LOGIN</h2>
                <span class="red"> <?php echo $msg; ?></span><br>
                <label style="display:inline-block; width: 100px; height: 0px; text-align:right;">Email :</label>
                <input type="text" name="email" id="email" onblur="checkEmail()" onkeyup="checkEmail()" value="<?php if (isset($_COOKIE['email'])) {
                                                                                                                    echo $_COOKIE['email'];
                                                                                                                } ?>">
                <span class="red">
                    <p id="emailErr"></p>
                </span>
                <br>

                <label style="display:inline-block; width: 100px; height: 0px; text-align:right;">Password :</label>
                <input type="password" name="password" id="pass" onblur="checkPass()" onkeyup="checkPass()" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                        echo $_COOKIE['password'];
                                                                                                                    } ?>">
                <span class="red">
                    <p id="passErr"></p>
                </span>
                <br>

                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="checkbox" onclick="showPass()"> Show password <br><br>

                <input type="checkbox" name="rememberMe" value="rememberMe">
                Remember me for a mintute<br><br>

                <input type="submit" name="submit" value="Login">
                <a href="Forget_Password.php">Forgot password? </a>

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