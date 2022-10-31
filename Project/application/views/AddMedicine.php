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

<title>PMS-Add Medicine</title>
</head>
<body background="all.jpg">
<div align="center">
    <h1>Add Medicine</h1>
    <form action="../controllers/AddMedicineController.php" method="post">
        <input type="text" name="m_name" placeholder="Enter Medicine Name"/>
        <br/><br/>
        <input type="text" name="m_category" placeholder="Enter Medicine Category"/>
        <br/><br/>
        <textarea name="m_description" placeholder="Enter Medicine Description"></textarea>
        <br/><br/>
        <input type="submit" name="submit" value="Add"/>
    </form>
</div>
</body>
</html>


