<?php

if (isset($_POST['submit'])) {

  // check email
  if (empty($_POST['email'])) {
    echo 'An email is required <br/>';
  } else {
    echo htmlspecialchars($_POST['email']);
  }

  // check title
  if (empty($_POST['title'])) {
    echo 'A title is required <br/>';
  } else {
    echo htmlspecialchars($_POST['title']);
  }

  // check ingredients
  if (empty($_POST['ingredients'])) {
    echo 'Ingredients are required <br/>';
  } else {
    echo htmlspecialchars($_POST['ingredients']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<section class="container grey-text">
  <h4 class="center">Add a Sundae</h4>

  <form action="add.php" method="POST" class="white">
    <label for="">Your Email:</label>
    <input type="text" name="email">
    <label for="">Sundae Title:</label>
    <input type="text" name="title">
    <label for="">Ingredients (Comma separated):</label>
    <input type="text" name="ingredients">
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>

</section>

<?php include('./templates/footer.php'); ?>

</body>

</html>