<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="main_header">

        <!-- logo -->
        <a href="../pages/index.php"><img alt="" src="../Img\logo.png"></a>


        <!-- info -->
        <ul id="info">
            <li>+7(812)660-50-54</li>
            <li>+7(958)111-95-03</li>
            <li>Пн-вс: с 10:00 до 21:00</li>
        </ul>

        <!-- search -->
        <input id="search" type="text" placeholder="Поиск">

        <!-- icons -->
        <div id="icons">
            <img src="../Img\eye.png" alt="eye">
            <img src="../Img\like.png" alt="like">
            <img src="../Img\compare.png" alt="compare">
            <a href="../pages/basket.php"><img src="../Img\cart.png" alt="cart"></a>
            <a href="../pages/registration.php"><img src="../Img\signin.png" alt="sign in"></a>
            <?php
        if($_SESSION['isAuth']=== true) {
            $name = $_SESSION['name'];
            echo "
            <li> <a href = 'profile.php'>$name </a> </li>
            ";
            if ($_SESSION['role'] === 'admin') {
                echo "<li> <a href='orders.php'> Заказы </a> </li>";
            }
        } else{
            echo "
             <a href='../pages/login.php' class='log'>Войти</a>
            ";
        }
        ?>
            
</div>
    </header>




    <ul id="priceList">

        <!-- drop-down list -->
        <li><a href="#">Каталог товаров</a>
            <ul class="drop-down">
                <li><a href="../pages/index.php">Гироскутеры</a></li>
                <li><a href="../pages/index.php">Электросамокаты</a></li>
                <li><a href="../pages/index.php">Моноколеса</a></li>
                <li><a href="../pages/index.php">Сигвеи</a></li>
                <li><a href="../pages/index.php">Электроскутеры</a></li>
                <li><a href="../pages/index.php">Электровелосипеды</a></li>
                <li><a href="../pages/index.php">Электроскейты</a></li>
                <li><a href="../pages/index.php">Электромобили</a></li>
                <li><a href="../pages/index.php">Аксессуары</a></li>
                <li><a href="../pages/index.php">Умные Устройства</a></li>
                <li><a href="../pages/index.php">Smart Watch</a></li>
            </ul>
        </li>
        <li><a href="../pages/AboutUs.php">О компании</a></li>
        <li><a href="../pages/sale.php">Акции</a></li>
        <li><a href="../pages/Installment_plan.php">Рассрочка 0|0|18</a></li>
        <li><a href="../pages/Service_and_warranty.php">Сервис и гарантия</a></li>
        <li><a href="#">Опт/дропшиппинг</a></li>
        <li><a href="../pages/contacts.php">Контакты</a></li>
       <?php if ($_SESSION['role'] === 'admin') {
                echo "  <li><a href='../pages/Adminpanel.php'>Для Администрации</a></li>";
            }
            ?>
    </ul>
</body>

</html>