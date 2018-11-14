<h2>Редактирование товара "<?php echo $data->getProduct()->getName() ?>"</h2>
<a href="<?php echo $data->getReturnUrl()?>" class='align-middle mb-3'><i class='fas fa-level-up-alt mr-1'></i>Вернуться</a>
<form method="post" enctype="multipart/form-data" class="mt-3 mb-4" name="productForm">
    <?php
    $returnUrl = $data->getReturnUrl();
    $product = $data->getProduct();
    $productId = $product->getId();
    echo "<input type='hidden' name='returnUrl' value='$returnUrl'>";
    echo "<input type='hidden' name='productId' value='$productId'>";
    ?>
    <div class="form-group">
        <label for="productName">Название изделия</label>
        <input type="text" name="productName" id="productName" class="form-control" placeholder="Введите название товара" value="<?php echo $product->getName(); ?>">
    </div>
    <div class="form-group">
        <label for="productDescription">Описание изделия</label>
        <textarea name="productDescription" id="productDescription" class="form-control" placeholder="Введите описание изделия"><?php echo $product->getDescription(); ?></textarea>
    </div>
    <div class="form-group">
        <label for="categoryId">Категория</label>
        <select name="categoryId" id="categoryId" class="custom-select">
            <?php
            $categories = $data->getCategories();
            $categoryId = $product->getCategoryId();
            foreach ($categories as $category) {
                $subCategories = $category->getSubCategories();
                $categoryName = $category->getName();
                echo "<optgroup label='$categoryName'>";
                foreach ($subCategories as $subCategory) {
                    $subCategoryName = $subCategory->getName();
                    $subCategoryId = $subCategory->getId();
                    if ($categoryId === $subCategoryId)
                        echo "<option value='$subCategoryId' selected='selected'>$subCategoryName</option>";
                    else
                        echo "<option value='$subCategoryId'>$subCategoryName</option>";
                }
                echo '</optgroup>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="productSizes">Размеры</label>
        <input type="text" name="productSizes" id="productSizes" class="form-control" value="<?php echo $product->getSizes(); ?>" placeholder="Перечислите размеры изделия через запятую">
    </div>
    <div class="form-group">
        <label for="productMaterial">Материал изделия</label>
        <input type="text" name="productMaterial" id="productMaterial" class="form-control" value="<?php echo $product->getMaterial() ?>" placeholder="Введите материал изделия">
    </div>
    <div class="form-group custom-file">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        <input type="hidden" name="productCatalogImageBuff" value="<?php echo $product->getCatalogImage() ?>">
        <input type="file" name="productCatalogImage" id="productCatalogImage" class="custom-file-input" value="<?php echo $product->getCatalogImage() ?>">
        <label for="productCatalogImage" class="custom-file-label"><?php echo empty($product->getCatalogImage()) ? "Выберите изображение, с которым товар будет отображаться в каталоге" : $product->getCatalogImage(); ?></label>
    </div>
    <h5>Фотографии, цвета, цены</h5>
    <div class="photos-colors-prices-items clearfix">
        <div id="photosColorsPrices">
            <?php
            $productImages = $product->getProductImages();
            for ($i = 0; $i < count($productImages); $i++)
            {
                $productImage = $productImages[$i];
                $image = $productImage->getImage();
                $color = $productImage->getColor();
                $price = $productImage->getPrice();
                $productImageId = $productImage->getId();
                echo
                "
                    <div class='photos-colors-prices-item' data-number='$i'>
                        <div class='clearfix mb-3'><a href='#!' data-delete-number='$i' class='float-right delete-pcp-item text-danger'><i class='fas fa-trash mr-1'></i></a></div>
                        <div class='form-group custom-file'>
                            <input type='hidden' name='productImageId[]' value='$productImageId' >
                            <input type='hidden' name='MAX_FILE_SIZE' value='3000000'>
                            <input type='file' name='productImage[]' id='productImage$i' class='custom-file-input'>
                            <label for='productImage$i' class='custom-file-label'>$image</label>
                        </div>
                        <div class='form-group'>
                            <label for='color$i'>Цвет</label>
                            <input type='text' class='form-control' value='$color' name='color[]' id='color$i'>
                        </div>
                        <div class='form-group'>
                            <label for='price$i'>Цена</label>
                            <input type='text' class='form-control' value='$price' name='price[]' id='price$i'>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
        <button type="button" class="btn btn-primary float-right" id="addPcPItemButton">Добавить </button>
    </div>
    <input type="submit" class="btn btn-success" value="Сохранить">
</form>