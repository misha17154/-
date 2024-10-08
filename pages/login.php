<?php
session_start();
?>
<?php
include_once('../api/auth/authController.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $pass = md5($_POST['password']);
    $user = $authController->login(
        $_POST['login'],
        $pass
    );
    $_SESSION['userid'] = $user['userid'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['basketid'] = $user['basketid'];
    $_SESSION['favoriteid'] = $user['favoriteid'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['isAuth'] = true;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="../styles/ui.css">
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
<?php
     include_once('../component/header.php');
    ?>

    
    <div class="Formlog">
        <h1 class="log_title">Вход</h1>
        <form action="" method = "POST" >
        <input type="text" placeholder="Имя" name="login" required class="login"><br>
        <input type="text" placeholder="Пароль" name="password" required class="pass"><br>
        <button class="BTN_log">Войти</button>
    </form> 
    </div>
   

    <?php
     include_once('../component/footer.php');
    ?>
   
</body>
</html>

