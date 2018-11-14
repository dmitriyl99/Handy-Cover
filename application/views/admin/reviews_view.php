<h4>Отзывы</h4>
<div class="row">
    <?php
    $reviews = $data->getReviews();
    foreach ($reviews as $review) {
        $id = $review->getId();
        $userName = $review->getUserName();
        $reviewText = $review->getReviewText();
        $isShow = $review->getIsShow();
        
        if ($isShow) {
            echo
            "
            <div class='col-12 card shadow bg-light'>
                <div class='card-body'>
                    <div class='card-title'>$userName</div>
                    <p class='card-body'>$reviewText</p>
                </div>
                <div class='card-footer'>
                    <a href='/adminreviews/hideReview?id=$id' class='btn btn-secondary'>Спрятать отзыв</a>
                    <a href='/adminreviews/removeReview?id=$id' class='btn btn-danger'>Удалить отзыв</a>
                </div>
            </div>
            ";
        } else
        {
            echo
            "
            <div class='col-12 card shadow bg-light'>
                <div class='card-body'>
                    <div class='card-title'>$userName</div>
                    <p class='card-body'>$reviewText</p>
                </div>
                <div class='card-footer'>
                    <a href='/adminreviews/showReview?id=$id' class='btn btn-success'>Отобразить отзыв</a>
                    <a href='/adminreviews/removeReview?id=$id' class='btn btn-danger'>Удалить отзыв</a>
                </div>
            </div>
            ";
        }
    }
    ?>
</div>