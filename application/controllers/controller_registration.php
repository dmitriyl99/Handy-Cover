<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 20.10.2018
 * Time: 17:30
 */

class Controller_Registration extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Registration();
        $this->view = new View();
    }

    public function action_index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $login = $_POST['email'];
            $password = $_POST['password'];
            $this->model->saveAdminUser($login, $password);
            header('Location: /admin/login');
        }
        else
        {
            $this->view->generate('admin/registration_view.html');
        }
    }
}