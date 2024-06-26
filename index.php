<?php

// Include database configuration
include('config/db_connect.php');

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
          <img src="images/icecream.svg" alt="ice cream" class="ice-cream">
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
            <a class="brand-text" href="details.php?id=<?php echo $sundae['id'] ?>">More Info</a>
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