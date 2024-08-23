<?php

include_once './helpers/db_connection.php';

function get_products(){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM products");
    return $data -> fetchAll();
}

function get_product($product_id){
    $conn = connectToDB();
    $data = $conn -> query("SELECT product_name FROM products WHERE id=".$product_id);
    return $data -> fetch();
}