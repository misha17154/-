<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale</title>
    <link rel="stylesheet" href="../styles/ui.css">
    <link rel="stylesheet" href="../styles/Installment_plan.css">
</head>

<body>
    <?php
    include_once('../component/header.php');
    ?>


    <h1 id="Installment">Рассрочка 0|0|18</h1>

    <img src="../Img/халва.png" alt="" id="halva">

    <h3 id="work-installment">Как работает рассрочка</h3>

    <div class="conditions">
        <p>
            ТЕПЕРЬ КАРТУ ХАЛВА МОЖНО ОФОРМИТЬ В СЕТИ НАШИХ МАГАЗИНОВ СОВЕРШЕННО БЕСПЛАТНО. Это займёт не более 10 минут.
            С собой необходимо иметь лишь паспорт.


        </p>

        <p>
            С картой «Халва» сотрудничают более 200 000 партнёров от продуктовых магазинов до компаний продающих крупную
            бытовую технику и даже мебель, у которых покупки можно делать в бесплатную рассрочку. Сумма каждой такой
            покупки делится на равные части (по количеству месяцев рассрочки у партнёра). Раз в месяц «части» по всем
            покупкам суммируются и выставляются единым Платежом по рассрочке (дата выставления платежа равна дате
            оформления карты).
        </p>



    </div>

    <div class="conditions-2">
        <p>
        Проценты по вашей рассрочке за покупку в нашем магазине платит за вас НАШ МАГАЗИН
    </p>

    </div>
    
    <img src="../Img\таблица.png" alt="" id="table">

    <p class="conditions-3">
        Подключите подписку "Халва Десятка" и делайте любые покупки у партнеров с единым увеличенным сроком рассрочки 10
        месяцев.
        Можно расширить срок до 18-ти месяцев.
    </p>

    <form action="" id="form-sending">
        <h2 class="conditions-4">Оформить РАССРОЧКУ</h2>
        <p class="name">Имя</p>
        <input type="text" id="input-name">
        <p class="phone">Телефон</p>
        <input type="text" id="input-phone">
        <button class="BTN-contacts">Отправить</button>
    </form>
    <div class="mobile_bank">
        <div>
            <h2 class="title_mobileBank">Мобильное приложение «Совкомбанк – Халва»</h2>

            <p class="p_mobileBank">Мобильный банковский офис, который всегда с вами:</p>

            <li class="conditions_5">
                контроль вашей карты «Халва»
            </li>
            <li class="conditions_5">
                наиболее востребованные банковские функции
            </li>
            <li class="conditions_5">
                круглосуточный чат с поддержкой
            </li>
        </div>
    </div>


    <?php
    include_once('../component/footer.php');
    ?>

</body>

</html>