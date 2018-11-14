<?php
    class Model_Contacts extends Model
    {
        public function getPhones() : array
        {
            $phones = array();
            $queryString = "SELECT * FROM phones";
            $phonesResult = mysqli_query($this->databaseConnection, $queryString);
            if ($phonesResult)
            {
                while ($phoneRow = mysqli_fetch_row($phonesResult))
                {
                    $phone = new Phone();
                    $phone->setId($phoneRow[0]);
                    $phone->setPhoneNumber($phoneRow[1]);
                    array_push($phones, $phone);
                }
            }
            return $phones;
        }

        public function getSocialLinks() : array
        {
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
            return $socialLinks;
        }

        public function getAddress()
        {
            $address = "";
            $queryString = "SELECT * FROM addresses";
            $addressResult = mysqli_query($this->databaseConnection, $queryString);
            if ($addressResult)
            {
                $addressRow = mysqli_fetch_row($addressResult);
                $address = $addressRow[1];
            }
            return $address;
        }

        public function getEmail() {
            $email = "";
            $queryString = "SELECT * FROM emails";
            $emailResult = mysqli_query($this->databaseConnection, $queryString);
            if ($emailResult)
                $email = mysqli_fetch_row($emailResult)[1];
            return $email;
        }

        public function updatePhones($phones, $addedPhones = null, $deletedPhonesIds = null) : bool
        {
            $hasError = false;
            if (!is_null($addedPhones) && count($addedPhones) > 0)
            {
                $addPhonesQuery = "INSERT INTO `phones` (`phoneNumber`) VALUES ";
                for ($i = 0; $i < count($addedPhones); $i++)
                {
                    $phone = $addedPhones[$i];
                    if ($i == 0)
                        $addPhonesQuery .= "('$phone')";
                    else
                        $addPhonesQuery .= ", ('$phone')";
                }
                $addPhonesQuery .= ";";
                $addResult = mysqli_query($this->databaseConnection, $addPhonesQuery);
                if (!$addResult)
                    $hasError = true;
            }
            if (!is_null($deletedPhonesIds) && count($deletedPhonesIds) > 0)
            {
                $deletePhonesQuery = "DELETE FROM `phones` WHERE `id` IN (";
                for ($i = 0; $i < count($deletedPhonesIds); $i++)
                {
                    $id = $deletedPhonesIds[$i];
                    if ($i == 0)
                        $deletePhonesQuery .= "$id";
                    else
                        $deletePhonesQuery .= ", $id";
                }
                $deletePhonesQuery .= ");";
                $deleteResult = mysqli_query($this->databaseConnection, $deletePhonesQuery);
                if (!$deleteResult)
                    $hasError = true;
            }
            foreach ($phones as $phone)
            {
                $id = $phone->getId();
                $phoneNumber = $phone->getPhoneNumber();
                $updatePhoneQuery = "UPDATE `phones` SET `phoneNumber`='$phoneNumber' WHERE `id`='$id'";
                mysqli_query($this->databaseConnection, $updatePhoneQuery);
            }
            return !$hasError;
        }

        public function updateSocialLinks($socialLinks)
        {
            foreach ($socialLinks as $key => $socialLink) {
                $updateLinkQuery = "UPDATE `social_links` SET $key='$socialLink'";
                mysqli_query($this->databaseConnection, $updateLinkQuery);
            }
        }

        public function updateAddress($address) : bool
        {
            $updateAddressQuery = "UPDATE `addresses` SET `address`='$address'";
            $result = mysqli_query($this->databaseConnection, $updateAddressQuery);
            if ($result)
                return true;
            return false;
        }

        public function updateEmail($email) : bool {
            $updateEmailQueryString = "UPDATE `emails` SET `email`='$email'";
            return mysqli_query($this->databaseConnection, $updateEmailQueryString);
        }
    }