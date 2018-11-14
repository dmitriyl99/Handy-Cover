<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 19.10.2018
 * Time: 13:42
 */

class Controller_services extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model();
    }

    public function action_index()
    {
        $data = new BaseViewModel();
        $data->setTitle("Услуги");
        $data->setContacts($this->model->getContacts());
        $this->view->generate("services_view.php", "template_view.php", $data);
    }

    public function action_curve()
    {
        $data = new BaseViewModel();
        $data->setTitle("Разработка лекал");
        $data->setContacts($this->model->getContacts());
        $this->view->generate("services_curve_view.php", "template_view.php", $data);
    }

    public function action_clothes()
    {
        $data = new BaseViewModel();
        $data->setTitle("Пошив одежды");
        $data->setContacts($this->model->getContacts());
        $this->view->generate("services_clothes_view.php", 'template_view.php', $data);
    }
}