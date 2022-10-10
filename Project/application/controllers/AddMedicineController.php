<?php


require_once __DIR__.'/../models/Medicine.php';

if(isset($_POST['submit']))
{
    $addMedObj = new AddMedicineController();
    $addMedObj->getUserInput();
}

class AddMedicineController
{
    public function getUserInput()
    {
        $name=$_POST['m_name'];
        $category=$_POST['m_category'];
        $description=$_POST['m_description'];
        $this->addMedicine($name,$category,$description);
    }

    public function addMedicine($name,$category,$description)
    {
        if($name==null || $category==null || $description==null)
        {
            echo "
                <script>
                        alert('Please Enter Medicine Name Category And Description');
                        window.location.href='../views/AddMedicine.php';
                </script>";
            return;
        }
        $medObj= new Medicine();
        $res =$medObj->addMedicine($name,$category,$description);

        if($res)
        {
            echo "
                <script>
                        alert('Medicine Added Successfully');
                        window.location.href='../views/AddMedicine.php';
                </script>";
            //redirect to all suppliers page if time permits
        }
        else
        {
            echo "
                <script>
                        alert('Add Medicine Failed');
                        window.location.href='../views/AddMedicine.php';
                </script>";
        }
    }
}
