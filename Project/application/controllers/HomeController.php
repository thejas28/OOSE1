<?php


require_once __DIR__.'/../models/Stocks.php';
require_once __DIR__.'/../models/Medicine.php';
require_once __DIR__.'/../models/Supplier.php';

class HomeController
{
    public function getStocks()
    {
        $objStocks = new Stocks();
        return $objStocks->getStocks();
    }

    public function getMedicineName($m_id)
    {
        $objMedicine = new Medicine();
        $medicine=$objMedicine->getMedicine($m_id);
        if($medicine)
        {
            $result = $medicine->fetch_assoc();
            return $result['m_name'];
        }
        return "";
    }

    public function getSupplierName($sup_id)
    {
        $objSupplier = new Supplier();
        $supplier = $objSupplier->getSupplier($sup_id);
        if($supplier)
        {
            $result = $supplier->fetch_assoc();
            return $result['sup_name'];
        }
        return "";

    }
}
