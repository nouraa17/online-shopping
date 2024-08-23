<?php
function connectToDB(){
    $info = 'mysql:host=localhost;dbname=onlineshopping';
    $username = 'root';
    $password = '';

    $conn = new PDO($info,$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $conn;
}

?>