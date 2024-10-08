<?php
session_start();
header("..\pages\AboutUs.php")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/contacts.css">
    <link rel="stylesheet" href="../styles/ui.css">
</head>

<body>
<?php
    include_once('../component/header.php');
    ?>


    <div class="contacts_block">
        <div class="contact_wrapper">
            <h1 id="contacts">Контакты</h1>

            <div class="contacts">
                <div class="first_address">
                    <p class="address">СПб, Ул. Дыбенко д.23 к.1</p>
                    <a href="" class="phone">+7 (812) 509-23-43</a>
                </div>

                <div class="first_address">
                    <p class="address">СПб, Ул. Дыбенко д.23 к.1</p>
                    <a href="" class="phone">+7 (812) 509-23-43</a>
                </div>

                <div class="first_address">
                    <p class="address">СПб, Ул. Дыбенко д.23 к.1</p>
                    <a href="" class="phone">+7 (812) 509-23-43</a>
                </div>

                <div class="first_address">
                    <p class="address">СПб, Ул. Дыбенко д.23 к.1</p>
                    <a href="" class="phone">+7 (812) 509-23-43</a>
                </div>

                <img src="../Img\Line 55.png" alt="" class="line_IMG">

                <img src="../Img\mail.png" alt="" class="mail">
                <a href="" class="E-mail_contacts">smart-tekhnika@gmail.com</a>
            </div>
        </div>

        <img src="../Img/map.png" alt="" class="img-contacts">
    </div>

    
        <form action="">
        <h1 class="connection">Связаться с нами</h1>
        <p class="name_contacts">Имя</p>
        <input type="text" placeholder="Введите имя" id="entryfield_name">

        <p class="phone_contacts">Телефон</p>
        <input type="text" placeholder="Введите телефон" id="entryfield_phone">
    </form>

    
        <form action="">
        <p class="massager">Сообщение</p>
        <input type="text" placeholder="Введите сообщение" id="entryfield_massager"> 
        
        <button class="BTN-contacts">Отправить</button>
    </form>
    <input type="checkbox" class="check_mark">Отправляя данную форму вы соглашаетесь с политикой конфиденциальности
    
    <?php
    include_once('../component/footer.php');
    ?>

</body>

</html>