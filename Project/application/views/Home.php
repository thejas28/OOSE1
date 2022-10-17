<?php

session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}

include 'Header.php';
require_once __DIR__.'/../controllers/HomeController.php';

$objHomeController = new HomeController();
$values=$objHomeController->getStocks();

?>

<title>PMS-Home</title>
</head>
<body background="all.jpg" >

<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col">Sl No.</th>
        <th scope="col">Medicine</th>
        <th scope="col">Supplier</th>
        <th scope="col">Quantity Left</th>
        <th scope="col">Cost Per Strip</th>
        <th scope="col">Date Supplied</th>
        <th scope="col">Actions</th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        if($values)
        {
            $i=1;
            while($row = $values->fetch_assoc())
            {
                echo '<th scope="row">'.$i.'</th>
                    <td><a href="Medicine.php?m_id='.$row['m_id'].'">'.$objHomeController->getMedicineName($row['m_id']).'</a> </td>
                    <td><a href="Supplier.php?sup_id='.$row['sup_id'].'">'.$objHomeController->getSupplierName($row['sup_id']).'</a></td>
                    <td>'.$row['quantity_left'].'</td>
                    <td>'.$row['cost'].'</td>
                    <td>'.$row['date_supplied'].'</td>
                    <td><a href="Sales.php?st_id='.$row['st_id'].'"><button class="btn-primary">Sales</button></a>
                    <a href="../controllers/DeleteStockController.php?st_id='.$row['st_id'].'"><button class="btn-danger">Delete</button></a></td>';
                $i++;
                echo '</tr>';
            }

        }
        else
        {

            echo ' <div align="center"><b>NO STOCKS TO DISPLAY</b></div>';
        }
        echo '</tbody></table>';
        ?>



</body>
</html>

