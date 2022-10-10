<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/09/19
 * Time: 4:09 PM
 */
$logoutController = new LogoutController();
$logoutController->logout();

class LogoutController
{
    public function logout()
    {
        session_start();
        session_destroy();
        echo "
            <script>
                alert('Logout Sucessful');
                window.location.href='../views/Login.php';
            </script>";
    }
}