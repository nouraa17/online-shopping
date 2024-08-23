<?php
session_start();
$title = 'Login';
include_once 'templates/header.php';
include_once 'models/userModel.php';
if($_SERVER['REQUEST_METHOD']=='POST'){

    $data_check = login($_POST['email'],$_POST['password']);
    if(is_array($data_check)){
        $_SESSION['id'] = $data_check['id'];
        $_SESSION['type'] = $data_check['type'];
        if($data_check['type']=='admin'){
            header('location:admin_users.php');
        }
        else{
            header('location:index.php');
        }
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center">Login</h1>
    <?php
        if(isset($data_check)){
            if($data_check == false){
                echo '<div class="alert alert-danger text-center mt-4">Email or password incorrect</div>';
            }
        }
        ?>
    <form class="w-50 m-auto pt-2" method="post">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-info form-control mb-3">Login</button>
        <a class="lead text-decoration-none" href="register.php">New Member?</a>
    </form>
</div>

<?php
include_once 'templates/footer.php';
?>