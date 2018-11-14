<h2>Добавить товар</h2>
<a href="<?php echo $data->getReturnUrl()?>" class='align-middle mb-3'><i class='fas fa-level-up-alt mr-1'></i>Вернуться</a>
<form method="post" enctype="multipart/form-data" class="mt-3 mb-4">
    <?php
    $returnUrl = $data->getReturnUrl();
    echo "<input type='hidden' name='returnUrl' value='$returnUrl'>";
    ?>
    <div class="form-group">
        <label for="productName">Название товара</label>
        <input type="text" name="productName" class="form-control" id="productName" placeholder="Введите название товара">
    </div>
    <div class="form-group">
        <label for="productDescription">Описание товара</label>
        <textarea name="productDescription" id="productDescription" class="form-control" placeholder="Введите описание товара"></textarea>
    </div>
    <div class="form-group">
        <label for="categoryId">Категория</label>
        <select name="categoryId" id="categoryId" class="custom-select">
            <?php
            $categories = $data->getCategories();
            $categoryId = $data->getCategoryId();
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
        <input type="text" name="productSizes" id="productSizes" class="form-control" placeholder="Перечислите размеры изделия через запятую">
    </div>
    <div class="form-group">
        <label for="productMaterial">Материал изделия</label>
        <input type="text" name="productMaterial" id="productMaterial" class="form-control" placeholder="Введите материал изделия">
    </div>
    <div class="form-group custom-file">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        <input type="file" name="productCatalogImage" id="productCatalogImage" class="custom-file-input">
        <label for="productCatalogImage" class="custom-file-label">Выберите изображение, с которым товар будет отображаться в каталоге</label>
    </div>
    <h5>Фотографии, цвета, цены</h5>
    <div class="photos-colors-prices-items clearfix">
        <div id="photosColorsPrices">
        </div>
        <button type="button" class="btn btn-primary float-right" id="addPcPItemButton">Добавить </button>
    </div>
    <input type="submit" class="btn btn-success" value="Сохранить">
</form>