<?php
require_once ('ordersService.php');
class ordersController
{
    protected $ordersService;
    function __construct($ordersService)
    {
        $this->ordersService = $ordersService;
    }
    // Получить все
    public function getAll()
    {
        $response = $this->ordersService->getAll();
        return $response;
    }
    // Получить один
    public function getOne($userId)
    {
        $response = $this->ordersService->getOne($userId);
        return $response;
    }
    // Добавить один
    public function addOne($userId, $orderId, $techniqueId, $count)
    {
        $response = $this->ordersService->addOne($userId, $orderId, $techniqueId, $count);
        return $response;
    }
    // Обновить один
    public function updateOne($ordersToTechnicid, $isCompleted)
    {
        $response = $this->ordersService->updateOne($ordersToTechnicid, $isCompleted);
        return $response;
    }
    // Удалить один
    public function deleteOne($orderId)
    {
        $response = $this->ordersService->deleteOne($orderId);
        return $response;
    }
}

$ordersController = new ordersController($ordersService);