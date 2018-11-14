<?php 
    class Controller_Catalog extends Controller
    {
        public function __construct()
        {
            $this->model = new Model_Catalog();
            $this->view = new View();
        }

        public function action_index()
        {
            $catalogViewModel = null;
            if (isset($_GET['id']))
            {
                $category = $this->model->getCategoryById($_GET['id']);
                if ($category->isSubCategory())
                {
                    $catalogViewModel = new SubCatalogPageViewModel();
                    $catalogViewModel->setCategory($category);
                    $parentCategory = $this->model->getCategoryById($category->getParentId());
                    $catalogViewModel->setParentCategory($parentCategory);
                    $catalogViewModel->setTitle($category->getName());
                    $products = $this->model->getProductsByCatalogId($category->getId());
                    $catalogViewModel->setProducts($products);
                }
                else
                {
                    $catalogViewModel = new ParentCategoryCatalogPageViewModel();
                    $catalogViewModel->setTitle($category->getName());
                    $catalogViewModel->setParentCategory($category);
                    $subCategories = $this->model->getSubCategoriesByParentId($category->getId());
                    $catalogViewModel->setSubCategories($subCategories);
                }
                $catalogViewModel->setContacts($this->model->getContacts());
                $this->view->generate("catalog_view.php", "template_view.php", $catalogViewModel);
            } else
            {
                $categories = $this->model->get_data();
                $catalogViewModel = new CatalogPageViewModel();
                $catalogViewModel->setTitle("Каталог");
                $catalogViewModel->setCategories($categories);
                $catalogViewModel->setContacts($this->model->getContacts());
                $this->view->generate("catalog_view.php", "template_view.php", $catalogViewModel);
            }
        }
    }