<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['type']!='admin'){
        header('location:index.php');
    }
}else{
    header('location:index.php');
}
if($_SERVER['REQUEST_METHOD']=='GET'){
    $user_id = (int)$_GET['user_id'];
}
$title = 'Orders';
$active_orders = 'active';
include_once 'templates/header.php';
include_once 'templates/navbar_admin.php';
include_once 'models/adminModel.php';

$orders = get_user_orders($user_id);
$fields=['order_description','created_at'];
$name = get_user_name($user_id);
$countnum =1;
?>

<div class="container mt-5">
    <h1><?php if(isset($name)){
        echo $name['name'];
    } ?> Orders</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order){ 
                echo '<tr>';
                echo '<th scope="row">'.$countnum.'</th>';
                    foreach($fields as $field){
                        echo '<th scope="row">'.$order[$field].'</th>';
                    }
                    $countnum ++;
                    echo '</tr>';
                } ?>
        </tbody>
    </table>
</div>

<?php
include_once 'templates/footer.php';
?>
