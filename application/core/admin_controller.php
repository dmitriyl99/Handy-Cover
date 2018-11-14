<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 20.10.2018
 * Time: 9:40
 */

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();
        $this->adminBaseViewModel = new AdminBaseViewModel();
        $this->adminBaseViewModel->setUserName($_SESSION['userName']);
    }

    protected $adminBaseViewModel;

    protected function checkAuth()
    {
        session_start();
        if (!isset($_SESSION['isAuth']) && !$_SESSION['isAuth'])
            header('Location:/admin/login');
    }
}