<?php
    class Model_Catalog extends Model
    {
        public function get_data() : array
        {
            $query_string = "SELECT * FROM categories WHERE parent_id IS NULL";
            $categories_result = mysqli_query($this->databaseConnection, $query_string);
            $categories = array();
            if ($categories_result)
            {
                while($category = mysqli_fetch_row($categories_result))
                {
                    $category_object = new Category();
                    $category_object->setId($category[0]);
                    $category_object->setName($category[1]);
                    $category_object->setImage($category[2]);
                    array_push($categories, $category_object);
                }
            }
            return $categories;
        }

        public function getCategoryById($categoryId) : Category
        {
            $queryString = "SELECT * FROM categories WHERE id = $categoryId";
            $categoryResult = mysqli_query($this->databaseConnection, $queryString);
            $category = new Category();
            if ($categoryResult)
            {
                $categoryEntity = mysqli_fetch_row($categoryResult);
                $category = new Category();
                $category->setId($categoryEntity[0]);
                $category->setName($categoryEntity[1]);
                $category->setImage($categoryEntity[2]);
                $category->setParentId($categoryEntity[3]);
            }
            return $category;
        }

        public function getSubCategoriesByParentId($parentId) : array
        {
            $queryString = "SELECT * FROM categories WHERE parent_id = $parentId";
            $subCategoriesResult = mysqli_query($this->databaseConnection, $queryString);
            $subCategories = array();
            if ($subCategoriesResult)
            {
                while ($subCategoriesRow = mysqli_fetch_row($subCategoriesResult))
                {
                    $subCategory = new Category();
                    $subCategory->setId($subCategoriesRow[0]);
                    $subCategory->setName($subCategoriesRow[1]);
                    $subCategory->setImage($subCategoriesRow[2]);
                    array_push($subCategories, $subCategory);
                }
            }
            return $subCategories;
        }

        public function getProductsByCatalogId($catalogId) : array
        {
            $query_string = "SELECT * FROM products WHERE categoryId = $catalogId";
            $productsResult = mysqli_query($this->databaseConnection, $query_string);
            $products = array();
            if ($productsResult)
            {
                while ($productRow = mysqli_fetch_row($productsResult))
                {
                    $catalogProduct = new CatalogProduct();
                    $catalogProduct->setId($productRow[0]);
                    $catalogProduct->setName($productRow[1]);
                    $catalogProduct->setImage($productRow[2]);
                    array_push($products, $catalogProduct);
                }
            }
            return $products;
        }

        public function createCategory($name, $image, $parentId) : bool
        {
            $queryString = "INSERT INTO `categories`(`name`, `image`, `parent_id`) VALUES ('$name','$image', $parentId)";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            else
                return false;
        }

        public function updateCategory($id, $name, $image, $parentId) : bool
        {
            $queryString = "UPDATE categories SET name = '$name', image = '$image', parent_id = '$parentId' WHERE id = '$id'";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            else
                return false;
        }

        public function deleteCategory($id) : bool
        {
            $queryString = "DELETE FROM categories WHERE id = '$id'";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            return false;
        }
    }