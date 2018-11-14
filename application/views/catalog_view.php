<div class="catalog-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="/catalog/">Каталог</a></li>
                <?php
                    if ($data instanceof ParentCategoryCatalogPageViewModel)
                    {
                        $categoryName = $data->getParentCategory()->getName();
                        echo "<li class=\"breadcrumb-item\"><a href='#!'>$categoryName</a>";
                    } elseif ($data instanceof SubCatalogPageViewModel)
                    {
                        $parentCategory = $data->getParentCategory();
                        $subCategory = $data->getCategory();
                        $parentCategoryId = $parentCategory->getId();
                        $parentCategoryName = $parentCategory->getName();
                        $subCategoryName = $subCategory->getName();
                        echo
                        "
                            <li class='breadcrumb-item'><a href='/catalog?id=$parentCategoryId'>$parentCategoryName</a></li>
                            <li class='breadcrumb-item'><a href='#!'>$subCategoryName</a></li>  
                        ";
                    }
                ?>
            </ol>
        </nav>
        <h3 class="display-4 page-header">Каталог товаров Handy Cover</h3>
        <div class="catalog row">
            <?php
                if ($data instanceof CatalogPageViewModel)
                {
                    $categories = $data->getCategories();
                    foreach ($categories as $category)
                    {
                        $categoryId = $category->getId();
                        $categoryName = $category->getName();
                        $categoryImage = $category->getImage();
                        echo
                        "
                            <div class='catalog-item col-md-4 col-sm-12'>
                            <div class='card shadow'>
                                <div class='card-image-top'><img src='$categoryImage' class='img-fluid' alt='$categoryName Handy Cover'></div>
                                <div class='card-body'>
                                    <h5 class='card-title'>$categoryName</h5>
                                </div>
                                <div class='card-footer'><a href='/catalog?id=$categoryId' class='btn btn-primary'>Подробнее</a></div>
                                </div>
                            </div>
                        ";
                    }
                }
                elseif ($data instanceof ParentCategoryCatalogPageViewModel)
                {
                    $subCategories = $data->getSubCategories();
                    foreach ($subCategories as $subCategory)
                    {
                        $subCategoryId = $subCategory->getId();
                        $subCategoryName = $subCategory->getName();
                        $subCategoryImage = $subCategory->getImage();
                        echo
                        "
                            <div class='catalog-item-category col-md-4 col-sm-12'>
                            <div class='card shadow'>";
                                if (!empty($subCategoryImage)) echo "<div class='card-image-top'><img src='$subCategoryImage' alt='$subCategoryName Handy Cover' class='img-fluid'></div>";
                                echo "<div class='card-body'>
                                    <h5 class='card-title'>$subCategoryName</h5>
                                    
                                </div>
                                <div class='card-footer'><a href='/catalog?id=$subCategoryId' class='btn btn-primary'>Подробнее</a></div>
                                </div>
                            </div>
                        ";
                    }
                }
                elseif ($data instanceof SubCatalogPageViewModel)
                {
                    $products = $data->getProducts();
                    foreach ($products as $product)
                    {
                        $productId = $product->getId();
                        $productName = $product->getName();
                        $productImage = $product->getImage();
                        echo
                        "
                            <div class='catalog-item-product col-md-4 col-sm-12'>
                            <div class='card shadow'>";
                                if (!empty($productImage)) echo "<div class='card-image-top'><img src='$productImage' alt='$productName Handy Cover' class='img-fluid'></div>";
                                echo "<div class='card-body'>
                                    <h5 class='card-title'>$productName</h5>
                                </div>
                                <div class='card-footer'>
                                    <a href='/product?id=$productId' class='btn btn-primary'>Подробнее</a>
                                </div>
                                </div>
                            </div>
                        ";
                    }
                }
            ?>
        </div>
    </div>
</div>