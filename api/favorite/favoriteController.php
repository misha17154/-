<?php
require_once ('favoriteService.php');
class favoriteController
{
    protected $favoriteService;
    function __construct($favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }
    // Получить все
    public function getAll()
    {
        $response = $this->favoriteService->getAll();
        return $response;
    }
    // Получить один
    public function getOne($userId)
    {
        $response = $this->favoriteService->getOne($userId);
        return $response;
    }
    // Добавить один
    public function addOne($userId, $techniqueId)
    {
        $response = $this->favoriteService->addOne($userId, $techniqueId);
        return $response;
    }
    // Обновить один
    // public function updateOne($busketToClothId, $newCount)
    // {
    //     $response = $this->favoriteService->updateOne($busketToClothId, $newCount);
    //     return $response;
    // }
    // Удалить один
    public function deleteOne($userId, $techniqueId)
    {
        $response = $this->favoriteService->deleteOne($userId, $techniqueId);
        return $response;
    }
}

$usersController = new favoriteController($usersService);