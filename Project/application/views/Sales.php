<?php


session_start();

if(!isset($_SESSION['useremail']))
{
    header("Location: Login.php");
    return;
}

include 'Header.php';

require_once __DIR__."/../models/Stocks.php";
require_once __DIR__."/../models/Medicine.php";
require_once __DIR__."/../models/Supplier.php";
require_once __DIR__."/../models/Customer.php";

if(isset($_GET['st_id']))
{
    $objStocks = new Stocks();
    $objMedicine = new Medicine();
    $objSupplier = new Supplier();
    $objCustomer = new Customer();
    $result = $objStocks->getStock($_GET['st_id']);
    $result1 = $objCustomer->getCustomer();
    if($result)
        $row = $result->fetch_assoc();
    else
    {
        header("Location: home.php");
        return;
    }
}
else
{
    header("Location: home.php");
    return;
}

?>
<title>PMS-Sales</title>
</head>
<body background="all.jpg">
<form action="../controllers/SalesController.php" method="post">
    <div align="center">
    <label>Medicine : </label>
        <input value="<?php echo $objMedicine->getMedicineName($row['m_id']); ?>" readonly/>
    <br><br>
    <label>Supplier : </label>
        <input value="<?php echo $objSupplier->getSupplierName($row['sup_id']); ?>" readonly/>
        <br><br>
        <label>Customer : </label>
        <select name="c_id" required>
            <option value="">----Select Customer----</option>
            <?php
                if($result1)
                {
                    while($value = $result1->fetch_assoc())
                    {
                        echo '<option value="'.$value['c_id'].'">'.$value['c_name']." - ".$value['c_email'].'</option>';
                        
                    }
                }
            ?>
        </select>
        &nbsp;<button onclick="addCustomer()">Add New Customer</button>
        <br><br>
        <label>Quantity : </label>
        <input type="number" name="quantity" id="quantity" placeholder="Quantity Left Is : <?php echo $row['quantity_left'];?>" required/>
        <br><br>
        <label>Cost : </label>
        <input type="text" name="cost" id="cost" placeholder="Cost Per Strip Is : <?php echo $row['cost'];?>" readonly required/>
        <br><br>
        <button type="submit" name="Save" value="<?php echo $_GET['st_id'];?>">Save</button>
    </div>
</form>

</body>
</html>
<script>
    function addCustomer()
    {
        window.location.href="AddCustomer.php";
    }

    setInterval(function(){
        loadCost();
        checkQuantity();
    }, 500);
    
    function loadCost()
    {
        var quantity = 0;
        quantity=document.getElementById("quantity").value;
        if(quantity != 0)
            document.getElementById("cost").value = quantity*<?php echo $row['cost'];?>;
        else
            document.getElementById("cost").value = "";
    }
    function checkQuantity()
    {
        var quantity = 0;
        quantity=document.getElementById("quantity").value;
        if(quantity > <?php echo $row['quantity_left'];?>)
        {
            alert("Quantity Left Is : <?php echo $row['quantity_left'];?>");
            document.getElementById("quantity").value = "";
        }
    }

</script>
