<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../styles/ui.css">
    <link rel="stylesheet" href="../styles/registration.css">
</head>

<body>
    <?php
    include_once('../component/header.php');
    ?>
    
    <form action="" method="POST" class = "register_form">
        <div class="H1_register">
            <p >Регистрация</p>
    </div>
        
        <input type="text" placeholder="Введите логин" name="login" required class= "input"><br>
        <input type="text" placeholder="Введите имя" name="name" required class= "input"><br>
        <input type="text" placeholder="Введите почту" name="email" required class= "input"><br>
        <input type="text" placeholder="Введите телефон" name="phone" required class= "input"><br>
        <input type="password" placeholder="Введите пароль" name="password" required class= "input"><br>
        <button  class="BTN-contacts"> Зарегистрироваться </button>
        <a href="/Final_Prodject\login.php" id="IRegistration">Я уже зарегистрирован</a>
    </form>

    <?php
    include_once('../component/footer.php');
    ?>
</body>

</html>

<?php
include_once ('../api/auth/authController.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = md5($_POST['password']);

    $user = $authController->register(
        $_POST['login'],
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $pass
    );
    print_r($user);
    $_SESSION['userid'] = $user['userid'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['basketid'] = $user['basketid'];
    $_SESSION['favoriteid'] = $user['favoriteid'];
}
?>