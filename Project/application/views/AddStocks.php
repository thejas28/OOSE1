<?php

session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}

include 'Header.php';
require_once __DIR__.'/../controllers/AddStocksController.php';
$objStocksController = new AddStocksController();

$medicines=$objStocksController->fetchMedicines();

$suppliers = $objStocksController->fetchSuppliers();
?>
<title>PMS-Add Stocks</title>
</head>
<body background="all.jpg">
<div align="center">
<form action="../controllers/AddStocksController.php" method="post">
    <label>Medicine : </label>
    <select name="m_id" required>
        <option value="">--- SELECT MEDICINE ---</option>
        <?php
        if($medicines->num_rows > 0)
        {
            while($row = $medicines->fetch_assoc())
            {
                echo '<option value="'.$row['m_id'].'">'.$row['m_name'].'</option>';
            }
        }
        ?>

    </select>
    &nbsp;
    <button onclick="addMedicine()">Add New Medicine</button>
    <br><br>
    <label>Supplier : </label>
    <select name="sup_id" required>
        <option value="">--- SELECT SUPPLIER ---</option>
        <?php
        if($suppliers->num_rows > 0)
        {
            while($row = $suppliers->fetch_assoc())
            {
                echo '<option value="'.$row['sup_id'].'">'.$row['sup_name'].'</option>';
            }
        }
        ?>
    </select>
    <button onclick="addSupplier()">Add New Supplier</button>
    <br><br>
    <label>Quantity : </label>
    <input type="number" name="quantity" required>
    <br><br>
    <label>Cost Per Strip : </label>
    <input type="number" name="cost" required>
    <br><br>
    <label>Date Supplied : </label>
    <input type="date" name="date_supplied" value="<?php echo date("Y-m-d");?>" required>
    <br><br>
    <input type="submit" name="add" value="add">
</form>
</div>

</body>
<script>
    function addSupplier()
    {
        window.location.href='AddSupplier.php';
    }
    function addMedicine()
    {
        window.location.href='AddMedicine.php';
    }
</script>

</html>

