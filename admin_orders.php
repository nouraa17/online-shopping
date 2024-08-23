<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['type']!='admin'){
        header('location:index.php');
    }
}else{
    header('location:index.php');
}
$title = 'Orders';
$active_orders = 'active';
include_once 'templates/header.php';
include_once 'templates/navbar_admin.php';
include_once 'models/adminModel.php';

$orders = get_orders();
$fields=['order_description','created_at','name','phone'];
$countnum =1;
?>

<div class="container mt-5">
    <h1>Orders</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
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
