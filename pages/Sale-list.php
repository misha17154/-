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
    <link rel="stylesheet" href="../styles/Sale-list.css">
</head>
<body>
<?php
     include_once('../component/header.php');
    ?>


        <div class="Sale-list">
            <p class="name">Скидка в ДЕНЬ РОЖДЕНИЯ (неделя до/после)</p>
            <p class="description">Приобретение Электротранспорта, Smart-Техники и мелкой бытовой техники влечет за собой большие денежные траты. Сеть магазинов Смарт-маркт предлагает покупателям широкий ассортимент товаров по Самым доступным ценам в России. Чтобы шоппинг стал наиболее выгодным, руководство компании разработало уникальную программу лояльности для Именинников.</p>
        <img src="../Img\Торт.png" alt="" id="cake">
        </div>

        <h4 id="condition-sale">Условия Акции:</h4>

        <ol id ="condition">
            <li> Скидку можно получить при предъявлении любого удостоверения подтверждающего, что у клиента День Рождения.</li>

            <li>Скидка действует за неделю до дня рождения включительно и неделю после дня рождения включительно</li>

            <li> Скидка составляет 10% от стоимости основного товара, н оне должна превышать номинал в 1000 рублей</li>

            <li>Скидки не суммируются т.к. мы разрабатываем для Вас наилучшие условия для покупки Техники</li>

            <li>Если срок Менее 7 дней до Дня Рождения или более 7 дней после Дня Рождения скидка оговаривается в индивидуальном порядке и может достигать Максимальных значений</li>
        </ol>
        
        <?php
    include_once('../component/footer.php');
    ?>

</body>
</html>