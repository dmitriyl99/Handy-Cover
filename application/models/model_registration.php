<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 20.10.2018
 * Time: 17:49
 */

class Model_Registration extends Model
{
    public function saveAdminUser($login, $password)  : void
    {
        $password = $this->getPasswordHash($password);
        $queryString = "INSERT INTO users (user_name, user_password) VALUES ('$login', '$password')";
        mysqli_query($this->databaseConnection, $queryString);

    }

    public function getPasswordHash($password)
    {
        $password = md5($password);
        $password = strrev($password);
        $password = 'handy_cover_tashkent'.$password.'jbfaswng561';
        return $password;
    }
}