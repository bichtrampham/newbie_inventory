<?php
    include_once 'include/login.php';

    $query = $pdo->query ('SELECT * FROM users');
    $users = $query->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventaire manga</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="ressources/style/styleUser.css">
</head>
<body>
  <div class="containerMessage">
      <div class="welcomeMessage"> <p>Welcome to Yumero Inventory</p></div>
  </div>
    <div class="container">
       <div class="headerLogin"><p>Member login</p></div>
       <div class="iconLogin"><img src="ressources/images/avatar.png" alt="#"></div>
        <div>
            <form method="post" action="#" class="formLogin">
                <input type="text" placeholder="Enter Username" name="login" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>