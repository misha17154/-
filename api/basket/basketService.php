<?php
require_once('../api/bd.php');
class basketService
{
    protected $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAll()
    {
        $query = "
        SELECT T.id AS articul, BTC.basketid AS basketId, T.typeTechnic, T.technic, T.color, T.brand, T.header, T.description, T.cost, BTC.count
        FROM `technic` AS T, `basketToCloth` AS BTC
        WHERE BTC.technicid = T.id;
        ";

        $res = mysqli_query($this->connection, $query);

        $baskets = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($baskets, $row);
                // print_r($row);
                // echo "<br>";
            }
        }

        return $baskets;
    }
    public function getOne($userId)
    {
        $query = "
        SELECT T.id AS articul, BTC.basketid AS basketId, T.typeTechnic, T.technic, T.color, T.brand, T.header, T.description, T.cost, T.imgSrc, BTC.count 
        FROM `technic` AS T, `basketToCloth` AS BTC 
        WHERE BTC.technicid = T.id AND BTC.basketid = $userId;
        ";

        $res = mysqli_query($this->connection, $query);

        $userBasket = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($userBasket, $row);
                // print_r($row);
                // echo "<br>";
            }
        }
        return $userBasket;
    }

    public function addOne($basketId, $technicId, $count)
    {
        $query = "
            SELECT * 
            FROM `basketToCloth`
            WHERE 
            `id` = $basketId AND
            `technicid` = $technicId";
print_r ($basketId);
        $res = mysqli_query($this->connection, $query);

        if ($res->num_rows > 0) {
            return ['error' => "Ошибка! Товар уже был добавлен в корзину!"];
        }

        $query = "
        INSERT INTO `basketToCloth`(`basketid`, `technicid`, `count`) 
        VALUES ($basketId, $technicId, $count)
        ";

        $res = mysqli_query($this->connection, $query);

        if ($res == 1) {
            $query = "
            SELECT * 
            FROM `basketToCloth`
            WHERE 
            `basketid` = $basketId AND
            `technicid` = $technicId AND
            `count` = $count";

            $res = mysqli_query($this->connection, $query);

            $row = [];
            if ($res->num_rows > 0) {
                $row = mysqli_fetch_assoc($res);
            }
            return $row;
        }
    }

    public function updateOne($busketToClothId, $newCount)
    {
        $query = "
        UPDATE `busketToCloth` 
        SET `count`= $newCount
        WHERE id= $busketToClothId;
        ";

        $res = mysqli_query($this->connection, $query);
        // print_r($res);


        $query = "
        SELECT *
        FROM `busketToCloth`
        WHERE id = $busketToClothId AND `count`= $newCount
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
    public function deleteOne($userId, $technicId)
    {
        $query = "
        SELECT basketToCloth.id as BTCid, technic.id, technic.typetechnic, technic.technic, technic.brand, technic.color, technic.header, technic.description, technic.cost 
        FROM `basketToCloth`, `basket`, `technic` 
        WHERE basketToCloth.technicid = $technicId AND basketToCloth.basketid = basket.id AND basket.userid = $userId AND basketToCloth.technicid = technic.id;
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
        $basketToClothId = $row['BTCid'];
        $query = "
        DELETE FROM `basketToCloth` 
        WHERE id= $basketToClothId;
        "; 
        
        print_r($technicId);

        $res = mysqli_query($this->connection, $query);

        return $row;

       
    }
}

$basketService = new basketService($connection);