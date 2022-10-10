<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/09/19
 * Time: 4:38 PM
 */

require_once __DIR__.'/../models/Stocks.php';
require_once __DIR__.'/../models/Medicine.php';
require_once __DIR__.'/../models/Supplier.php';

class AddStocksController
{
    public function getUserInput()
    {
        $m_id=$_POST['m_id'];
        $sup_id=$_POST['sup_id'];
        $quantity=$_POST['quantity'];
        $cost=$_POST['cost'];
        $date_supplied=$_POST['date_supplied'];
        //check foreign key if time permits
        if($m_id != null && $sup_id != null && $quantity != null && $cost != null && $date_supplied != null)
            $this->addStocks($m_id,$sup_id,$quantity,$cost,$date_supplied);
        else
            echo "<script>
                        alert('All Fields Are Mandatory');
                        window.location.href='../views/AddStocks.php';
                </script>";
    }

    private function addStocks($m_id,$sup_id,$quantity,$cost,$date_supplied)
    {
        $objStocks=new Stocks();
        $res=$objStocks->addStocks($m_id,$sup_id,$quantity,$cost,$date_supplied);
        if($res)
        {
            echo "<script>
                        alert('STOCKS ADDED SUCCESSFULLY');
                        window.location.href='../views/Home.php';
                </script>";
        }
        else
        {
            echo "<script>
                        alert('FAILED TO ADD NEW STOCK');
                        window.location.href='../views/AddStocks.php';
                </script>";
        }
    }

    public function fetchMedicines()
    {
        $objMedicine=new Medicine();
        return $objMedicine->getMedicine();
    }

    public function fetchSuppliers()
    {
        $objSupplier = new Supplier();
        return $objSupplier->getSupplier();
    }

}


if(isset($_POST['add']))
{
    $addStocks=new AddStocksController();
    $addStocks->getUserInput();
}


//$addStocks=new AddStocksController();
//$values=$addStocks->fetchMedicines();
//print_r($values->fetch_all());