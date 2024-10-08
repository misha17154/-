<?php
session_start();
include_once('../api/order/ordersController.php');
if (isset($_GET['completed'])) {
    $orderId = $_GET['completed'];
    $ordersController->updateOne($orderId, $ordersToTechnicid, $isCompleted);
}


$orders = $ordersController->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/ui.css">
    <link rel="stylesheet" href="../styles/tableAdmin.css">
</head>
<body>
<?php
   include_once('../component/header.php');
    ?>
<?php
    if ($_SESSION['role'] == 'admin') {
        echo "<a href='./AddCard.php'> Добавить товар </a>";
        echo "<a href='./DeleteCard.php'> Удалить товар </a>";
    }
    ?>
     <table>
        <thead>
            <tr>

                <td>Статус</td>
                <td>ID заказа</td>
                <td>Адресс</td>
                <td>Тип оплаты</td>
                <td>ФИО</td>

                <td>Артикул</td>
                <td>Размер</td>
                <td>Название</td>
            </tr>
        </thead>
            <?php
            foreach ($orders as $order) {
                $rowSpan = count($order->products);
                echo"<tr>";

                
                $completed = $order->completed;
                if ($completed == 1) {
                echo "<td rowspan= '$rowSpan'>$completed</td>";
                } else {
                    ?>
                    <td
                    rowspan='<?php echo "$rowSpan"?>'>
                    <form action="" method="GET">
                        <button name="completed" value="<?php 
                        $orderId = $order->id;
                        echo "$orderId";?>">Выполнить</button>
                    </form>
                </td>
                    <?php
                }
               

                $id = $order->id;
                echo "<td rowspan= '$rowSpan'>$id</td>";

                $adress = $order->adress;
                echo "<td rowspan= '$rowSpan'>$adress</td>";

                $payOffline = $order->payOffline;
                echo "<td rowspan= '$rowSpan'>$payOffline</td>";

                $username = $order->username;
                echo "<td rowspan= '$rowSpan'>$username</td>";

                foreach ($order->products as $key => $product){
                    if ($key != 0) {
                        echo"<tr>";
                    }
                    $articul = $product->articul;
                    echo "<td>$articul</td>";

                    $size = $product->size;
                    echo "<td>$size</td>"; 

                    $header = $product->header;
                    echo "<td>$header</td>";

                    echo"</tr>";
                }
                echo"</tr>";

            }
            ?>
        </Tbody>
    </table>

    <?php 
  include_once('../component/footer.php');
  ?>
</body>
</html>

<?php
if (isset($_GET['addToBasket'])) {
    include_once ('./api/basket/basketController.php');
    $userBasket = $basketController->getOne($_SESSION['userid']);
    $inBasket = false;
    foreach ($userBasket as $index => $techniqueInBasket) {
        if ($_GET['addToBasket'] == $techniqueInBasket['articul']) {
            $inBasket = true;
        }
    }
    if ($inBasket) {
        echo "<script> alert('Такой товар уже есть') </script>";
    } else {
        $basketId =  $_SESSION['basketid'];
        $res = $basketController->addOne($_SESSION['basketid'], 
        $_GET['addToBasket'], 1);
        echo "<script> alert('Товар добавлен в корзину $basketId') </script>";
    }
}
?>