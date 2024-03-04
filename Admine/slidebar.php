<?php
if(!isset($_SESSION['login'])){
  header("Location:login.php");
  exit();
}
?>
<ul 
class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
          <!-- I have deleted -->
        </div>
      </li>
      <!-- I have deleted -->
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Costumer's Tables</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="usertable.php">
          <i class="fas fa-fw fa-table"></i>
          <span>User's Tables</span></a>
      </li>
      <!-- projects and Ruseme -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Change the page</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header" >change the project <br> and Resume:</h6>
          <a class="dropdown-item" id="change" href="changeProject.php">Project</a>
          <a class="dropdown-item" href="changeResume.php">Ruseme</a>
          <a class="dropdown-item" href="changeHome.php">homePage</a>
          <!-- I have deleted -->
        </div>
      </li>
    </ul>