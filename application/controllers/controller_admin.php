<?php
    class Controller_Admin extends Controller 
    {
        public function __construct()
        {
            $this->model = new Model_Admin();
            $this->view = new View();
        }

        public function action_index()
        {
            session_start();
            if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'])
            {
                $data = new AdminBaseViewModel();
                $data->setTitle("Административная панель");
                $data->setPage(DASHBOARD_PAGE);
                $userName = $_SESSION['userName'];
                $data->setUserName($userName);
                $this->view->generate('admin/admin_view.php', 'admin/template_view.php', $data);
            }
            else
            {
                header("Location: /admin/login");
            }
        }

        public function action_login()
        {
            session_start();
            if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'])
            {
                header('Location: /admin/');
            }
            $data = array();
            $data['loginStatus'] = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $login = strip_tags($_POST['email']);
                    $password = strip_tags($_POST['password']);
                    $user = $this->model->getAdminUser();
                    $password = $this->model->getPasswordHash($password);
                    if ($password == $user->getPassword() && $login == $user->getEmail()) {
                        $data['loginStatus'] = "access_granted";
                        $_SESSION['isAuth'] = true;
                        $_SESSION['userName'] = $login;
                        header("Location: /admin/");
                    } else
                        $data['loginStatus'] = "access_denied";
                }
            }

            $this->view->generate('admin/login_view.php', null, $data);
        }

        public function action_logout()
        {
            session_start();
            $_SESSION['isAuth'] = false;
            session_unset();
            session_destroy();
            header("Location: /admin/login");
        }
    }