<?php
session_start();
if (isset($_GET['addToBasket'])) {
    include_once ('../api/basket/basketController.php');
    $userBasket = $basketController->getOne($_SESSION['basketid']);
    $inBasket = false;
    foreach ($userBasket as $index => $techniqueInBasket) {
        if ($_GET['addToBasket'] == $techniqueInBasket['articul']) {
            $inBasket = true;
        }
    }
    if ($inBasket) {
        echo "<script> alert('Такой товар уже есть') </script>";
    } else {
        
        $basketId = $_SESSION['basketid'];
        $res = $basketController->addOne($_SESSION['basketid'], $_GET['addToBasket'], 1);
        echo "<script> alert('Товар добавлен в корзину $basketId') </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="../styles/ui.css">
    <link rel="stylesheet" href="../styles/cardStyle.css">
</head>
<body>
   <?php
   include_once('../component/header.php');
   ?>

    <img class="main-IMG" src="../Img/apple_watch.png" alt="">

    <h2>Хиты продаж</h2>

    <select id="sorted">
        <option value="">Все товары</option>
        <option value="">Гироскутеры</option>
        <option value="">Электросамокаты</option>
        <option value="">Моноколеса</option>
        <option value="">Сигвеи</option>
        <option value="">Электроскутеры</option>
        <option value="">Электровелосипеды</option>
        <option value="">Электроскейты</option>
        <option value="">Электромобили</option>
        <option value="">Аксессуары</option>
        <option value="">Умные Устройства</option>
        <option value="">Smart Watch</option>
    </select>

    <?php
    include_once ('../api/technique/techniqueController.php');
include_once ('../component/card.php');
    ?>
<?php
include_once('../component/footer.php');
?>

</body>
</html>