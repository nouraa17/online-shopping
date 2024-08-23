<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand me-5" href="#">User</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($active_home)){ echo $active_home; }?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($active_my_orders)){ echo $active_my_orders; }?>" href="my_orders.php">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($active_profile)){ echo $active_profile; }?>" href="user_profile.php">Profile</a>
        </li> 
        <li class="nav-item float-end ms-5">
          <a class="nav-link" href="logout.php">Logout <i class="fa-solid fa-right-to-bracket"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>