<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="Esmatullah" content="personal page">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
    .red{
      color:red;
    }
  </style>

</head>

<body class="bg-dark">
  <?php
    require_once("database.php"); 
    $email=$password="";
    $emailErr=$passwordErr="";
    $emaile=true;
    if(isset($_POST['submit'])){
     $email=$_POST['email'];
     $password=$_POST['password'];
      // email validation
      if(empty($email)){
        $emailErr="email is required!";
      }else{
        $email=test_input($email);

        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
          $exist="SELECT * FROM ragister";
          $arr=mysqli_query($connect,$exist);
          while($rows=mysqli_fetch_assoc($arr)){
              if($rows['email_adress']==$email){
                $emaile=false;
                if($rows['passwords']==$password){
                  $_SESSION['login']=$rows['ragister_id'];
                  header("Location:index.php");
                }
                else{
                  $passwordErr="your password is incorect!";
                }
              }
              // else{
              //   $emailErr="you didn't ragistered!";
              // }
          }
          if($emaile){
            $emailErr="you didn't ragistered!";
          }
       }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr="email is not valid!";
        }
        if(strlen($email)>100){
            $emailErr="the lenght of your email is so long!";
        }    
     }
     //password validation
    if(empty($password)){
      $passwordErr="password is required!";
    }


   }

      function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


  ?>




  <div class="container"> 
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" value="<?php echo $email; ?>" name="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
            <div class="form-label-group red"><?php  echo $emailErr; ?></div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" value="<?php echo $password; ?>" name="password" id="inputPassword" class="form-control" placeholder="Password" >
              <label for="inputPassword">Password</label>
            </div>
            <div class="form-label-group red"><?php  echo $passwordErr; ?></div>
          </div>
          <!-- <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="cheak" value="remember-me">
                Remember Password
              </label>
            </div>
          </div> -->
          <button type="submit" class="btn btn-primary btn-block" name="submit" >Login</button>
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
