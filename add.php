<?php

// initialise persisting form data and sets them all to an empty string
$title = $email = $ingredients = '';

// form errors array
$errors = array('email' => '', 'title' => '', 'ingredients' => '');


// $_POST and $_GET are global associated arrays in PHP

if (isset($_POST['submit'])) {

  // check email field is not empty using empty() function
  if (empty($_POST['email'])) {
    $errors['email'] = 'An email is required <br/>';
  } else {
    // parse potential xss attack, and check email is valid using php in-built method
    $email = htmlspecialchars($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email must be a valid email address <br/>';
    }
  }

  // check title field is not empty using empty() function
  if (empty($_POST['title'])) {
    $errors['title'] = 'A title is required <br/>';
  } else {
    // parse potential xss attack, then check title validity using regex
    $title = htmlspecialchars($_POST['title']);
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = 'Title must be letters and spaces only <br/>';
    }
  }

  // check ingredients
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = 'At least one ingredient is required <br/>';
  } else {
    // parse potential xss attack, then check ingredients is a comma separated list of words with letters and spaces only
    $ingredients = htmlspecialchars($_POST['ingredients']);
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      $errors['ingredients'] = 'Ingredients must be a comma separated list of words<br/>';
    }
  }
} // end of POST check
?>
<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<section class="container grey-text">
  <h4 class="center">Add a Sundae</h4>

  <form action="add.php" method="POST" class="white">
    <label for="">Your Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <div class="red-text"><?php echo $errors['email'] ?></div>
    <label for="">Sundae Title:</label>
    <input type="text" name="title" value="<?php echo $title; ?>">
    <div class="red-text"><?php echo $errors['title'] ?></div>
    <label for="">Ingredients (Comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo $ingredients; ?>">
    <div class="red-text"><?php echo $errors['ingredients'] ?></div>
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>

</section>

<?php include('./templates/footer.php'); ?>

</body>

</html>