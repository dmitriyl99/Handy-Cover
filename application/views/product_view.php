<?php
    $product = $data->getProduct();
    $subCategory = $data->getSubCategory();
    $parentCategory = $data->getParentCategory();
?>

<div class="product-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="/catalog/">Каталог</a></li>
                <li class="breadcrumb-item"><a href="/catalog?id=<?php echo $parentCategory->getId();?>"><?php echo $parentCategory->getName();?></a></li>
                <li class="breadcrumb-item"><a href="/catalog?id=<?php echo $subCategory->getId();?>"><?php echo $subCategory->getName();?></a></li>
                <li class="breadcrumb-item"><a href="#!"><?php echo $product->getName()?></a></li>
            </ol>
        </nav>
        <h4 class="display-4 page-header">
            <?php echo $product->getName()?>
        </h4>
        <section class="product-information">
            <div id="productImages" style="display: none; visibility: collapse">
                <?php
                $productImages = $product->getProductImages();
                for ($i = 0; $i < count($productImages); $i++)
                {
                    $image = $productImages[$i]->getImage();
                    $price = $productImages[$i]->getPrice();
                    echo "<i data-image-number='$i'>$image</i>";
                    echo "<i data-price-number='$i'>$price</i>";
                }
                ?>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src="" alt="" id="productImg" class="img-fluid">
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="product-description">
                        <h4>Описание изделия</h4>
                        <p><?php echo $product->getDescription();?></p>
                    </div>
                    <div class="product-price">
                        <h4>Цена изделия</h4>
                        <p><span id="productPrice"></span><span> сум</span></p>
                    </div>
                    <div class="product-material">
                        <h4>Материал</h4>
                        <p><?php echo $product->getMaterial();?></p>
                    </div>
                    <div class="product-sizes">
                        <h4>Доступные размеры</h4>
                        <p><?php echo $product->getSizes();?></p>
                    </div>
                    <div class="product-colors">
                        <h4>Цвета изделия</h4>
                        <select name="productColors" id="productColors" class="custom-select">
                            <?php
                            $productImages = $product->getProductImages();
                            for ($i = 0; $i < count($productImages); $i++)
                            {
                                $color = $productImages[$i]->getColor();
                                echo "<option value='$i'";
                                if ($i === 0) echo ' selected="selected"';
                                echo ">$color</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>