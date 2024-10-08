<?php
$servername = "localhost";
$username = "a1037211_SmartTechnology";
$password = "71762098Ee";
$bdname = "a1037211_SmartTechnology";

$connection = new mysqli($servername, $username, $password, $bdname);

if (isset($connection->connect_error)) {
    die("connection failed:".$connection->connect_error);
}