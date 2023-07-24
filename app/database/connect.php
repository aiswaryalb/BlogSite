<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db_name = 'BlogSite';

$conn = new mysqli($host,$user,$pass,$db_name);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
/*
else
{
    echo "Db Connected Succesfully ";
}
*/