<?php
session_start();
// Костыль, как будто мы уже зарегистрировались и знаем всё о пользователе
// $_SESSION['isAuth'] = true;
// $_SESSION['basketid'] = 1;
// $_SESSION['userid'] = 1;
// $_SESSION['userRole'] = "admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/ui.css">
</head>
<body>
<?php
    include_once('../component/header.php');
    ?>
    <?php
    if ($_SESSION['userRole'] == 'admin') {
        echo "<a href='../storeAdd.php'> Добавить товар </a>";
        echo "<a href='../storeDelete.php'> Удалить товар </a>";
    }
    ?>
    <div class="cardDel">
        <?php
       
        
        include_once('../api/technique/techniqueController.php');
        $techniqueArray = $techniqueController->getAll();
       
           foreach ($techniqueArray as $index => $technique) {
               $imgSrc = $technique['imgSrc'];
               $articul = $technique['id'];
               $type = $technique['type'];
               $color = $technique['color'];
               $brand = $technique['brand'];
               $header = $technique['header'];
               $description = $technique['description'];
               $cost = $technique['cost'];
               echo "
                   <div id='card-Shop'>
                       <img src='$imgSrc' alt=''> <br>
                       <h4> Артикул: $articul </h4>
                       <h4> Тип: $type </h4>
                       <h4> Цвет: $color </h4>
                       <h4> Бренд: $brand </h4>
                       <h4> Название: $header </h4>
                       <h4> Описание: $description </h4>
                       <h4> Цена: $cost </h4>
                       <form action='' method='GET'>
                           <button name='deleteFromCatalog' value='$articul'> Удалить </button>
                       </form>
                   </div>
               ";
           }
           ?>
           </div>
          
</body>
</html>

<?php
if (isset($_GET['deleteFromCatalog'])) {
    include_once ('../api/technique/techniqueController.php');

    $res = $techniqueController->deleteOne($_GET['deleteFromCatalog']);

    $_GET['deleteFromCatalog'] = '';

    echo "<script> alert('Товар удалён') </script>";
}
?>

<?php
include_once('../component/footer.php')
?>