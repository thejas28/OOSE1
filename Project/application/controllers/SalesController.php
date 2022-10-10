<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/09/19
 * Time: 4:52 PM
 */

require_once __DIR__."/../models/Sales.php";

$objSalesController = new SalesController();
if(isset($_POST['Save']))
{
    $objSalesController->getInput($_POST['Save']);
}

class SalesController
{
    function getInput($st_id)
    {
        $c_id=$_POST['c_id'];
        $quantity=$_POST['quantity'];
        $cost=$_POST['cost'];
        self::addSales($st_id,$c_id,$quantity,$cost);
    }

    function addSales($st_id,$c_id,$quantity,$cost)
    {
        $objSales = new Sales();
        if($st_id != null && $c_id != null && $quantity != null && $cost != null)
        {
            if($objSales->addSales($st_id,$c_id,$quantity,$cost))
            {
                echo "
                <script>
                        alert('Sales Saved Successfully');
                        window.location.href='../views/Home.php';
                </script>";
            }
            else
            {
                echo "
                <script>
                        alert('Sales Save Failed');
                        window.location.href='../views/Home.php';
                </script>";
            }

        }
        else
        {
            echo "
                <script>
                        alert('Please Fill All Fields');
                        window.location.href='../views/Home.php';
                </script>";
        }
    }
}