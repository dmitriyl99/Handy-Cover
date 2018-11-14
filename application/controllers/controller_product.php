<?php 
    class Controller_Product extends Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->model = new Model_Product();
        }

        public function action_index()
        {
            $productId = $_GET['id'];
            $product = $this->model->getProductById($productId);
            $viewmodel = new ProductPageViewModel();
            $viewmodel->setTitle($product->getName());
            $viewmodel->setContacts($this->model->getContacts());
            $viewmodel->setProduct($product);
            $subCategory = $this->model->getCategoryById($product->getCategoryId());
            $parentCategory = $this->model->getCategoryById($subCategory->getParentId());
            $viewmodel->setParentCategory($parentCategory);
            $viewmodel->setSubCategory($subCategory);
            $this->view->generate('product_view.php', 'template_view.php', $viewmodel);
        }
    }