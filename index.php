<?php

// Include database configuration
include('config.php');

// connect to database
$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);


// check connection
if (!$connection) {
  echo 'Connection error' . mysqli_connect_error();
}

// write query for all sundaes
$sql = 'SELECT  title, ingredients, id FROM sundaes';

// make query and get result (we can't use this format)
$result = mysqli_query($connection, $sql);

// fetch the resulting rows as an array (in an associative array)
$sundaes = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($sundaes);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<?php include('./templates/footer.php'); ?>

</body>

</html>