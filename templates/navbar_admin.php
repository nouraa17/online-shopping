<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand me-5" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($active_users)){ echo $active_users; }?>" href="admin_users.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($active_orders)){ echo $active_orders; }?>" href="admin_orders.php">Orders</a>
        </li>
        <li class="nav-item float-end ms-5">
          <a class="nav-link" href="logout.php">Logout <i class="fa-solid fa-right-to-bracket"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>