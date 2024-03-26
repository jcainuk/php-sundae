<?php
// Include credentials
include('config/config.php');

// connect to database
$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);


// check connection
if (!$connection) {
  echo 'Connection error' . mysqli_connect_error();
}
