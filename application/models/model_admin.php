<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 19.10.2018
 * Time: 16:25
 */

class Model_Admin extends Model
{
    public function getAdminUser() : AdminUser
    {
        $adminUser = new AdminUser();
        $queryString = 'SELECT * FROM users;';
        $result = mysqli_query($this->databaseConnection, $queryString);
        if ($result)
        {
            $adminUserRow = mysqli_fetch_row($result);
            $adminUser->setEmail($adminUserRow[1]);
            $adminUser->setPassword($adminUserRow[2]);
        }
        return $adminUser;
    }

    public function getPasswordHash($password)
    {
        $password = md5($password);
        $password = strrev($password);
        $password = 'handy_cover_tashkent'.$password.'jbfaswng561';
        return $password;
    }
}