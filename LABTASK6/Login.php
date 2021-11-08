<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus_Managers_Login</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php include 'Header.php'; ?>

    <?php
    session_start();
    $msg = '';
    $bm_Email = "supriyaosman@gmail.com";
    $bm_Password = "supriya123";

    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] == $bm_Email && $_POST['password'] == $bm_Password) {
            $_SESSION['email'] = $bm_Email;
            $_SESSION['password'] = $bm_Password;
            if (!empty($_POST['rememberMe'])) {
                setcookie("email", $_POST['email'], time() + 10);
                setcookie("password", $_POST['password'], time() + 10);
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
        <fieldset>
            <legend><b>LOGIN</b></legend>
            Email: <input type="text" name="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                echo $_COOKIE['email'];
                                                            } ?>"><br>

            Password: <input type="password" name="password" id="pass" value="<?php if (isset($_COOKIE['password'])) {
                                                                                    echo $_COOKIE['password'];
                                                                                } ?>"><br><br>
            <input type="checkbox" onclick="showPass()"> Show password <br>

            <span class="error"> <?php echo $msg; ?></span><br>
            <hr>

            <input type="checkbox" name="rememberMe" value="rememberMe">
            <label>Remember Me</label><br><br>

            <input type="submit" name="submit" value="Submit">
            <a href="Forget_Password.php">Forgot password?</a>
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
        </script>
    </form>

    <?php include 'Footer.php'; ?>

</body>

</html>