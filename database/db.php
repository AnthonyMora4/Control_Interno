<?php


$db_connection = mysqli_connect(
    'localhost:3306',
    'root',
    'root',
    'control_interno'
);

if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>