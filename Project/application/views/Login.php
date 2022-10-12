<?php

session_start();
if(isset($_SESSION['useremail']))
{
    header("Location: Home.php");
    return;
}
?>
<html>
<head>
    <title>PMS-Login</title>

</head>
<style>   h1{
        padding: 40px;
        text-align: center;
        background: #56644C;
        color: white;
        font-size: 50px;}
    h2{
        font-size: 30px;}
</style>
<body>
<div align="center">
    <h1>Pharmacy Management System</h1>
    <h2>Login</h2>
    <form action="../controllers/LoginController.php" method="post">
        <label>Email : </label>
        <input type="text" name="useremail" placeholder="Enter Email"/>
        <br/><br/>
        <label>Password : </label>
        <input type="password" name="password" placeholder="Enter Password"/>
        <br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</div>
</body>
</html>
