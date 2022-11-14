<?php

require_once __DIR__.'/../utilities/Database.php';

class Customer
{
    public function addCustomer($name,$email,$phone,$address)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="insert into customer values (NULL,'$name','$email','$phone','$address')";
        $result=$con->query($query);
        return $result;
    }


    public function getCustomer($c_id = 0)
    {
        $db=new Database();
        $con=$db->open_connection();

        if($c_id != 0)
            $query="select * from customer where `c_id` = '$c_id'";
        else
            $query="select * from customer";

        $result=$con->query($query);
        if($result->num_rows > 0)
            return $result;

        return false;
    }

    public function getCustomerName($c_id)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="select * from customer where c_id = '$c_id'";

        $result=$con->query($query);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['c_name'];
        }
        return "";
    }

}
