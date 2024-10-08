<?php
require_once ('./api/db.php');
class favoriteService
{
    protected $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    // Получить все
    public function getAll()
    {
        // username, вся инфа о штанах или о другой одежде которая ему принадлежит
        // vasya футболка л заголовок хедер
        // vasya штаны с загловок хедер
        // петя футболка л заголовок хедер
        $query = "
        SELECT u.name, t.technic, t.type-technic,  t.color, t.brand, t.header, t.description, t.cost 
        FROM `users` as u, `favorite` as f, `favoriteToTechnic` as fTT, `technic` as t 
        WHERE u.id = f.userid AND f.id = fTT.favoriteid AND fTT.technicid = t.id;
        ";

        $res = mysqli_query($this->connection, $query);

        $favorites = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($favorites, $row);
                // print_r($row);
                // echo "<br>";
            }
        }

        return $favorites;
    }
    // Получить один
    public function getOne($userId)
    {
        $query = "
        SELECT u.name, t.type-technic,  t.color, t.brand, t.header, t.description, t.cost  
        FROM `users` as u, `favorite` as f, `favoriteToTechnic` as fTT, `technic` as t 
        WHERE u.id = f.userid AND f.id = fTT.favoriteid AND fTT.technicid = t.id AND u.id = $userId;
        ";

        $res = mysqli_query($this->connection, $query);

        $userFavorite = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($userFavorite, $row);
                // print_r($row);
                // echo "<br>";
            }
        }
        return $userFavorite;
    }
    // Добавить один
    public function addOne($favoriteId, $techniqueId)
    {
        // Проверяем, есть ли уже такая запись
        $query = "
            SELECT * 
            FROM `favoriteToTechnic`
            WHERE 
            `favoriteid` = $favoriteId AND
            `technicid` = $techniqueId";

        $res = mysqli_query($this->connection, $query);

        if ($res->num_rows > 0) {
            return ['error' => "Ошибка! Товар уже был добавлен в избранное!"];
        }

        // Добавляем продукт в избраное
        $query = "
        INSERT INTO `favoriteToTechnic`(`favoriteid`, `technicid`) 
        VALUES ($favoriteId, $techniqueId)
        ";

        $res = mysqli_query($this->connection, $query);

        // делаем запрос на получение той строки, которую мы ТОЛЬКО ЧТО добавили
        if ($res == 1) {
            $query = "
            SELECT * 
            FROM `favoriteToTechnic`
            WHERE 
            `favoriteid` = $favoriteId AND
            `technicid` = $techniqueId;";

            $res = mysqli_query($this->connection, $query);

            $row = [];
            if ($res->num_rows > 0) {
                $row = mysqli_fetch_assoc($res);
            }
            return $row;
        }
    }
    // Обновить один
    // public function updateOne($busketToClothId, $newCount)
    // {
    //     $query = "
    //     UPDATE `busketToCloth` 
    //     SET `count`= $newCount
    //     WHERE id= $busketToClothId;
    //     ";

    //     $res = mysqli_query($this->connection, $query);
    //     // print_r($res);

    //     // Проверка, что запрос выполнился, и строка с новыми параметрами существует
    //     $query = "
    //     SELECT *
    //     FROM `busketToCloth`
    //     WHERE id = $busketToClothId AND `count`= $newCount
    //     ";
    //     $res = mysqli_query($this->connection, $query);

    //     if ($res->num_rows > 0) {
    //         $row = mysqli_fetch_assoc($res);
    //         return $row;
    //     } else {
    //         return [
    //             'error' => "Ошибка при обновлении данных!"
    //         ];
    //     }
    // }
    // Удалить один
    public function deleteOne($userId, $techniqueId)
    {
        // Получаем одежду которую удаляем и id записи в busketToCloth (BTCid)
        $query = "
        SELECT fTT.id as FTTid, fTT.favoriteId, fTT.technicid 
        FROM `users` as u, `favorite` as f, `favoriteToTechnic` as fTT, `technic` as t 
        WHERE fTT.technicid = t.id AND fTT.favoriteid = f.id AND u.id = f.userid AND u.id = $userId AND t.id = $techniqueId;
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
        $favoriteToTechniqueId = $row['FTTid'];
        $query = "
        DELETE FROM `favoriteToTechnic` 
        WHERE id= $favoriteToTechniqueId;
        ";

        $res = mysqli_query($this->connection, $query);
        
        return $row;
    }
}

$favoriteService = new favoriteService($connection);