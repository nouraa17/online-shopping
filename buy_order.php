<?php
session_start();
include_once 'models/userModel.php';
include_once 'models/orderModel.php';
include_once 'models/productModel.php';


if (!isset($_SESSION['id'])) {
    header('location:login.php');
    exit();
}else{
    $product_name=get_product($_GET['product_id']);
    buy_order($_SESSION['id'],$product_name['product_name']);
    header('location: my_orders.php');
    exit();
}


?>
