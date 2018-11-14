<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 20.10.2018
 * Time: 13:13
 */

class Controller_AdminVacancies extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Vacancies();
    }

    public function action_index()
    {
        $this->adminBaseViewModel = new AdminVacanciesViewModel();
        $vacancis = $this->model->getVacancies();
        $this->adminBaseViewModel->setTitle('Вакансии');
        $this->adminBaseViewModel->setPage(VACANCIES_PAGE);
        $this->adminBaseViewModel->setUserName($_SESSION['userName']);
        $this->adminBaseViewModel->setVacancies($vacancis);
        $this->view->generate('admin/vacancies_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
    }

    public function action_createVacancy()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $name = $_POST['vacancyName'];
            $demands = $_POST['vacancyDemands'];
            $this->model->createVacancy($name, $demands);
            header("Location:/adminvacancies/");
        }
        else {
            $this->adminBaseViewModel->setPage(VACANCIES_PAGE);
            $this->adminBaseViewModel->setTitle('Открыть вакансию');
            $this->view->generate('admin/createVacancy_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }

    public function action_editVacancy()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = $_POST['vacancyId'];
            $name = $_POST['vacancyName'];
            $demands = $_POST['vacancyDemands'];
            $result = $this->model->updateVacancy($id, $name, $demands);
            if ($result) header('Location:/adminvacancies');
        } else {
            $this->adminBaseViewModel = new AdminVacancyViewModel();
            $vacancyId = $_GET['id'];
            $vacancy = $this->model->getVacancyById($vacancyId);
            $this->adminBaseViewModel->setTitle($vacancy->getName());
            $this->adminBaseViewModel->setPage(VACANCIES_PAGE);
            $this->adminBaseViewModel->setUserName($_SESSION['userName']);
            $this->adminBaseViewModel->setVacancy($vacancy);
            $this->view->generate('admin/editVacancy_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }

    public function action_removeVacancy()
    {

    }
}