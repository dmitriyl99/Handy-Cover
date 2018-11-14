<?php
    class Controller_Main extends Controller 
    {

        function __construct() 
        {  
            $this->model = new Model_Main();
            $this->view = new View();
        }


        function action_index() 
        {
            $company_information = $this->model->get_data();

            $this->view->generate('main_view.php', 'template_view.php', $company_information);
        }

        function action_leave_review() 
        {
            if (isset($_POST['reviewName']) && isset($_POST['reviewMessage'])) 
            {
                $user_name = strip_tags($_POST['reviewName']);
                $review_text = strip_tags($_POST['reviewMessage']);
                $this->model->save_review($user_name, $review_text);
                header('Location:/', true);
            } else 
            {
                echo "Error";
            }
        }
    }