<?php

include('config/db_connect.php');

// check GET request is param from global $_GET array
if (isset($_GET['id'])) {

  $id = mysqli_real_escape_string($connection, $_GET['id']);

  // make sql
  $sql = "SELECT * FROM sundaes WHERE id = $id";

  // get the query result
  $result = mysqli_query($connection, $sql);

  // fetch one result as associate array
  $sundae = mysqli_fetch_assoc($result);

  // free up memory
  mysqli_free_result($result);

  // close connection to database
  mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<h2>details</h2>

<?php include('templates/footer.php'); ?>


</html>