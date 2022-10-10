<?php


require_once __DIR__.'/../utilities/Database.php';

class Supplier
{
    public function addSupplier($name,$address)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="insert into supplier values (NULL,'$name','$address')";
        $result=$con->query($query);
        return $result;
    }

    public function getSupplier($sup_id = 0)
    {
        $db=new Database();
        $con=$db->open_connection();

        if($sup_id != 0)
            $query="select * from supplier where sup_id = '$sup_id'";
        else
            $query="select * from supplier";

        $result=$con->query($query);
        if($result->num_rows > 0)
            return $result;

        return false;
    }

    public function getSupplierName($sup_id)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="select * from supplier where sup_id = '$sup_id'";

        $result=$con->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['sup_name'];
        }
        return "";
    }
}
/*
$supObj = new Supplier();
$res=$supObj->getSupplier();
if($res)
{
    while ($row=$res->fetch_assoc())
    {
        echo $row['sup_id']." ";
        echo $row['sup_name']." ";
        echo $row['sup_address']."<br/>";
    }
}
else
    echo "no rows exist";
*/
