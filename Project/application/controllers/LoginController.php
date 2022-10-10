<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/09/19
 * Time: 4:09 PM
 */
require_once __DIR__.'/../models/Admin.php';

if(isset($_POST['submit']))
{
    $loginController = new LoginController();
    $loginController->getUserInput();
}

class LoginController
{
    public function getUserInput()
    {
        $useremail=$_POST['useremail'];
        $password=$_POST['password'];
        if($useremail != null && $password != null)
            $this->checkLogin($useremail,$password);
        else
            echo "<script>
                        alert('Please Enter Useremail And Password');
                        window.location.href='../views/Login.php';
                </script>";
    }

    public function checkLogin($useremail,$password)
    {
            $admin = new Admin();
            $user = $admin->canLogin($useremail,$password);

            if($user)
            {
                session_start();
                $_SESSION['useremail']=$user['useremail'];
                echo "
                <script>
                        alert('Login Success');
                        window.location.href='../views/Home.php';
                </script>";
            }
            else
            {
                echo "
                <script>
                        alert('Incorrect Username Or Password');
                        window.location.href='../views/Login.php';
                </script>";
            }

    }
}