<?php session_start();
require('../api/basket/basketController.php');
require('../api/order/ordersController.php');
?>
<?php
if (isset($_POST['DelfromBasket'])) {

  $res = $basketController->deleteOne(
    $_SESSION['userid'],
    $_POST['DelfromBasket']
  );
  echo "<script> alert('Товар удалён из корзины') </script>";
}
if (isset($_POST['order'])) {
  $basket = $basketController->getOne($_SESSION['basketid']);

  foreach ($basket as $key => $value) {
    $articul = $value['articul'];
    $basket[$key]['count'] = 1;
  }

  $res = $ordersController->addOne($_SESSION['userid'], $basket, $_POST['adress'], $_POST['payOffline']);
  echo "<script> alert('Заказ оформлен') </script>";
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/ui.css">
  <link rel="stylesheet" href="../styles/basket.css">
  <link rel="stylesheet" href="../styles/basketCard.css">
  <title>Корзина</title>
</head>

<body>

  <?php
  include_once('../component/header.php');
  ?>
  <form action="" method="POST">
    <?php

    $basket = $basketController->getOne($_SESSION['basketid']);
    foreach ($basket as $index => $technique) {
      $imgSrc = $technique['imgSrc'];
      $technic = $technique['technic'];
      $articul = $technique['articul'];
      $typeTechnic = $technique['type-technic'];
      $color = $technique['color'];
      $brand = $technique['brand'];
      $header = $technique['header'];
      $description = $technique[' description'];
      $cost = $technique['cost'];
      echo "
        <div id='card-Shop'>

        <img class='IMG-card' src='$imgSrc' alt=''>

        <div class = 'rang'>
        <p>$brand</p>
         <img class='stars' src='../Img/stars.png' alt='stars'>
        <a class='reviews' href='#'>Отзывы</a>
        </div>
       
        <p class='discount'>  <span class ='priceCard' id ='price1'>$cost</span> Рублей</p>

        <button type = 'button' class ='BTN-minus'>-</button>
        <input type='text'  value= '1' class = 'input-count' id='count1'>
        <button type = 'button' class ='BTN-plus'>+</button>
        <button class='BTN' name = 'DelfromBasket' value= '$articul'>Удалить из корзины</button>          
       <div class = 'new_top'>
            <p class='new'> Новинка</p>
            <p class='top'>Хит Продаж</p>
        </div> 
    </div>
            ";
    }
    ?>
    <div>
      Итого <span id="totalprice">0</span>
    </div>


    <br><br><br>
    <div class="buy">
      <input type="text" name="adress" placeholder="Адрес" class="input"> <br>

      <select name="payOffline" class="choice">
        <option value="1" class="line">Оплата оффлайн</option>
        <option value="0" class="line">Оплата онлайн</option>
      </select> <br>
      <button name="order" value="order" class="BTN-contacts">Оформить заказ</button>
    </div>
  </form>
  <?php
  include_once('../component/footer.php');
  ?>

  <script src='../script/basket.js'></script>
</body>

</html>