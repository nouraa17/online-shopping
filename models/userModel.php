<?php

include_once './helpers/db_connection.php';



function login($email,$password){
    $conn = connectToDB();
    $data = $conn ->query("SELECT * FROM users WHERE email='".$email."' and password='".$password."'");
    return $data -> fetch();
}

function register($name, $email, $password, $phone) {
    $conn = connectToDB();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return false;
    } else {

        $sql = "INSERT INTO users (name, email, password, phone, type) VALUES (:name, :email, :password, :phone, 'client')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        return true;
    }
}

function get_user($id){
    $conn = connectToDB();
    $data = $conn ->query("SELECT * FROM users WHERE id=".$id);
    return $data -> fetch();
}

function update($name,$email,$phone,$password,$id){
    $conn = connectToDB();
    $sql = "UPDATE users SET name = :name, email=:email, password= :password, phone= :phone WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}

function get_my_orders($id){
    $conn = connectToDB();
    $data = $conn ->query("SELECT * FROM orders WHERE user_id=".$id);
    return $data -> fetchAll();
}