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

<div class="container center">
  <?php if ($sundae) : ?>
    <h4><?php
        echo htmlspecialchars($sundae['title']) ?></h4>
    <p>Created by: <?php echo htmlspecialchars($sundae['email']); ?></p>
    <p><?php echo date($sundae['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo htmlspecialchars($sundae['ingredients']); ?></p>

    <!-- DELETE FORM -->
    <form action="details.php" method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $sundae['id']; ?>">
      <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

  <?php else : ?>
    <h5>No such pizza exists!</h5>
  <?php endif ?>
</div>

<?php include('templates/footer.php'); ?>


</html>