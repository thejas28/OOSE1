<?php

session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}

include 'Header.php';

require_once __DIR__.'/../models/Medicine.php';
$objMedicine = new Medicine();
if(isset($_GET['m_id']))
    $result=$objMedicine->getMedicine($_GET['m_id']);
else
    $result=$objMedicine->getMedicine();
?>


<title>PMS-Medicine</title>
</head>
<body background="all.jpg">

<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col">Medicine Id</th>
        <th scope="col">Medicine Name</th>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
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
                            <th scope="row">'.$row['m_id'].'</th>
                            <td>'.$row['m_name'].'</td>
                            <td>'.$row['m_category'].'</td>
                            <td>'.$row['m_description'].'</td>';
                echo '</tr>';
            }
        }
        else
        {
            echo "<th></th><td>No Medicine Records Found</td>";
        }
        echo '</tbody></table>';
        ?>

    </tr>
    </tbody>
</table>

</body>
</html>
