<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'db_zain');

if (mysqli_connect_error()) {
    echo "Connection failed: " . $mysqli->connect_error;
} else {
    // echo "Connection established";
}


?>
