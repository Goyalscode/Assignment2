<?php
$user_err = "";
$status = -1;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = "root";
    $pass = "";
    $db = "udite_ch";
    $con = mysqli_connect('localhost', $user, $pass, $db) or
        die("Connection Falied : ".mysqli_connect_error());
    $sql = "SELECT user, pass from registration where user = '$username' AND pass = '$password'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $status = 1;
    }
    else
    {
        $user_err = "  Invalid Username and/or Password";
        $status = 0;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Placement+</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='login.css'>
    <script src='login.js'></script>
</head>
<body>
    <h1 style = "text-align: center; color: brown;" ><u>Welcome to Placement+</u></h1>
    <span>
    <?php 
    if($status == 1){
        echo "<p style='font-size: 20px; padding-top : 20px; color:red; padding-left: 3px; text-align:center;'>Login Successfull</p>";
        echo "<script>window.location.replace('dashboard.html')</script>";
    }
    else if($status == 0){
        echo "<p style='font-size: 20px; padding-top : 20px; color:red; padding-left: 3px; text-align:center;'>Login Failed</p>";
    }
    ?>
    </span>
    <div id = "divform">
        <p style="text-align: center; font-size: 18px;"><u>Enter your username and password</u></p>
        <br/>
        <form name = "loginform" onSubmit = "return clientValid()" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>USERNAME OR EMAIL: </label>
            <input style="margin-left:24px;" type = "text" name = "username" id = "username" required autofocus/>
            <span>
            <?php
            if($status!=-1) 
                echo " ".$user_err;     
            ?>
            </span>
            <br/><br/>
            <label>PASSWORD : </label>
            <input style="margin-left:102px;" type = "password" name = "password" id = "password" maxlength = "16" required/>
            <br/><br/>
            <div id="space"></div>
            <input type = "reset" value = "reset" name = "reset" id = "reset" required/>
            <div style="display: inline; padding-left: 30px;" ></div>
            <input type = "submit" value = "login" name = "submit" id = "submit" required/>
        </form>
    </div>
</body>
</html>