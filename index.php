<?php

// Include database configuration
include('config.php');

// connect to database
$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);


// check connection
if (!$connection) {
  echo 'Connection error' . mysqli_connect_error();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<?php include('./templates/footer.php'); ?>

</body>

</html>