<?php


session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}


include 'Header.php';

?>

<title>PMS-Add Supplier</title>
</head>
<body background="all.jpg">
<div align="center">
    <h1>Add Supplier</h1>
    <form action="../controllers/AddSupplierController.php" method="post">
        <input type="text" name="sup_name" placeholder="Enter Supplier Name"/>
        <br/><br/>
        <textarea name="sup_address" placeholder="Enter Supplier Address"></textarea>
        <br/><br/>
        <input type="submit" name="submit" value="Add"/>
    </form>
</div>
</body>
</html>
