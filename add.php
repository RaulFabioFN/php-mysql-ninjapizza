<?php

/*     if (isset($_GET['submit'])) {
        echo $_GET['email'];
        echo $_GET['title'];
        echo $_GET['ingredients'];
    }
 */

    if (isset($_POST['submit'])) {
        echo $_POST['email'];
        echo $_POST['title'];
        echo $_POST['ingredients'];
    }
?>

<!DOCTYPE html>

<html lang="en">

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center"> Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label for="email">Your Email:</label>
            <input type="text" name="email" id="email">
            <label for="title">Pizza Title</label>
            <input type="text" name="title" id="title">
            <label for="ingredients">Ingredients (comma separated):</label>
            <input type="text" name="ingredients" id="ingredients">
            <div>
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        
        
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>