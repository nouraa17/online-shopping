<?php
session_start();
$title = 'Register';
include_once 'templates/header.php';
include_once 'models/userModel.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $data_check = register($_POST['name'],$_POST['email'],$_POST['password'],$_POST['phone']);
}
?>

<div class="container mt-5">
    <h1 class="text-center">Register</h1>
    <?php
        if(isset($data_check)){
            if($data_check == false){
                echo '<div class="alert alert-danger text-center mt-4">User already exists please login</div>';
            }else{
                echo '<div class="alert alert-success text-center mt-4">Account registered successfully now go Login</div>';
            }
        }
        ?>
    <form class="w-50 m-auto pt-2"  method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-info form-control mb-3">Submit</button>
        <a class="lead text-decoration-none" href="login.php">Already Member?</a>
    </form>
</div>

<?php
include_once 'templates/footer.php';
?>