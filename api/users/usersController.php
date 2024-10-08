<?php
require_once ('./api/users/usersServer.php');

class usersController
{
    protected $techniqueService;

    function __construct($userService)
    {
        $this->techniqueService = $userService;
    }

    public function getAll()
    {
        $response = $this->techniqueService->getAll();
        return $response;
    }

    public function getOne($userId)
    {
        $response = $this->techniqueService->getOne($userId);
        return $response;
    }

    public function addOne($login, $pass, $name,$role, $phone, $email)
    {
        $response = $this->techniqueService->addOne($login, $pass, $name,$role, $phone, $email);
        return $response;
    }

    public function updatwOne($userId,$login, $pass, $name, $role, $phone, $email)
    {
        $response = $this->techniqueService->updateOne($userId,$login, $pass, $name, $role, $phone, $email);
        return $response;
    }

    public function deleteOne($id)
    {
        $response = $this->techniqueService->deleteOne($id);
        return $response;
    }
}

$usersController = new usersController($usersServer);