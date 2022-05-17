<?php
$user_err = "";
$status = -1;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["email"];
    $password = $_POST["password"];

    $user = "root";
    $pass = "";
    $db = "udite_ch";
    $con = mysqli_connect('localhost', $user, $pass, $db) or
        die("Connection Falied : ".mysqli_connect_error());
    $sql = "SELECT user, pass from registration where user = '$username'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $user_err = "A user with same email already exists";
        $status = 0;
    }
    else
    {
        $sql = "INSERT INTO registration(user, pass) VALUES('$username', '$password')";
        mysqli_query($con, $sql);
        $status = 1;
        $email_to = '$username';
        $subject = 'Place+';
        $body  = "Welcome, You have successfully registered on Place+";
        $headers = "From : example@tech.com";
        if(mail($email_to, $subject, $body, $headers)){
            echo "Mail sent";
        }
        else
            echo "Mail failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registration Placement+</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='registration.css'>
    <script src='registration.js'></script>
</head>
<body>
    <h1 style = "text-align: center; color: brown;" ><u>Welcome to Placement+</u></h1>
    <div id = "divform">
        <p style="text-align: center; font-size: 18px;"><u>Fill in the details below and Register</u></p>
        <br/>
        <form name = "registerform" onSubmit = "return clientValidate()" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>NAME : </label>
            <input style="margin-left:94px;" type = "text" name = "name" id = "name" required autofocus/>
            <br/><br/>
            <label>AGE : </label>
            <input style="margin-left:109px;" type = "text" name = "age" id = "age" required/>
            <br/><br/>
            <label>DATE OF BIRTH : </label>
            <input style="margin-left:26px;"type = "date" name = "DOB" id = "DOB" required/>
            <br/><br/>
            <label>EMAIL ID : </label>
            <input style="margin-left:72px;"type = "email" name = "email" id = "email" maxlength = "30" required/>
            <span><?php echo " ".$user_err; ?></span>
            <br/><br/>
            <label>PASSWORD : </label>
            <input style="margin-left:56px;" type = "password" name = "password" id = "password" maxlength = "16" required/>
            <br/><br/>
            <label>RESUME UPLOAD : </label>
            <input style="margin-left:10px;" type = "file" accept=".doc, .docx, .pdf" name = "resume" id = "resume" required/>
            <br/><br/><br/>
            <div id="space"></div>
            <input type = "reset" value = "reset" name = "reset" id = "reset" required/>
            <div style="display: inline; padding-left: 30px;" ></div>
            <input type = "submit" value = "register" name = "submit" id = "submit" required/>
        </form>
    </div>
    <p style="font-size: 20px; padding-left: 3px;">Already have an account - </p>
    <a href="login.php" style="padding-left: 3px">Sign In</a>    
    <span>
    <?php 
    if($status == 1){
        echo "<p style='font-size: 20px; padding-left: 3px;'>Registered Successfully, an email has been sent to you</p>";
    }
    else if($status == 0){
        echo "<p style='font-size: 20px; padding-left: 3px;'>A user with same email already exists</p>";
    }
    ?>
    </span>
</body>
</html>