<?php
require_once ('../api/technique/techniqueService.php');

class techniqueController 
{
    protected $techniqueService;

    function __construct($techniqueService)
    {
        $this->techniqueService = $techniqueService;
    }

    public function getAll()
    {
        $response = $this->techniqueService->getAll();
        return $response;
    }

    public function getOne($technicId)
    {
        $response = $this->techniqueService->getOne($technicId);
        return $response;
    }

    public function addOne($technic, $typeTechnic, $color, $brand, $header, $description, $cost, $imgSrc)
    {
        $response = $this->techniqueService->addOne($technic, $typeTechnic, $color, $brand, $header, $description, $cost, $imgSrc);
        return $response;
    }
    // Обновить один
    public function updateOne($technic, $typeTechnic, $color, $brand, $header, $description, $cost)
    {
        $response = $this->techniqueService->updateOne($technic, $typeTechnic, $color, $brand, $header, $description, $cost);
        return $response;
    }
    // Удалить один
    public function deleteOne($id)
    {
        $response = $this->techniqueService->deleteOne($id);
        return $response;
    }
}
$techniqueController = new techniqueController($techniqueService);