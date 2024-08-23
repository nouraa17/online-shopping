<?php
session_start();
$title = 'Update';
include_once 'templates/header.php';
include_once 'models/userModel.php';

if(isset($_SESSION['id'])){
    if($_SERVER['REQUEST_METHOD']!='GET' && $_SERVER['REQUEST_METHOD']!='POST'){
        header('location:user_profile.php');
    }
    else{
        if($_SESSION['id'] == $_GET['user_id']){
            $user_id =(int)$_GET['user_id'];
        }else{
            header('location:user_profile.php');
        }
    }
}
else{
    header('location:index.php');
}

$user = get_user($user_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    update($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['password'], $user_id);
    header('Location: user_profile.php');
    exit;
}
?>

<div class="container mt-5">
    <h1 class="text-center">Update Your Data</h1>
    <a class="text-decoration-none" href="user_profile.php"><i class="fa-solid fa-left-long me-2"></i><i class="fa-solid fa-user"></i> back to profile</a>

    <form class="w-50 m-auto pt-2" method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $user['name']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" value="<?php echo $user['email']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label> 
            <input type="password" name="password" class="form-control" value="<?php echo $user['password']?>">
        </div>
        <button type="submit" class="btn btn-info form-control mb-3">Update</button>
    </form>
</div>

<?php
include_once 'templates/footer.php';
?>