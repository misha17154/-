<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="../styles/ui.css">
</head>

<body>
    <?php
    include_once('../component/header.php');
    ?>
    <form enctype="multipart/form-data" action="" method="POST">
        <input type="text" placeholder="Модель" name="type" required><br>
        <input type="text" placeholder="Цвет" name="color" required><br>
        <input type="text" placeholder="Брэнд" name="brand" required><br>
        <input type="text" placeholder="Название товара" name="header" required><br>
        <input type="text" placeholder="Описание товара" name="description" required><br>
        <input type="text" placeholder="Цена" name="cost" required><br>
        <input type="file" name="img" required><br>
        <button>Добавить</button>
    </form>
</body>

</html>

<?php
include_once ('../api/technique/techniqueController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploaddir = '../Img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    print_r($uploadfile);
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    print_r($_FILES);
    $res = $techniqueController->addOne(
        $_POST['technic'],
        $_POST['typeTechnic'],
        $_POST['color'],
        $_POST['brand'],
        $_POST['header'],
        $_POST['description'],
        +$_POST['cost'],
        $uploadfile
    );
    echo "Товар добавлен";
}
?>

<?php
include_once('../component/footer.php');
?>