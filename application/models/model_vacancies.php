<?php
    class Model_Vacancies extends Model
    {
        public function getVacancies() : array
        {
            $vacancies = array();
            $queryString = 'SELECT * FROM vacancies';
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
            {
                while ($vacancyRow = mysqli_fetch_row($result))
                {
                    $vacancy = new Vacancy();
                    $vacancy->setId($vacancyRow[0]);
                    $vacancy->setName($vacancyRow[1]);
                    $vacancy->setDemands($vacancyRow[2]);
                    array_push($vacancies, $vacancy);
                }
            }
            return $vacancies;
        }

        public function getVacancyById($vacancyId) : Vacancy
        {
            $vacancy = new Vacancy();
            $queryString = "SELECT * FROM vacancies WHERE id='$vacancyId'";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
            {
                $vacancyRow = mysqli_fetch_row($result);
                $vacancy->setId($vacancyRow[0]);
                $vacancy->setName($vacancyRow[1]);
                $vacancy->setDemands($vacancyRow[2]);
            }
            return $vacancy;
        }

        public function createVacancy($name, $demands) : bool
        {
            $queryString = "INSERT INTO `vacancies` (`name`, `demands`) VALUES ('$name', '$demands')";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            return false;
        }

        public function updateVacancy($id, $name, $demands) : bool
        {
            $queryString = "UPDATE `vacancies` SET `name`='$name', `demands`='$demands' WHERE `id`='$id'";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            return false;
        }

        public function deleteVacancy($vacancyId)
        {
            $queryString = "DELETE FROM `vacancies` WHERE `id`='$vacancyId'";
            $result = mysqli_query($this->databaseConnection, $queryString);
            if ($result)
                return true;
            return false;
        }
    }