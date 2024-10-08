<?php
require_once ('./api/bd.php');

class usersServer
{
    protected $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAll()
    {
        $query = "
    SELECT * FROM `users`
    ";

        $res = mysqli_query($this->connection, $query);

        $users = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($users, $row);
            }
        }

        return $users;
    }

    public function getOne($userId)
    {
        $query = "
    SELECT * 
    FROM `users`
    WHERE id=$userId;
    ";

        $res = mysqli_query($this->connection, $query);

        $user = [];

        if ($res->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($user, $row);
            }
        }
        return $user;
    }

    public function addOne($login, $pass, $name, $role, $phone, $email)
    {
        $query = "
    SELECT * 
    FROM `users`
    WHERE `login` = $login OR
          `phone` = $phone OR
          `email` = $email
    ";

        $res = mysqli_query($this->connection, $query);

        if ($res->num_rows > 0) {
            return ['error' => "Ошибка Пользователь уже есть"];
        }

        $query = "
    INSERT INTO `users`(`login`, `pass`, `name`, `role`, `phone`, `email`) 
    VALUES (`$login`, `$pass`, `$name`, `$role`, `$phone`, `$email`);
    ";

        $res = mysqli_query($this->connection, $query);

        if ($res == 1) {
            $query = "
        SELECT *
        FROM `users`
        WHERE 
        `login` = $login AND
        `phone` = $phone AND
        `email` = $email";

            $res = mysqli_query($this->connection, $query);

            $row = [];
            if ($res->num_rows > 0) {
                $row = mysqli_fetch_assoc($res);
            }
            return $row;
        }
    }

    public function updateOne($userId, $login, $pass, $name, $role, $phone, $email)
    {
        $query = "
    UPDATE `users`
    SET 
    `login`= $login, 
    `pass`= $pass, 
    `name`= $name, 
    `role`= $role, 
    `phone`= $phone, 
    `email`= $email
    WHERE id= $userId;
    ";

    $res = mysqli_query($this->connection, $query);

    $query = "
    SELECT *
    FROM `users`
    WHERE id = $userId AND 
    `login`= $login AND 
    `pass`= $pass AND
    `name`= $name AND 
    `role`= $role AND
    `phone`= $phone AND
    `email`= $email;
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

    public function deleteOne($userId)
    {
        // Получаем строку для возврата
        $query = "
        SELECT * 
        FROM `users` 
        WHERE id= $userId;
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

        $query = "
        DELETE FROM `users` 
        WHERE id= $userId;
        ";

        $res = mysqli_query($this->connection, $query);
        
        return $row;
    }
}

$usersServer = new usersServer($connection);
