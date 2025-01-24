<?php
session_start();
include "../Model/db.php";

if (!isset($_SESSION['rider_id'])) 
{
    header("Location: login.php");
    exit();
}

$rider_orders = getPendingOrdersForRider();
include "../view/orderRIDER_dashboard.php";
?>
