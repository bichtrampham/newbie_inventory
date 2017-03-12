<?php
    // include
    include 'include/handle_form.php';
    include 'include/upload.php';

    session_start();
    //product table
    $query = $pdo->query ('SELECT * FROM product');
    $product = $query->fetchAll();


    //users table
    $queryusers = $pdo->query ('SELECT * FROM users');
    $users = $queryusers->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="ressources/style/style.css">
</head>
<body>
    <div class="menu">
    <h1 class="title">Inventaire</h1>
    <!--Error message-->
    <div class="messages success">
        <?php foreach($success_messages as $_message): ?>
            <p><?= $_message ?></p>
        <?php endforeach ?>
    </div>

    <div class="messages errors">
        <?php foreach($error_messages as $_key => $_message): ?>
            <p><?= "$_key : $_message" ?></p>
        <?php endforeach ?>
    </div>
    <!--Form text-->
     <form action="#" method="post">
            <fieldset class="fieldsetForm">
                <!--Form to add product-->
                <div class="form">
                    <div class="backForm <?= array_key_exists('nameBook', $error_messages) ? 'error' : '' ?>">
                        <input type="text" name="nameBook" placeholder="Name" id="name" value="<?= $_POST['nameBook'] ?>">
                        <label for="name"> Name </label>
                    </div>
                    <div class="backForm <?= array_key_exists('author', $error_messages) ? 'error' : '' ?>">
                        <input type="text" name="author" placeholder="Author" id="author" value="<?= $_POST['author'] ?>">
                        <label for="author"> Author</label>
                    </div>
                    <div class="backForm <?= array_key_exists('edition', $error_messages) ? 'error' : '' ?>">
                        <input type="text" name="edition" placeholder="Edition" id="edition" value="<?= $_POST['edition'] ?>">
                        <label for="edition"> Edition </label>
                    </div>
                    <div class="backForm <?= array_key_exists('genre', $error_messages) ? 'error' : '' ?>">
                        <input type="text" name="genre" placeholder="Genre" id="genre" value="<?= $_POST['genre'] ?>">
                        <label for="genre"> Genre </label>
                    </div>
                    <div class="backForm <?= array_key_exists('quantity', $error_messages) ? 'error' : '' ?>">
                        <input type="number" name="quantity" id="quantity" value="<?= $_POST['quantity'] ?>">
                        <label for="quantity"> Quantity </label>
                    </div>
                    <div class="backForm">
                        <input type="submit" value="create" class="valid">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <!--List Of Product-->
    <div class="interface">
        <div class="containerList">
           <!--Menu top-->
            <div class="menuTop"> 
               <p>Welcome&nbsp;    
               <?php foreach($users as $_users): ?>
                  <div class="userNameLogin">
                    <?= $_users->login ?>
                  </div>
                <?php endforeach; ?>
              </p>
            <div class="logOut"> Log out </div>
            </div>
            <table class="productList">
               <thead>
                   <td>NAME</td>
                   <td>AUTHOR</td>
                   <td>EDITION</td>
                   <td>GENRE</td>
                   <td>QUANTITY</td>
               </thead>
               <!--Insert in table retrieve data-->
                <?php foreach($product as $_product): ?>
                    <tr> 
                        <td class='nameCase' ><input type='text' class="inputchange" disabled value='<?= $_product->nameBook ?>'></td>
                        <td class='authorCase'><input type='text' class="inputchange" disabled value='<?= $_product->author ?>'></td>
                        <td><input type='text' class="inputchange" disabled value='<?= $_product->edition ?>'></td>
                        <td><input type='text' class="inputchange" disabled value='<?= $_product->genre ?>'></td>
                        <td><input type='number' class="inputchange" disabled  value='<?= $_product->quantity ?>'></td>
                        <td class="delete"><a href="?delete_id=<?= $_product->id ?>"><button class="buttonDelete">Delete</button></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>