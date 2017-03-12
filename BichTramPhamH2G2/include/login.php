<?php
include 'config.php';

// Messages
    $error_messages = array();
    $success_messages = array();

if(!empty($_POST)){
$login = htmlspecialchars($_POST['login']);
$pass_hache = sha1($_POST['password']);

$req = $pdo->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
$req->bindValue(":login", $login);
$req->bindValue(":password", $pass_hache);
$req->execute();
$userValid = $req->rowCount();

if($userValid > 0)
{
  $users = $req->fetchAll();
  session_start();
  foreach($users as $_users):
    $_SESSION['login'] = $_users->login;
    $_SESSION['password'] = $_users->password;
  endforeach;
  header("Location: inventory.php");
}
else
{
    $error_message = "username or password not valid";
}
}
?>