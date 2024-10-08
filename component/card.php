<?php
session_start();
?>
<div class="card_conteiner">
    <?php
    include_once('../api/technique/techniqueController.php');
    $techniqueArray = $techniqueController->getAll();
    foreach ($techniqueArray as $card => $technique) {
        $imgSrc = $technique['imgSrc'];
        $technic = $technique['technic'];
        $articul = $technique['id'];
        $typeTechnic = $technique['type-technic'];
        $color = $technique['color'];
        $brand = $technique['brand'];
        $header = $technique['header'];
        $description = $technique[' description'];
        $cost = $technique['cost'];
        echo "
            
            <div class='card-Shop'>
            <div>
            <p class='new'> Новинка</p>
            <p class='top'>Хит Продаж</p>
        </div>
        <img class='IMG-card' src='$imgSrc' alt=''>

        <p>$brand</p>
        <p>$description</p>

        <img class='stars' src='../Img/stars.png' alt='stars'>
        <a class='reviews' href='#'>Отзывы</a>

        <p class='discount'>$cost</p>
        <form action='' method = 'GET'>
        <button class='BTN' name = 'addToBasket' value= '$articul'>Купить в один клик</button>
        </form>
       <a href='basket.php'><img class='basket-Card' src='../Img/basket-shop.png' alt='basket-shop'></a> 
    </div>
     ";
    }
    ?>

</div>