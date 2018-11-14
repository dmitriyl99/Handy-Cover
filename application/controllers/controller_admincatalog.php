<?php

class Controller_AdminCatalog extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Catalog();
    }

    public function action_index()
    {
        if (isset($_GET['id']))
        {
            $categoryId = $_GET['id'];
            $category = $this->model->getCategoryById($categoryId);
            if ($category->isSubCategory())
            {
                $this->adminBaseViewModel = new AdminSubCatalogViewModel();
                $this->adminBaseViewModel->setCategory($category);
                $parentCategory = $this->model->getCategoryById($category->getParentId());
                $this->adminBaseViewModel->setParentCategory($parentCategory);
                $products = $this->model->getProductsByCatalogId($category->getId());
                $this->adminBaseViewModel->setProducts($products);
            }
            else
            {
                $this->adminBaseViewModel = new AdminParentCatalogViewModel();
                $this->adminBaseViewModel->setParentCategory($category);
                $subCategories = $this->model->getSubCategoriesByParentId($category->getId());
                $this->adminBaseViewModel->setSubCategories($subCategories);
            }
            $this->adminBaseViewModel->setTitle($category->getName());
        }
        else
        {
            $this->adminBaseViewModel = new AdminCatalogViewModel();
            $categories = $this->model->get_data();
            $this->adminBaseViewModel->setCategories($categories);
            $this->adminBaseViewModel->setTitle('Каталог');
        }
        $this->adminBaseViewModel->setUserName($_SESSION['userName']);
        $this->adminBaseViewModel->setPage(CATALOG_PAGE);
        $this->view->generate('admin/catalog_view.php', 'admin/template_view.php', $this->adminBaseViewModel);

    }

    public function action_createCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $returnUrl = $_POST['returnUrl'];
            $categoryName = $_POST['categoryName'];
            $parentId = $_POST['parentCategoryId'];
            $file = $this->getImage('categoryImage');
            if ($this->model->createCategory($categoryName, $file, $parentId))
                header("Location:$returnUrl");

        } else
        {
            $this->adminBaseViewModel = new AdminCreateCategoryViewModel();
            $this->adminBaseViewModel->setPage(CATALOG_PAGE);
            $this->adminBaseViewModel->setTitle('Создать подкатегорию');
            $this->adminBaseViewModel->setUserName($_SESSION['userName']);
            $categories = $this->model->get_data();
            $this->adminBaseViewModel->setParentCategories($categories);
            $returnUrl = $_GET['returnUrl'];
            $parentId = $_GET['parentId'];
            $this->adminBaseViewModel->setReturnUrl($returnUrl);
            $this->adminBaseViewModel->setParentcategoryId($parentId);
            $this->view->generate('admin/createCategory.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }

    public function action_editCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $categoryId = $_POST['categoryId'];
            $returnUrl = $_POST['returnUrl'];
            $categoryName = $_POST['categoryName'];
            $parentId = $_POST['parentCategoryId'];
            $file = $this->getImage('categoryImage');
            if ($this->model->updateCategory($categoryId, $categoryName, $file, $parentId))
                header("Location:$returnUrl");
        }
        else
        {
            $this->adminBaseViewModel = new AdminEditCategoryViewModel();
            $categoryId = $_GET['id'];
            $returnUrl = $_GET['returnUrl'];
            $category = $this->model->getCategoryById($categoryId);
            $subCategories = $this->model->get_data();
            $this->adminBaseViewModel->setId($categoryId);
            $this->adminBaseViewModel->setName($category->getName());
            $this->adminBaseViewModel->setCategories($subCategories);
            $this->adminBaseViewModel->setReturnUrl($returnUrl);
            $this->adminBaseViewModel->setParentId($category->getParentId());
            $this->adminBaseViewModel->setImage($category->getImage());
            $this->adminBaseViewModel->setUserName($_SESSION['userName']);
            $this->adminBaseViewModel->setTitle($category->getName());
            $this->adminBaseViewModel->setPage(CATALOG_PAGE);
            $this->view->generate('admin/editCategory_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }

    public function action_removeCategory()
    {
        $categoryId = $_GET['id'];
        $returnUrl = $_GET['returnUrl'];
        $this->model->deleteCategory($categoryId);
        header("Location:$returnUrl");
    }

    private function getImage($arrayName) {
        $file = '';
        $uploadDirectory = CATEGORY_IMAGE_UPLOAD_DIR;
        if (!empty($_FILES[$arrayName]['name']) && $_FILES[$arrayName]['size'] > 0) {
            $file = $uploadDirectory . basename($_FILES[$arrayName]['name']);
            if (!file_exists($file))
                move_uploaded_file($_FILES[$arrayName]['tmp_name'], $file);
            $file = substr_replace($file, '/', 0, 0);
        }
        return $file;
    }
}