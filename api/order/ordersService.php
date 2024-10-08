<?php
require_once ('../api/bd.php');
include_once ('../api/order/Order.php');
include_once ('../api/technique/technique.php');
class ordersService
{
    protected $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    // Получить все
    public function getAll()
    {
        $query = "
        SELECT o.id, o.adress, o.payOffline, o.completed, u.name, t.id as articul, t.typetechnic, t.color, t.brand, t.header, t.description, t.cost, oTT.count 
        FROM `users` as u, `orders` as o, `ordersToTechnic` as oTT, `technic` as t
        WHERE u.id = o.userid AND oTT.technicid = t.id AND oTT.orderid = o.id
        ORDER BY o.id ASC
        ";

        $res = mysqli_query($this->connection, $query);
        $orders = [];
        if ($res->num_rows > 0) {
            $newOrder = new Order(-1, "", "", "", "", []);
            while ($row = mysqli_fetch_assoc($res)) {
                $counter +=1;
                // Проверка на то, что заказ с таким номером уже сущестует
                if ($newOrder->id !== $row['id']) {
                    // Добавляем сформированный заказ
                    if ($newOrder->id != -1) {
                        array_push($orders, $newOrder);
                    }
                    // Формирую новый заказ без продуктов
                    $newOrder = new Order($row['id'], $row['name'], $row['adress'], $row['payOffline'], $row['completed'], []);
                }
                // Cформировать продукт и добавить в новый заказ
                $newTechnic = new Technique($row['articul'], $row['technic'], $row['typetechnic'], $row['color'], $row['brand'], $row['header'], $row['description'], $row['cost']);
                
                array_push($newOrder->products, $newTechnic);

                if ($res->num_rows === $counter) {
                    array_push($orders, $newOrder);
                }

            }
        }

        return $orders;
    }
    // Получить один
    public function getOne($userId)
    {
        $query = "
        SELECT u.name, t.type, t.color, t.brand, t.header, t.description, t.cost 
        FROM `users` as u, `favorite` as f, `favoriteToTechnic` as fTT, `technic` as t 
        WHERE u.id = f.userid AND f.id = fTT.favoriteid AND fTT.clothid = t.id AND u.id = $userId;
        ";

        $res = mysqli_query($this->connection, $query);

        $userFavorite = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($userFavorite, $row);
            }
        }
        return $userFavorite;
    }
    // Добавить один
    public function addOne($userId, $technique, $adress, $payOffline)
    {
        // Проверяем, есть ли уже такая запись
        $query = "
            INSERT INTO `orders`( `userid`, `adress`, `payOffline`, `completed`) 
VALUES ($userId,'$adress',$payOffline,false)";

        $res = mysqli_query($this->connection, $query);

        $query = "
        SELECT *
        FROM orders AS O
        WHERE O.userid = $userId AND O.adress = '$adress' AND O.payOffline = $payOffline
        "; 

    $res = mysqli_query($this->connection, $query);
    if ($res->num_rows === 0) {
        return ['error' => "Ошибка! Заказ не был добавлен"];
    }

     $order = mysqli_fetch_assoc($res);
     foreach ($technique as $value) {
        $orderId = $order['id'];
       $techniqueId = $value['articul'];
       $count = $value['count'];
        $query = 
        "
        INSERT INTO `ordersToTechnic`( `orderId`, `technicid`, `count`) 
        VALUES ( $orderId, $techniqueId, $count)
        ";
        $res = mysqli_query($this->connection,$query);
     }
     print_r($res);
        }
    // Обновить один
    public function updateOne($orderId)
    {
        $query = "
        UPDATE `orders` 
        SET `completed`= 1
        WHERE id= $orderId;
        ";

        $res = mysqli_query($this->connection, $query);

        // Проверка, что запрос выполнился, и строка с новыми параметрами существует
        $query = "
        SELECT *
        FROM `orders`
        WHERE id = $orderId AND `completed`= 1
        ";
        $res = mysqli_query($this->connection, $query);

        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            return $row;
        } else {
            return [
                'error' => "Ошибка при обновлении данных!"
            ];
        }
    }
    // Удалить один
    public function deleteOne($userId, $technicId)
    {
        // Получаем одежду которую удаляем и id записи в busketToCloth (BTCid)
        $query = "
        SELECT fTT.id as FTTid, fTT.favoriteid, fTT.clothid 
        FROM `users` as u, `favorite` as f, `favoriteToTechnic` as fTT, `technic` as t 
        WHERE fTT.clothid = t.id AND fTT.favoriteid = f.id AND u.id = f.userid AND u.id = $userId AND t.id = $technicId;
        ";

        $res = mysqli_query($this->connection, $query);

        $row = [];
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
        } else {
            return [
                'error' => "Ошибка! Запись не найдена"
            ];
        }
        // Удаляем строку
        $favoriteToTechnicId = $row['FTTid'];
        $query = "
        DELETE FROM `favoriteToTechnic` 
        WHERE id= $favoriteToTechnicId;
        ";

        $res = mysqli_query($this->connection, $query);

        return $row;
    }
}

$ordersService = new ordersService($connection);