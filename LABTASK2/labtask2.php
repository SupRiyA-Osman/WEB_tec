<!DOCTYPE HTML>  
<html>
<head>
<style>
</style>
</head>
<body>  

<?php
$degreeCount = 0;
$nameErr = $emailErr = $genderErr = $dateOfBirthErr = $bloodGroup = $degree1 = $degree2 = $degree3 = $degree4 = "";
$name = $email = $gender = $dateOfBirth = $bloodGroupErr = $degreeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-. ]*$/",$name)) {
      $nameErr = "Only letters, period, dash and white space allowed";
      $name = "";
    }
    else {
      if (str_word_count($name) < 2){
        $nameErr = " At least 2 word";
        $name = "";
      }
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
    }
  }
  
  if (empty($_POST["dateOfBirth"])) {
    $dateOfBirthErr = "Date of birth is required";
  } else {
    $dateOfBirth = test_input($_POST["dateOfBirth"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["degree1"])) {
  } else {
    $degree1 = "ssc";
    $degreeCount = $degreeCount + 1;
  }

  if (empty($_POST["degree2"])) {
  } else {
    $degree2 = "hsc";
    $degreeCount = $degreeCount + 1;
  }

  if (empty($_POST["degree3"])) {
  } else {
    $degree3 = "bsc";
    $degreeCount = $degreeCount + 1;
  }

  if (empty($_POST["degree4"])) {
  } else {
    $degree4 = "msc";
    $degreeCount = $degreeCount + 1;
  }

  if ($degreeCount < 2) {
    $degreeErr = "Select at least 2 boxes.";
    $degree1 = $degree2 = $degree3 = $degree4 = "";
  } 

  if (empty($_POST["bloodGroup"])) {
    $bloodGroupErr = "Blood group is required";
  } else {
    $bloodGroup = test_input($_POST["bloodGroup"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <span style = "display:inline-block; width:150px;text-align:Left;"><b>NAME:</b></span> <br>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  <span style = "display:inline-block; width:150px;text-align:Left;"><b>EMAIL:</b></span> <br>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  <span style = "display:inline-block; width:150px;text-align:Left;"><b>DATE OF BIRTH:</b></span> <br> 
  <input type="DATE" name="dateOfBirth" value="<?php echo $dateOfBirth;?>">
  <span class="error">* <?php echo $dateOfBirthErr;?></span>
  <br><br>

  <span style = "display:inline-block; width:150px;text-align:left;"><b>GENDER:</b></span> <br>
 
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  <span style = "display:inline-block; width:150px;text-align:left;"><b>DEGREE:</b></span> <br>
  <input type="checkbox" name="degree1" <?php if (isset($degree1) && $degree1=="ssc") echo "checked";?> value="ssc">SSC
  <input type="checkbox" name="degree2" <?php if (isset($degree2) && $degree2=="hsc") echo "checked";?> value="hsc">HSC
  <input type="checkbox" name="degree3" <?php if (isset($degree3) && $degree3=="bsc") echo "checked";?> value="bsc">BSc
  <input type="checkbox" name="degree4" <?php if (isset($degree4) && $degree4=="msc") echo "checked";?> value="msc">MSc
  <span class="error"><?php echo $degreeErr;?></span>
  <br><br>
 
  <span style = "display:inline-block; width:150px;text-align:left;"><b>BLOOD GROUP:</b></span> <br>
  <select name="bloodGroup">
        <option value=""></option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="A+") echo "checked";?> value="A+">A+</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="A-") echo "checked";?> value="A-">A-</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="B+") echo "checked";?> value="B+">B+</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="B-") echo "checked";?> value="B-">B-</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="AB+") echo "checked";?> value="AB+">AB+</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="AB-") echo "checked";?> value="AB-">AB-</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="O+") echo "checked";?> value="O+">O+</option>
        <option <?php if (isset($bloodGroup) && $bloodGroup=="O-") echo "checked";?> value="O-">O-</option> 
      </select>
  <span class="error"> <?php echo $bloodGroupErr;?></span>
  <br><br>
  <span style = "display:inline-block; width:350px;text-align:right;"><input type="submit" name="submit" value="Submit"> </span> 
   
</form>

<?php
echo "<h2> Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateOfBirth;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree1, $degree2, $degree3, $degree4;
echo "<br>";
echo $bloodGroup;
echo "<br>";
?>

</body>
</html>










