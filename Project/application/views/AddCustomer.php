<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/09/19
 * Time: 4:09 PM
 */

session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}


include 'Header.php';

?>

<title>PMS-Add Customer</title>
</head>
<body background="all.jpg">
<div align="center">
    <h1>Add Customer</h1>
    <form action="../controllers/AddCustomerController.php" method="post">
        <input type="text" name="c_name" placeholder="Enter Customer Name"/>
        <br/><br/>
        <input type="text" name="c_email" placeholder="Enter Customer Email"/>
        <br/><br/>
        <input type="text" name="c_phone" placeholder="Enter Customer Phone"/>
        <br/><br/>
        <textarea name="c_address" placeholder="Enter Customer Address"></textarea>
        <br/><br/>
        <input type="submit" name="submit" value="Add"/>
    </form>
</div>
</body>
</html>


