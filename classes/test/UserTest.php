<?php
include 'classes/user/User.php';
include 'classes/user/UserDAO.php';

class UserTest
{
    private User $user;
    private UserDAO $userDAO;

    function __construct()
    {
        $this->user = new User([
            "name" => "Carlos",
            "surname" => "Pinilla",
            "email" => "test@gmail.com",
            "password" => "test123",
            "image" => "carlos.jpg"
        ]);
        $this->userDAO = new UserDAO();
    }

    function execSave()
    {
        $this->userDAO->save($this->user);
    }
}
