<?php
require_once ('../api/bd.php');

class techniqueService 
{
  protected $connection;
  
  function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function getAll()
  {
    $query = "
    SELECT * 
    FROM `technic`
    ";

    $res = mysqli_query($this->connection, $query);

    $technique = [];

    if ($res->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($technique, $row);
        }
    }

    return $technique;
  }

  public function getOne($technicId)
  {
      $query = "
      SELECT * FROM `technic` 
      WHERE id= $technicId;
      ";

      $res = mysqli_query($this->connection, $query);

      $technique = [];

      if ($res->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
              array_push($technique, $row);
          }
      }
      return $technique;
  }
  public function addOne($technic,$typetechnic, $color, $brand, $header, $description, $cost, $imgSrc)
  {
      $query = "
          SELECT * 
          FROM `technic`
          WHERE 
          `technic`= $technic AND
          `typeTechnic` = $typetechnic AND
          `color` = $color AND
          `brand` = $brand AND
          `header` = $header AND
          `description` = $description AND
          `cost` = $cost AND
          `imgSrc` = $imgSrc
          ";

      $res = mysqli_query($this->connection, $query);

      if ($res->num_rows > 0) {
          return ['error' => "Ошибка! Такая вещь уже есть в магазине!"];
      }


      echo "$technic, $typetechnic, $color, $brand, $header, $description, $cost,  $imgSrc";
      $query = "
      INSERT INTO `technic`(`technic`, `typeTechnic`, `color`, `brand`, `header`, `description`, `cost`, `imgSrc`) 
      VALUES ('$technic', '$typetechnic', '$color', '$brand', '$header', '$description', '$cost', '$imgSrc');
      ";

      $res = mysqli_query($this->connection, $query);
     

      if ($res == 1) {
          $query = "
          SELECT * 
          FROM `technic`
          WHERE 
          `technic`= $technic AND
          `typeTechnic` = $typetechnic AND
          `color` = $color AND
          `brand` = $brand AND
          `header` = $header AND
          `description` = $description AND
          `cost` = $cost AND
          `imgSrc` = $imgSrc
          ";

          $res = mysqli_query($this->connection, $query);

          $row = [];
          if ($res->num_rows > 0) {
              $row = mysqli_fetch_assoc($res);
          }
          echo "321";
          return $row;
      }
  }

  public function updateOne($technicId, $typetechnic, $color, $brand, $header, $description, $cost)
  {
      $query = "
      UPDATE `technic` 
      SET 
      `typeTechnic`= $typetechnic,  
      `color`= $color, 
      `brand`= $brand, 
      `header`= $header, 
      `description`= $description,
      `cost`= $cost,
      WHERE id= $technicId;
      ";

      $res = mysqli_query($this->connection, $query);

      $query = "
      SELECT *
      FROM `technic`
      WHERE 
      `id` = `$technicId` AND 
      `type`= $typetechnic AND
      `color`= $color AND
      `brand`= $brand AND
      `header`= $header AND
      `description`= $description AND
      `cost`= $cost
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

  public function deleteOne($technicId)
  {

      $query = "
      SELECT * 
      FROM `technic` 
      WHERE id= $technicId;
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
      DELETE FROM `technic` 
      WHERE id= $technicId;
      ";

      $res = mysqli_query($this->connection, $query);

      $query = "
      DELETE FROM `basketToCloth` 
      WHERE clothId= $technicId;
      ";

      $res = mysqli_query($this->connection, $query);

      $query = "
      DELETE FROM `favoriteToTechnic` 
      WHERE clothId= $technicId;
      ";

      $res = mysqli_query($this->connection, $query);

      // Удаляем из заказов
      $query = "
      DELETE FROM `ordersToTechnic` 
      WHERE clothId= $technicId;
      ";

      $res = mysqli_query($this->connection, $query);

      return $row;
  }
}

$techniqueService = new techniqueService($connection);

