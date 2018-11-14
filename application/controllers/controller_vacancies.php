<?php
    class Controller_Vacancies extends Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->model = new Model_Vacancies();
        }

        public function action_index()
        {
            $viewModel = new VacanciesPageViewModel();
            $viewModel->setContacts($this->model->getContacts());
            $viewModel->setTitle('Вакансии');
            $viewModel->setVacancies($this->model->getVacancies());
            $this->view->generate('vacancies_view.php', 'template_view.php', $viewModel);
        }
    }