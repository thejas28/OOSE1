<?php


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
