<?php

require_once __DIR__.'/../utilities/Database.php';
require_once __DIR__."/Medicine.php";
require_once __DIR__."/Supplier.php";

class Stocks
{
    public function addStocks($m_id,$sup_id,$quantity,$cost,$date_supplied)
    {
        $db = new Database();
        $con= $db->open_connection();

        $query="insert into stocks values (NULL,'$m_id','$sup_id','$quantity','$quantity','$cost','$date_supplied')";
        $res=$con->query($query);
        return $res;
    }

    public function getStocks()
    {
        $db = new Database();
        $con= $db->open_connection();

        $query="call stocks()";
        $res=$con->query($query);
        if($res->num_rows > 0)
            return $res;
        return false;
    }

    public function getStock($st_id)
    {
        $db = new Database();
        $con= $db->open_connection();

        $query="select * from stocks where `st_id` = '$st_id'";
        $res=$con->query($query);
        if($res->num_rows > 0)
            return $res;
        return false;
    }

    public function deleteStock($st_id)
    {
        $db = new Database();
        $con= $db->open_connection();

        $query="delete from stocks where st_id = '$st_id'";
        $res=$con->query($query);
        return $res;
    }

    public function getMedicineName($st_id)
    {
        $db = new Database();
        $objMedicine = new Medicine();
        $con= $db->open_connection();

        $query="select * from stocks where `st_id` = '$st_id'";
        $res=$con->query($query);
        if($res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            return $objMedicine->getMedicineName($row['m_id']);
        }
        return "";
    }

    public function getSupplierName($st_id)
    {
        $db = new Database();
        $objSupplier = new Supplier();
        $con= $db->open_connection();

        $query="select * from stocks where `st_id` = '$st_id'";
        $res=$con->query($query);
        if($res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            return $objSupplier->getSupplierName($row['m_id']);
        }
        return "";
    }
}
