<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 20.10.2018
 * Time: 13:10
 */

class Controller_AdminContacts extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Contacts();
    }

    public function action_index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $address = $_POST['address'];
            $email = $_POST['email'];
            $deletedPhoneIds = $_POST['deletedPhoneIds'];
            $phoneIds = $_POST['phoneIds'];
            $phones = $_POST['phones'];
            $newPhones = $_POST['newPhones'];
            $socialLinksKeys = $_POST['socialLinksKeys'];
            $socialLinks = $_POST['socialLinks'];
            $socialLinksKeyArray = array();
            for ($i = 0; $i < count($socialLinksKeys); $i++)
            {
                $key = $socialLinksKeys[$i];
                $socialLink = $socialLinks[$i];
                $socialLinksKeyArray[$key] = $socialLink;
            }
            $phonesObjects = array();
            for ($i = 0; $i < count($phoneIds); $i++)
            {
                $phone = new Phone();
                $phone->setId($phoneIds[$i]);
                $phone->setPhoneNumber($phones[$i]);
                array_push($phonesObjects, $phone);
            }
            $this->model->updateSocialLinks($socialLinksKeyArray);
            $this->model->updatePhones($phonesObjects, $newPhones, $deletedPhoneIds);
            $this->model->updateAddress($address);
            $this->model->updateEmail($email);
            header('Location:/admincontacts');
        } else {
            $this->adminBaseViewModel = new AdminContactsViewModel();
            $this->adminBaseViewModel->setUserName($_SESSION['userName']);
            $this->adminBaseViewModel->setPage(CONTACTS_PAGE);
            $this->adminBaseViewModel->setTitle('Контакты');
            $this->adminBaseViewModel->setAddress($this->model->getAddress());
            $this->adminBaseViewModel->setPhones($this->model->getPhones());
            $this->adminBaseViewModel->setSocialLinks($this->model->getSocialLinks());
            $this->adminBaseViewModel->setEmail($this->model->getEmail());
            $this->view->generate('admin/contacts_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }
}