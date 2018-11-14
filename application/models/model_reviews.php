<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 20.10.2018
 * Time: 12:50
 */

class Model_Reviews extends Model
{
    public function getReviews() : array
    {
        $reviews = array();
        $queryString = "SELECT * FROM reviews";
        $result = mysqli_query($this->databaseConnection, $queryString);
        if ($result)
        {
            while ($reviewRow = mysqli_fetch_row($result)) {
                $review = new Review();
                $review->setId($reviewRow[0]);
                $review->setUserName($reviewRow[1]);
                $review->setReviewText($reviewRow[2]);
                $review->setIsShow($reviewRow[3]);
                array_push($reviews, $review);
            }
        }
        return $reviews;
    }

    public function removeReview($reviewId) : bool
    {
        $queryString = "DELETE FROM reviews WHERE id='$reviewId'";
        $result = mysqli_query($this->databaseConnection, $queryString);
        if ($result)
            return true;
        return false;
    }

    public function showReview($reviewId) : bool
    {
        $queryString = "UPDATE `reviews` SET `is_show`=TRUE WHERE `id`='$reviewId'";
        $result = mysqli_query($this->databaseConnection, $queryString);
        if ($result)
            return true;
        return false;
    }

    public function hideReview($reviewId) : bool
    {
        $queryString = "UPDATE `reviews` SET `is_show`=FALSE WHERE `id`='$reviewId'";
        $result = mysqli_query($this->databaseConnection, $queryString);
        if ($result)
            return true;
        return false;
    }
}