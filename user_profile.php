<?php
session_start();
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}else{
    header('location:index.php');
}
$title = 'My Profile';
$active_profile = 'active';
include_once 'templates/header.php';
include_once 'templates/navbar_user.php';
include_once 'models/userModel.php';

$user = get_user($user_id);

?>

<div class="container mt-5">
    <h1 class="text-center">Profile</h1>
    <form class="w-50 m-auto pt-2">
        <?php echo '<a href="user_update.php?user_id='.$user_id.'"><i class=" mb-2 fa-solid fa-pen float-end"></i></a>'; ?>
        <div class="mb-3">
            <label class="form-label alert alert-info w-100 py-1">Name</label>
            <p type="text" name="name" class="w-100"><?php echo $user['name']?></p>
        </div>
        <div class="mb-3">
            <label class="form-label  alert alert-info w-100 py-1">Email address</label>
            <p type="email" name="email" class="w-100"><?php echo $user['email']?></p>
        </div>
        <div class="mb-3">
            <label class="form-label  alert alert-info w-100 py-1">Phone</label>
            <p type="text" name="phone" class="w-100"><?php echo $user['phone']?></p>
        </div>
        <div class="mb-3">
            <label class="form-label  alert alert-info w-100 py-1">Password</label>
            <p type="password" name="password" class="w-100"><?php echo $user['password']?></p>
        </div>
    </form>
</div>

<?php
include_once 'templates/footer.php';
?>