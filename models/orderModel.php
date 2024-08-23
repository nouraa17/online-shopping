<?php

include_once './helpers/db_connection.php';

// function get_products(){
//     $conn = connectToDB();
//     $data = $conn -> query("SELECT * FROM products");
//     return $data -> fetchAll();
// }

function delete_order($order_id){
    $conn = connectToDB();
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = :order_id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt -> execute();
}

function buy_order($user_id,$order_description){
    $conn = connectToDB();
    $sql = "INSERT INTO orders (user_id, order_description) VALUES (:user_id, :order_description)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':order_description', $order_description);
    $stmt -> execute();

}