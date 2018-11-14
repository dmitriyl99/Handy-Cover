<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 19.10.2018
 * Time: 17:47
 */

class Controller_AdminProduct extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Product();
    }

    public function action_createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $uploadDirectory = PRODUCT_IMAGE_UPLOAD_DIR;
            $returnUrl = $_POST['returnUrl'];
            $productName = $_POST['productName'];
            $productDescription = $_POST['productDescription'];
            $categoryId = $_POST['categoryId'];
            $productSizes = $_POST['productSizes'];
            $productMaterial = $_POST['productMaterial'];
            $productCatalogImage = '';
            $images = array();
            if (!empty($_FILES['productCatalogImage']['name']) && $_FILES['productCatalogImage']['size'] > 0) {
                $productCatalogImage = $uploadDirectory . basename($_FILES['productCatalogImage']['name']);
                move_uploaded_file($_FILES['productCatalogImage']['tmp_name'], $productCatalogImage);
                $productCatalogImage = substr_replace($productCatalogImage, '/', 0, 0);
            }
            if (is_array($_FILES['productImage']['name'])) {
                for ($i = 0; $i < count($_FILES['productImage']['name']); $i++) {
                    $file = '';
                    if (!empty($_FILES['productImage']['name'][$i]) && $_FILES['productImage']['size'][$i] > 0) {
                        $file = $uploadDirectory . basename($_FILES['productImage']['name'][$i]);
                        move_uploaded_file($_FILES['productImage']['tmp_name'][$i], $file);
                        $file = substr_replace($file, '/', 0, 0);
                    }
                    array_push($images, $file);
                }
            } else {
                if (!empty($_FILES['productImage']['name']) && $_FILES['productImage']['size'] > 0)
                {
                    $file = $uploadDirectory . basename($_FILES['productImage']['name']);
                    move_uploaded_file($_FILES['productImage']['tmp_name'], $file);
                    $file = substr_replace($file, '/', 0, 0);
                    array_push($images, $file);
                }
            }
            $colors = $_POST['color'];
            $prices = $_POST['price'];
            $result = $this->model->createProduct($productName, $productCatalogImage, $productDescription,
                $productMaterial, $productSizes, $categoryId, $images, $colors, $prices);
            if ($result)
                header("Location:$returnUrl");
        }
        else {
            $categoryId = $_GET['categoryId'];
            $returnUrl = $_GET['returnUrl'];
            $this->adminBaseViewModel = new AdminCreateProductViewModel();
            $categories = $this->model->getCategories();
            $this->adminBaseViewModel->setCategories($categories);
            $this->adminBaseViewModel->setCategoryId($categoryId);
            $this->adminBaseViewModel->setReturnUrl($returnUrl);
            $this->adminBaseViewModel->setUserName($_SESSION['userName']);
            $this->adminBaseViewModel->setPage(CATALOG_PAGE);
            $this->adminBaseViewModel->setTitle('Добавить товар');
            $this->view->generate('admin/createProduct_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }

    public function action_editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $returnUrl = $_POST['returnUrl'];
            $productId = $_POST['productId'];
            $productName = $_POST['productName'];
            $productDescription = $_POST['productDescription'];
            $categoryId = $_POST['categoryId'];
            $productSizes = $_POST['productSizes'];
            $productMaterial = $_POST['productMaterial'];
            $productImageIds = $_POST['productImageId'];
            $colors = $_POST['color'];
            $prices = $_POST['price'];
            $deletedProductImagesIds = $_POST['deletedProductImageId'];
            $newColors = $_POST['newColor'];
            $newPrices = $_POST['newPrice'];
            $productCatalogImage = $this->getImage('productCatalogImage');
            $images = $this->getImages('productImage');
            $newProductImageImages = $this->getImages('newProductImage');
            $newProductImages = null;
            if (!is_null($newColors)) {
                $newProductImages = array();
                for ($i = 0; $i < count($newColors); $i++) {
                    $newProductImage = new ImageProduct();
                    $newProductImage->setImage($newProductImageImages[$i]);
                    $newProductImage->setPrice($newPrices[$i]);
                    $newProductImage->setColor($newColors[$i]);
                    $newProductImage->setProductId($productId);
                    array_push($newProductImages, $newProductImage);
                }
            }
            $productImages = array();
            for ($i = 0; $i < count($images); $i++)
            {
                $image = $images[$i];
                $imageName = basename($image);
                $key = array_search($imageName, $_FILES['productImage']['name']);
                $productImage = new ImageProduct();
                $productImage->setImage($image);
                $productImage->setPrice($prices[$key]);
                $productImage->setColor($colors[$key]);
                $productImage->setId($productImageIds[$key]);
                $productImage->setProductId($productId);
                array_push($productImages, $productImage);
            }
            $result = $this->model->updateProduct($productId, $productName, $productCatalogImage, $productDescription,
                $productMaterial, $productSizes, $categoryId, $productImages, $newProductImages, $deletedProductImagesIds);
            if ($result)
                header("Location:$returnUrl");

        } else
        {
            $productId = $_GET['id'];
            $returnUrl = $_GET['returnUrl'];
            $product = $this->model->getProductById($productId);
            $categories = $this->model->getCategories();
            $this->adminBaseViewModel = new AdminEditProductViewModel();
            $this->adminBaseViewModel->setTitle($product->getName());
            $this->adminBaseViewModel->setPage(CATALOG_PAGE);
            $this->adminBaseViewModel->setUserName($_SESSION['userName']);
            $this->adminBaseViewModel->setProduct($product);
            $this->adminBaseViewModel->setCategories($categories);
            $this->adminBaseViewModel->setReturnUrl($returnUrl);
            $this->view->generate('admin/editProduct_view.php', 'admin/template_view.php', $this->adminBaseViewModel);
        }
    }

    public function action_removeProduct()
    {
        $productId = $_GET['id'];
        $returnUrl = $_GET['returnUrl'];
        $this->model->removeProduct($productId);
        header("Location:$returnUrl");
    }

    private function getImages($arrayName) {
        $uploadDirectory = PRODUCT_IMAGE_UPLOAD_DIR;
        $images = array();
        if (is_array($_FILES[$arrayName]['name'])) {
            for ($i = 0; $i < count($_FILES[$arrayName]['name']); $i++) {
                $file = '';
                if (!empty($_FILES[$arrayName]['name'][$i]) && $_FILES[$arrayName]['size'][$i] > 0) {
                    $file = $uploadDirectory . basename($_FILES[$arrayName]['name'][$i]);
                    move_uploaded_file($_FILES[$arrayName]['tmp_name'][$i], $file);
                    $file = substr_replace($file, '/', 0, 0);
                    array_push($images, $file);
                }
            }
        } else {
            if (!empty($_FILES[$arrayName]['name']) && $_FILES[$arrayName]['size'] > 0)
            {
                $file = $uploadDirectory . basename($_FILES[$arrayName]['name']);
                move_uploaded_file($_FILES[$arrayName]['tmp_name'], $file);
                $file = substr_replace($file, '/', 0, 0);
                array_push($images, $file);
            }
        }
        return $images;
    }

    private function getImage($arrayName) {
        $file = '';
        $uploadDirectory = PRODUCT_IMAGE_UPLOAD_DIR;
        if ($_FILES[$arrayName]['error'] === 4) {
            $file = $_POST[$arrayName.'Buff'];
            return $file;
        }
        if (!empty($_FILES[$arrayName]['name']) && $_FILES[$arrayName]['size'] > 0) {
            $file = $uploadDirectory . basename($_FILES[$arrayName]['name']);
            if (!file_exists($file))
                move_uploaded_file($_FILES[$arrayName]['tmp_name'], $file);
            $file = substr_replace($file, '/', 0, 0);
        }
        return $file;
    }
}