<?php

// $con = new mysqli("localhost", "root", "", "it113");
$con = new mysqli("localhost", "root", "123", "it113");

if ($con->connect_error) {
    die("Error connecting..." . $con->connect_error);
}
