<?php

include_once './helpers/db_connection.php';

function get_users(){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users");
    return $data -> fetchAll();
}

function get_orders(){
    $conn = connectToDB();
    $data = $conn -> query("SELECT orders.* ,users.name,users.phone FROM orders INNER JOIN users ON orders.user_id = users.id;");
    return $data -> fetchAll();
}

function get_user_orders($id){
    $conn = connectToDB();
    $data = $conn ->query("SELECT orders.* ,users.name,users.phone FROM orders INNER JOIN users ON orders.user_id = users.id WHERE orders.user_id =".$id.";");
    return $data -> fetchAll();
}

function get_user_name($id){
    $conn = connectToDB();
    $data = $conn -> query("SELECT name FROM users WHERE id=".$id);
    return $data -> fetch();
}
