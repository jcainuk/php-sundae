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
$sql = 'SELECT  title, ingredients, id FROM sundaes ORDER BY  created_at';

// make query and get result (we can't use this format)
$result = mysqli_query($connection, $sql);

// fetch the resulting rows as an array (in an associative array)
$sundaes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($connection);

//explode(',', $sundaes[0]['ingredients']);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<h4 class="center grey-text">Sundaes!</h4>

<div class="container">

  <div class="row">

    <?php foreach ($sundaes as $sundae) :
    ?>
      <div class="col s6 md3">
        <div class="card z-depth-0">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($sundae['title']) ?></h6>
            <div>
              <ul>
                <?php foreach (explode(',', $sundae['ingredients']) as $ing) : ?>
                  <li><?php echo htmlspecialchars(($ing)) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="card-action right-align">
            <a href="#" class="brand-text">More Info</a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
    <?php if (count($sundaes) >= 2) : ?>
      <p> there are 2 or more sundaes</p>
    <?php else :  ?>
      <p>there are less then 2 pizzas</p>
    <?php endif; ?>
  </div>

</div>
<?php include('./templates/footer.php'); ?>

</body>

</html>