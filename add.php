<?php

$email = $title = $ingredients = '';
$errors = array('email' => '', 'title'=> '', 'ingredients'=>'');

    if (isset($_POST['submit'])) {
        
        // check email
        if (empty($_POST['email'])) {
            $errors['email'] = 'An email is required';
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'email must be a valid email address';
            }
        }

        // check title
        if (empty($_POST['title'])) {
            $errors['title'] = 'An title is required';
        } else {
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title'] = 'title must be letters and spaces only';
            }
        }

        // check engrients
        if (empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least one engrient is required';
        } else {
            $ingredients = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $errors['ingredients'] = 'Ingredients must be a comma separated list';
            }
        }
        
        if (array_filter($errors)) {
            //echo 'errors have';
        } else {
            header('Location: index.php');
        }

    } //end of POST check
?>

<!DOCTYPE html>

<html lang="en">

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center"> Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            
            <label for="email">Your Email:</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label for="title">Pizza Title</label>
            <input type="text" name="title" id="title"  value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            
            <label for="ingredients">Ingredients (comma separated):</label>
            <input type="text" name="ingredients" id="ingredients"  value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            
            <div>
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        
        
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>