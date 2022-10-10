<?php


require_once __DIR__.'/../models/Customer.php';

if(isset($_POST['submit']))
{
    $addCustomerObj = new AddCustomerController();
    $addCustomerObj->getUserInput();
}

class AddCustomerController
{
    public function getUserInput()
    {
        $name=$_POST['c_name'];
        $email=$_POST['c_email'];
        $phone=$_POST['c_phone'];
        $address=$_POST['c_address'];
        $this->addCustomer($name,$email,$phone,$address);
    }

    public function addCustomer($name,$email,$phone,$address)
    {
        if($name==null || $email==null || $phone==null || $address==null)
        {
            echo "
                <script>
                        alert('Please Fill All Fields');
                        window.location.href='../views/AddCustomer.php';
                </script>";
            return;
        }
        $objCustomer= new Customer();
        $res =$objCustomer->addCustomer($name,$email,$phone,$address);

        if($res)
        {
            echo "
                <script>
                        alert('Customer Added Successfully');
                        window.location.href='../views/AddCustomer.php';
                </script>";
            //redirect to all suppliers page if time permits
        }
        else
        {
            echo "
                <script>
                        alert('Add Customer Failed');
                        window.location.href='../views/AddCustomer.php';
                </script>";
        }
    }
}
