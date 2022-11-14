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
        border: 5px solid black;
        padding: 40px;
        text-align: center;
        background-color: lightblue;
        color: black;
        font-size: 50px;}
    h2{
        font-size: 50px;
        }
    h3{
        font-size: 30px;
    }

</style>
<body background="login.jpg">
<div align="center">
    <h1>Pharmacy Management System</h1>
    <h2>Login </h2>
    <h3><form action="../controllers/LoginController.php" method="post">
        <label>Email : </label>
        <input type="text" name="useremail" placeholder="Enter Email"/>
        <br/><br/>
        <label>Password : </label>
        <input type="password" name="password" placeholder="Enter Password"/>
        <br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    </h3>
</div>
</body>
</html>
