<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 21/10/19
 * Time: 2:39 AM
 */

require_once __DIR__.'/../models/Stocks.php';

class DeleteStockController
{
    public function deleteStock($st_id)
    {
        $objStocks = new Stocks();
        $result = $objStocks->deleteStock($st_id);
        if($result)
        {
            echo "<script>
                    alert('Stock Deleted Successfully');
                    window.location.href='../views/Home.php';       
                    </script>";
        }
        else
        {
            echo "<script>
                alert('Stock Deletion Failed');
                window.location.href='../views/Home.php';
                </script>";
        }
    }
}
if(isset($_GET['st_id']))
{
    $st_id=$_GET['st_id'];
    if($st_id != null)
    {
        $obj = new DeleteStockController();
        $obj->deleteStock($st_id);
    }
    else
    {
        echo "<script>
                alert('Stock Deletion Failed');
                window.location.href='../views/Home.php';
                </script>";
    }
}
