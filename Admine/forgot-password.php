
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<?php
  require_once("database.php"); 
  $email=$emailErr="";
  if(isset($_POST['submit'])){
    $email=$_POST['email'];

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
              $emailErr="";
              $connect->query("DELETE passwords FROM ragister WHERE email_adress=$email");
              header("Location:login.php");
            }else{
              $emailErr="your email is not ragistered!";
            }
        }
      }else{
        $email="your email_adress is not valid!";
      }
    }
  }
function test_input($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" value="<?php echo $email;?> " id="inputEmail" class="form-control" placeholder="Enter email address"  autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
            <div class="form-label-group" Style="color:red;"><?php echo $emailErr;  ?> </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit" >Reset Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
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
