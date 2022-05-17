<?php
$user = "root";
$pass = "";
$con = mysqli_connect('localhost', $user, $pass) or
    die("Connection failed : " . mysqli_connect_error());

$sql = "CREATE DATABASE udite_ch";
if(mysqli_query($con, $sql)){
    echo "Database created Successfully";
    $db = "udite_ch";
    $con = mysqli_connect('localhost', $usesr, $pass, $db);
    $sql = "CREATE TABLE registration(user varchar(30), pass varchar(16))";
    if(mysqli_query($con, $sql)){
        echo "Table Created Successfully";
    }
    else
        echo "Error Creating Table ".mysqli_error($con);
}
else
    echo "Error creating database ".mysqli_error($con);
?>