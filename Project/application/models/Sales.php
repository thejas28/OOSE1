<?php

require_once __DIR__.'/../utilities/Database.php';

class Sales
{
    public function addSales($st_id,$c_id,$quantity,$cost)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="insert into sales values (NULL,'$st_id','$c_id','$quantity','$c_id',NULL )";
        $result=$con->query($query);
        return $result;
    }

    public function getSales()
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="select * from sales order by `date` DESC";
        $result=$con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }
}
