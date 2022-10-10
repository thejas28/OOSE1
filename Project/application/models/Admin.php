<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/09/19
 * Time: 4:09 PM
 */

require_once __DIR__.'/../utilities/Database.php';


class Admin
{
        public function canLogin($useremail,$password)
        {
            $db=new Database();
            $con=$db->open_connection();

            $query="select * from admin where useremail='$useremail' and password='$password'";

            $result=$con->query($query);

            if($result)
                return $result->fetch_assoc();

            return false;
        }

}