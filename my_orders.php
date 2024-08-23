<?php
session_start();
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}else{
    header('location:index.php');
}
$title = 'My Orders';
$active_my_orders = 'active';
include_once 'templates/header.php';
include_once 'templates/navbar_user.php';
include_once 'models/userModel.php';
include_once 'models/orderModel.php';

$orders = get_my_orders($user_id);
$fields=['order_description','created_at'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    delete_order($_POST['order_id']);
    header("Location:".$_SERVER['PHP_SELF']."");
}

$countnum =1;
?>


<div class="container mt-5">
    <h1>My Orders</h1>
    <table class="table table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Order Details</th>
            <th scope="col">Order Date</th>
            <th scope="col">Cancel Order</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($orders as $order){
                echo '<tr>';
                echo '<th scope="row">'.$countnum.'</th>';
                foreach ($fields as $field){
                    echo '<th scope="row">'.$order[$field].'</th>';
                }
                $countnum ++;
                echo '<form method="post" onsubmit="return confirm(\'Are you sure you want to delete this order?\');">';
                echo '<input type="hidden" name="order_id" value="'.$order['id'] .'">';
                echo '<th scope="row"><button type="submit" class="btn btn-danger""><i class="fa-solid fa-trash"></i></button></tr>';
                echo '</form>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    
    
   
</div>

<?php
include_once 'templates/footer.php';
?>