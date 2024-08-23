<?php
// task
/*
login --> done
register --> done
login as admin go to admin panel --> done
logon as user go to user home --> done
user profile editable --> done
page to view products --> done
buy product --> done
page to view bought products --> done
delete order --> done
admin views orders and users allowed only for admin --> done
admin views rach user's orders --> done
*/
session_start();
$title = 'Home';
include_once 'templates/header.php';
$active_home = 'active';
include_once 'templates/header.php';
if(isset($_SESSION['id'])){
    include_once 'templates/navbar_user.php';
}else{
    include_once 'templates/navbar.php';
}
include_once 'models/productModel.php';
$products = get_products();
?>

<div class="container mt-5">
    <h1 class="mb-5">All Products</h1>
    <div class="row">
        <?php
        foreach($products as $product){
            echo '<div class="card col-3 m-5">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$product['product_name'].'</h5>';
            echo '<p class="card-text">'.$product['product_description'].'</p>';
            echo '<a href="buy_order.php?product_id='.$product['id'].'" class="btn btn-warning card-link w-100"><i class="fa-solid fa-cart-shopping"></i></a>';
            echo '</div>';
            echo '</div>';
        }?>
    </div>
</div>

<?php
include_once 'templates/footer.php';
?>