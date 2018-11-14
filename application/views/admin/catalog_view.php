<h4>Каталог товаров Handy Cover</h4>
<?php
$currentUrl = $_SERVER['REQUEST_URI'];
if ($data instanceof AdminParentCatalogViewModel) {
    $parentId = $data->getParentCategory()->getId();
    $catalogName = $data->getParentCategory()->getName();
    echo
    "
        <h5>$catalogName</h5>
        <div class='d-flex justify-content-between mt-3'>
            <div>
                <a href='/admincatalog' class='align-middle'><i class='fas fa-level-up-alt mr-1'></i>На уровень выше</a>
            </div>
            <div>
                <a href='/admincatalog/createCategory?parentId=$parentId&returnUrl=$currentUrl' class='btn btn-primary'>Создать подкатегорию</a>
            </div>
        </div>
    ";
} elseif ($data instanceof AdminSubCatalogViewModel) {
    $categoryName = $data->getCategory()->getName();
    $parentCategoryName = $data->getParentCategory()->getName();
    $parentCategoryId = $data->getParentCategory()->getId();
    $categoryId = $data->getCategory()->getId();
    echo
    "
       <span class='h5'>$parentCategoryName</span>
       <i class=\"fas fa-chevron-right mx-4\"></i>
       <span class='h5'>$categoryName</span>
       <div class='d-flex justify-content-between mt-3'>
            <div>
                <a href='/admincatalog?id=$parentCategoryId'><i class='fas fa-level-up-alt mr-1'></i>На уровень выше</a>
            </div>
            <div>
                <a href='/adminproduct/createProduct?categoryId=$categoryId&returnUrl=$currentUrl' class='btn btn-primary'>Добавить товар</a>
            </div>
        </div>
    ";
}

?>

<table class="table mt-4 table-hover table-bordered">
    <thead class="thead-light">
        <tr>
            <th class="text-center">Название</th>
            <th class="text-center">Действия</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if ($data instanceof AdminCatalogViewModel)
    {
        $categories = $data->getCategories();
        foreach ($categories as $category) {
            $categoryName = $category->getName();
            $categoryId = $category->getId();
            echo
            "
                <tr>
                    <td>$categoryName</td>
                    <td>
                        <a href='/admincatalog?id=$categoryId' class='text-center d-block'><i class='fas fa-pencil-alt mr-1'></i>Изменить</a>
                    </td>
                </tr>
            ";
        }
    }
    elseif ($data instanceof AdminParentCatalogViewModel)
    {
        $subCategories = $data->getSubCategories();
        foreach ($subCategories as $subCategory) {
            $categoryName = $subCategory->getName();
            $categoryId = $subCategory->getId();
            echo
            "
                <tr>
                    <td class='w-50'>$categoryName</td>
                    <td>
                        <div class='row'>
                            <div class='col-4'>
                                <a href='/admincatalog?id=$categoryId' class='d-block text-center text-secondary'><i class=\"far fa-eye mr-1\"></i>Посмотреть товары</a>
                            </div>
                            <div class='col-4'>
                                <a href='/admincatalog/editCategory?id=$categoryId&returnUrl=$currentUrl' class='d-block text-center'><i class='fas fa-pencil-alt mr-1'></i>Изменить</a>
                            </div>
                            <div class='col-4'>
                                <a href='/admincatalog/removeCategory?id=$categoryId&returnUrl=$currentUrl' data-modal-text='категорию $categoryName' class='d-block text-center text-danger catalogDeleteButton'><i class='fas fa-trash mr-1'></i>Удалить</a>
                            </div>
                        </div>
                    </td>
                </tr>
            ";
        }
    }
    elseif ($data instanceof AdminSubCatalogViewModel)
    {
        $products = $data->getProducts();
        $categoryId = $data->getCategory()->getId();
        foreach ($products as $product) {
            $productName = $product->getName();
            $productId = $product->getId();
            echo 
            "
                <tr>
                    <td class='w-50'>$productName</td>
                    <td>
                    <div class='row'>
                    <div class='col-6'><a href='/adminproduct/editProduct?id=$productId&returnUrl=$currentUrl' class='d-block text-center'><i class='fas fa-pencil-alt mr-1'></i>Изменить</a></div>
                    <div class='col-6'><a href='/adminproduct/removeProduct?id=$productId&returnUrl=$currentUrl' data-modal-text='товар $productName' class='d-block text-center text-danger catalogDeleteButton'><i class='fas fa-trash mr-1'></i>Удалить</a></div>
                    </div>
                    </td>
                </tr>
            ";
        }
    }
    ?>
    </tbody>
</table>

<div class="modal fade" id="removeDialog" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Подвердите свои действия</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить <span id="modalTarget"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="noModalButton" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                <a type="button" id="yesModalButton" class="btn btn-danger">Да</a>
            </div>
        </div>
    </div>
</div>