<?php

require_once __DIR__.'/../models/Supplier.php';

if(isset($_POST['submit']))
{
    $addSupObj = new AddSupplierController();
    $addSupObj->getUserInput();
}


class AddSupplierController
{
    public function getUserInput()
    {
        $name=$_POST['sup_name'];
        $address=$_POST['sup_address'];
        $this->addSupplier($name,$address);
    }

    public function addSupplier($name,$address)
    {
        if($name==null || $address==null)
        {
            echo "
                <script>
                        alert('Please Enter Supplier Name And Address');
                        window.location.href='../views/AddSupplier.php';
                </script>";
            return;
        }
        $supObj= new Supplier();
        $res =$supObj->addSupplier($name,$address);

        if($res)
        {
            echo "
                <script>
                        alert('Supplier Added Successfully');
                        window.location.href='../views/AddSupplier.php';
                </script>";
            //redirect to all suppliers page if time permits
        }
        else
        {
            echo "
                <script>
                        alert('Add Supplier Failed');
                        window.location.href='../views/AddSupplier.php';
                </script>";
        }
    }

}