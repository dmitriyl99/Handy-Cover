<?php
    class Model_Product extends Model
    {
        public function getProductById($id) : Product
        {
            $queryString = "SELECT * FROM products WHERE id = '$id'";
            $product = new Product();
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
            {
                $productRow = mysqli_fetch_row($result);
                $product->setId($productRow[0]);
                $product->setName($productRow[1]);
                $product->setCatalogImage($productRow[2]);
                $product->setDescription($productRow[3]);
                $product->setMaterial($productRow[4]);
                $product->setSizes($productRow[5]);
                $product->setCategoryId($productRow[6]);
                $productId = $productRow[0];
                $productImageQueryString = "SELECT * FROM product_images WHERE productId = '$productId'";
                $productImages = array();
                $productImagesResult = mysqli_query($this->databaseConnection, $productImageQueryString);
                if ($productImagesResult)
                {
                    while ($productImageRow = mysqli_fetch_row($productImagesResult))
                    {
                        $productImage = new ImageProduct();
                        $productImage->setId($productImageRow[0]);
                        $productImage->setImage($productImageRow[2]);
                        $productImage->setColor($productImageRow[1]);
                        $productImage->setPrice($productImageRow[3]);
                        $productImage->setProductId($productImageRow[4]);
                        array_push($productImages, $productImage);
                    }
                }
                $product->setProductImages($productImages);
            }
            return $product;
        }

        public function getCategories() : array
        {
            $queryParentString = "SELECT * FROM categories WHERE parent_id IS NULL";
            $parentResult = mysqli_query($this->databaseConnection, $queryParentString);
            $categories = array();
            while ($parentRow = mysqli_fetch_row($parentResult))
            {
                $parentCategory = new AdminParentCategory();
                $parentCategory->setName($parentRow[1]);
                $parentCategoryId = $parentRow[0];
                $subCategories = array();
                $querySubString = "SELECT * FROM categories WHERE parent_id = $parentCategoryId";
                $subResult = mysqli_query($this->databaseConnection, $querySubString);
                if ($subResult)
                    while ($subRow = mysqli_fetch_row($subResult))
                    {
                        $subCategory = new AdminSubCategory();
                        $subCategory->setName($subRow[1]);
                        $subCategory->setId($subRow[0]);
                        array_push($subCategories, $subCategory);
                    }
                $parentCategory->setSubCategories($subCategories);
                array_push($categories, $parentCategory);
            }
            return $categories;
        }

        public function createProduct($name, $catalogImage, $description, $material, $sizes,
                                      $categoryId, $images, $colors, $prices) : bool
        {
            $product = new Product();
            $product->setName($name);
            $product->setCatalogImage($catalogImage);
            $product->setDescription($description);
            $product->setMaterial($material);
            $product->setSizes($sizes);
            $product->setCategoryId($categoryId);
            $insertProductQueryString = "INSERT INTO `products`"
                ."(`name`, `catalog_image`, `description`, `material`, `sizes`, `categoryId`)"
                ."VALUES ('$name', '$catalogImage', '$description', '$material', '$sizes', '$categoryId')";
            $insertProductResult = mysqli_query($this->databaseConnection, $insertProductQueryString);
            if ($insertProductResult)
            {
                $productId = mysqli_insert_id($this->databaseConnection);
                $this->addProductImages($images, $colors, $prices, $productId);
                return true;
            }
            return false;
        }

        public function updateProduct($id, $name, $catalogImage, $description, $material, $sizes,
                                      $categoryId, $productImages,
                                      $addedProductImages = null, $deletedProductImagesIds = null) : bool
        {
            $updateProductQuery = "UPDATE `products` SET `name`='$name', `catalog_image`='$catalogImage', `description`='$description', "
                ."`material`='$material', `sizes`='$sizes', `categoryId`='$categoryId' WHERE id = '$id'";
            $updateProductResult = mysqli_query($this->databaseConnection, $updateProductQuery);
            if ($updateProductResult)
            {
                if (!is_null($addedProductImages) && count($addedProductImages) > 0)
                {
                    $addedImages = array();
                    $addedPrices = array();
                    $addedColors = array();
                    foreach ($addedProductImages as $productImage) {
                        array_push($addedImages, $productImage->getImage());
                        array_push($addedPrices, $productImage->getPrice());
                        array_push($addedColors, $productImage->getColor());
                    }
                    $this->addProductImages($addedImages, $addedColors, $addedPrices, $id);
                }
                if (!is_null($deletedProductImagesIds) && count($deletedProductImagesIds) > 0)
                {
                    $deleteProductImagesQuery = "DELETE FROM `product_images` WHERE `id` IN (";
                    for ($i = 0; $i < count($deletedProductImagesIds); $i++)
                    {
                        $productImageId = $deletedProductImagesIds[$i];
                        if ($i == 0)
                            $deleteProductImagesQuery .= "$productImageId";
                        else
                            $deleteProductImagesQuery .= ", $productImageId";
                    }
                    $deleteProductImagesQuery .= ");";
                    echo $deleteProductImagesQuery.'<br/>';
                    mysqli_query($this->databaseConnection, $deleteProductImagesQuery);
                }
                foreach ($productImages as $productImage)
                {
                    $id = $productImage->getId();
                    $image = $productImage->getImage();
                    $color = $productImage->getColor();
                    $price = $productImage->getPrice();
                    $updateProductImageQuery = "UPDATE `product_images` SET "
                        ."`image`='$image', `color`='$color', `price`='$price' WHERE `id` = '$id'";
                    mysqli_query($this->databaseConnection, $updateProductImageQuery);
                }
                return true;
            }
            return false;
        }

        public function removeProduct($productId) : bool
        {
            $queryString = "DELETE FROM `products` WHERE `id`=$productId";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            return false;
        }

        private function addProductImages($images, $colors, $prices, $productId)
        {
            $insertProductImagesQuery = "INSERT INTO `product_images`"
                ."(`image`, `color`, `price`, `productId`) VALUES ";
            for ($i = 0; $i < count($images); $i++)
            {
                $image = $images[$i];
                $color = $colors[$i];
                $price = $prices[$i];
                if ($i == 0)
                    $insertProductImagesQuery .= "('$image', '$color', '$price', '$productId')";
                else
                    $insertProductImagesQuery .= ", ('$image', '$color', '$price', '$productId')";
            }
            $insertProductImagesQuery .= ";";
            mysqli_query($this->databaseConnection, $insertProductImagesQuery);
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
    }