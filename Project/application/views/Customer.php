<?php

session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}


include 'Header.php';

require_once __DIR__."/../models/Customer.php";
$objCustomer = new Customer();
if(isset($_GET['c_id']))
    $result=$objCustomer->getCustomer($_GET['c_id']);
else
    $result=$objCustomer->getCustomer();
?>

<title>PMS-Customer</title>
</head>
<body background="all.jpg">

<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col">Customer Id</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <?php

        if($result != null)
        {
            while ($row = $result->fetch_assoc())
            {
                echo '
                            <th scope="row">'.$row['c_id'].'</th>
                            <td>'.$row['c_name'].'</td>
                            <td>'.$row['c_email'].'</td>
                            <td>'.$row['c_phone'].'</td>
                            <td>'.$row['c_address'].'</td>';
                echo '</tr>';
            }
        }
        else
        {
            echo "<th></th><td>No Customer Records Found</td>";
        }
        ?>
    </tr>

    </tbody>
</table>

</body>
</html>
