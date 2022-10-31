<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand active" href="Home.php">Pharmacy Management System</a>
        </div>
        <ul class="nav navbar-nav">
            <?php $page= basename($_SERVER['REQUEST_URI'],'.php');?>

            <li <?php if($page == "Home") echo "class='active'"?>><a href="Home.php">Home</a></li>
            <li <?php if($page == "AddStocks") echo "class='active'"?>><a href="AddStocks.php">Add Stocks</a></li>
            <li <?php if($page == "Medicine") echo "class='active'"?>><a href="Medicine.php">Medicines</a></li>
            <li <?php if($page == "Supplier") echo "class='active'"?>><a href="Supplier.php">Suppliers</a></li>
            <li <?php if($page == "Customer") echo "class='active'"?>><a href="Customer.php">Customers</a></li>
            <li <?php if($page == "Billings") echo "class='active'"?>><a href="Billings.php">Billings</a></li>
            &nbsp;
            <li onclick="logout()"><a href="#"> Logout </a></li>


            <script>
                function logout() {
                    if (confirm("Click OK To Logout")) {
                        window.location.href='../controllers/LogoutController.php';
                    }
                }
            </script>
        </ul>
    </div>
</nav>
