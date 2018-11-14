<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 19.10.2018
 * Time: 17:47
 */

class Controller_AdminReviews extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Reviews();
    }

    public function action_index()
    {
        $reviews = $this->model->getReviews();
        $this->adminBaseViewModel = new AdminReviewsViewModel();
        $this->adminBaseViewModel->setUserName($_SESSION['userName']);
        $this->adminBaseViewModel->setPage(REVIEWS_PAGE);
        $this->adminBaseViewModel->setTitle('Отзывы');
        $this->adminBaseViewModel->setReviews($reviews);
        $this->view->generate('admin/reviews_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
    }

    public function action_showReview()
    {
        $reviewId = $_GET['id'];
        $this->model->showReview($reviewId);
        header("Location:/adminreviews");
    }

    public function action_hideReview()
    {
        $reviewId = $_GET['id'];
        $this->model->hideReview($reviewId);
        header("Location:/adminreviews");
    }

    public function action_removeReview()
    {
        $reviewId = $_GET['id'];
        $this->model->removeReview($reviewId);
        header("Location:/adminreviews");
    }
}