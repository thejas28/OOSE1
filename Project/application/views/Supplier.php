<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 21/10/19
 * Time: 2:53 AM
 */

session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}

include 'Header.php';

require_once __DIR__.'/../models/Supplier.php';
$objSUpplier = new Supplier();
if(isset($_GET['sup_id']))
    $result=$objSUpplier->getSupplier($_GET['sup_id']);
else
    $result=$objSUpplier->getSupplier();
?>


<title>PMS-Supplier</title>
</head>
<body background="all.jpg">

<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col">Supplier Id</th>
        <th scope="col">Suppplier Name</th>
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
                            <th scope="row">'.$row['sup_id'].'</th>
                            <td>'.$row['sup_name'].'</td>
                            <td>'.$row['sup_address'].'</td>';
                    echo '</tr>';
                }
            }
            else
            {
                echo "<th></th><td>No Supplier Records Found</td>";
            }
        echo '</tbody></table>';
            ?>
    </tr>

    </tbody>
</table>

</body>
</html>