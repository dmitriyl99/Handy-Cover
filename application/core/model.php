<?php 
    class Model 
    {
        protected $databaseConnection;

        public function __construct()
        {
            require_once('connection.php');
            $this->databaseConnection = $connection;
        }

        public function get_data() {
            
        }

        public function getContacts() : array {
            $phones = array();
            $phonesQueryString = 'SELECT * FROM phones LIMIT 0, 3;';
            $phonesResult = mysqli_query($this->databaseConnection, $phonesQueryString);
            if ($phonesResult)
            {
                while ($phonesRow = mysqli_fetch_row($phonesResult)) {
                    array_push($phones, $phonesRow[1]);
                }
            }
            $address = '';
            $addressQueryString = 'SELECT * FROM addresses';
            $addressResult = mysqli_query($this->databaseConnection, $addressQueryString);
            if ($addressResult)
            {
                $address = mysqli_fetch_row($addressResult)[1];
            }
            $socialLinks = array(
                "TG" => "",
                "OK" => "",
                "FB" => "",
                "INST" => ""
            );
            $queryString = "SELECT * FROM social_links";
            $socialLinksResult = mysqli_query($this->databaseConnection, $queryString);
            if ($socialLinksResult)
            {
                $socialLinksRow = mysqli_fetch_row($socialLinksResult);
                $socialLinks["TG"] = $socialLinksRow[1];
                $socialLinks["OK"] = $socialLinksRow[2];
                $socialLinks['FB'] = $socialLinksRow[3];
                $socialLinks['INST'] = $socialLinksRow[4];
            }

            $contacts = array([
               'phones' => $phones,
               'address' => $address,
                'socialLinks' => $socialLinks
            ]);
            return $contacts;
        }
    }