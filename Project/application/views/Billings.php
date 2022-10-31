<?php


session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}


include 'Header.php';

require_once __DIR__."/../models/Sales.php";
require_once __DIR__."/../models/Stocks.php";
require_once __DIR__."/../models/Customer.php";

$objSales = new Sales();
$objStocks = new Stocks();
$objCustomer = new Customer();

$result = $objSales->getSales();
?>

<title>PMS-Billings</title>
</head>
<body background="all.jpg">

<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col">Sales Id</th>
        <th scope="col">Medicine Name</th>
        <th scope="col">Supplier Name</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Cost</th>
        <th scope="col">Date</th>

    </tr>
    </thead>
    <tbody>
    <tr>
<?php
    if($result)
    {
        while ($row = $result->fetch_assoc())
        {
            echo '
                            <th scope="row">'.$row['s_id'].'</th>
                            <td>'.$objStocks->getMedicineName($row['st_id']).'</td>
                            <td>'.$objStocks->getSupplierName($row['st_id']).'</td>
                            <td><a href="Customer.php?c_id='.$row['c_id'].'">'.$objCustomer->getCustomerName($row['c_id']).'</a></td>
                            <td>'.$row['quantity'].'</td>
                            <td>'.$row['cost'].'</td>
                            <td>'.$row['date'].'</td>';
            echo '</tr>';
        }
    }
    else
    {
        echo '</tr></tbody></table><div align="center"><th scope="col"><b>No Records Found</b></th></div>';
    }

?>
    </tr>

    </tbody>
</table>
</body>
</html>
