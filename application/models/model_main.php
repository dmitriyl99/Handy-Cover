<?php
    class Model_Main extends Model 
    {

        public function get_data() 
        {
            $query_string = 'SELECT * FROM home_table';
            $result = mysqli_query($this->databaseConnection, $query_string);
            $company_information = "";
            if ($result) {
                $company_information = mysqli_fetch_row($result)[1];
            }
            $title = "Главная";
            $description = $company_information;
            $reviews = array();

            $reviews_query_string = 'SELECT * FROM reviews WHERE is_show=TRUE';
            $reviews_result = mysqli_query($this->databaseConnection, $reviews_query_string);
            if ($reviews_result) 
            {
                while($row = mysqli_fetch_row($reviews_result)) 
                {
                    $review = new Review();
                    $review->setUserName($row[1]);
                    $review->setReviewText($row[2]);
                    array_push($reviews, $review);
                }
            }
            $viewModel = new HomePageViewModel($description, $reviews);
            $viewModel->setTitle("Главная");
            $viewModel->setContacts($this->getContacts());
            return $viewModel;
        }

        public function save_review($user_name, $review_text) : bool
        {
            $queryString = "INSERT INTO reviews (user_name, review_text) VALUES ('$user_name', '$review_text')";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            return false;
        }
    }