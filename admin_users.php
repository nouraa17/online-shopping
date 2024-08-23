<?php
session_start();
if(isset($_SESSION['id'])){
    if($_SESSION['type']!='admin'){
        header('location:index.php');
    }
}else{
    header('location:index.php');
}
$title = 'Users';
$active_users = 'active';
include_once 'templates/header.php';
include_once 'templates/navbar_admin.php';
include_once 'models/adminModel.php';

$users = get_users();
$fields=['name','email','phone','type'];
$countnum=1;
?>

<div class="container mt-5">
    <h1>Users</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">type</th>
                <th scope="col">Show Orders</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user){ 
                echo '<tr>';
                echo '<th scope="row">'.$countnum.'</th>';
                    foreach($fields as $field){
                        echo '<th scope="row">'.$user[$field].'</th>';
                    }
                    $countnum ++;
                    echo '<th scope="row"><a href="view_user_order.php?user_id='.$user['id'].'"><i class="fa-solid fa-list"></i></a></th>';
                    echo '</tr>';
                } ?>
        </tbody>
    </table>
</div>

<?php
include_once 'templates/footer.php';
?>
