<?php 
    class Controller_Contacts extends Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->model = new Model_Contacts();
        }

        public function action_index()
        {
            $viewModel = new ContactsPageViewModel();
            $contacts = $this->model->getContacts();
            $viewModel->setContacts($contacts);
            $viewModel->setEmail($this->model->getEmail());
            $viewModel->setPhones($this->model->getPhones());
            $viewModel->setAddress($this->model->getAddress());
            $viewModel->setTitle('Контакты');
            $this->view->generate('contacts_view.php', 'template_view.php', $viewModel);
        }
    }