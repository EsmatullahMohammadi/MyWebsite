
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Register</title>
 <Style>
   .error{
     color:red;
   }
 </Style>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>



<body class="bg-dark">
                                  <?php
                                    require_once("database.php"); 
                                    $name="";$lastname="";$email="";$password="";$confirm="";$sumbission="";$eror="";
                                    $nameErr="";$lastnameErr="";$emailErr="";$passwordErr="";$confirmErr="";

                                    

                                    if(isset($_POST['submit'])){
                                        $name=$_POST['firstname'];    $lastname=$_POST['lastname'];
                                        $email=$_POST['email'];       $password=$_POST['password'];
                                        $confirm=$_POST['confirm'];
                                        //name validation
                                        if(empty($name)){
                                            $nameErr="name is required!";
                                        }else{
                                            $name=test_input($name);
                                           if(!preg_match("/^[a-zA-Z\s]+$/",$name)){
                                              $nameErr="your name is not valid!";
                                           }
                                           if(strlen($name)>32){
                                               $nameErr="the lenght of yoru name is so long!";
                                           }
                                        }
                                        //last name validation
                                        if(empty($lastname)){
                                            $lastnameErr="last name is required!";
                                        }else{
                                            $lastname=test_input($lastname);
                                            if(!preg_match("/^[a-zA-Z\s]+$/",$lastname)){
                                                $lastnameErr="your lastname is not valid!";
                                            }
                                            if (strlen($lastname)>32){
                                                $lastnameErr="the lenght of your last name is so long!";
                                            }
                                        }
                                        // email validation
                                        if(empty($email)){
                                            $emailErr="email is required!";
                                        }else{
                                            $email=test_input($email);
                                            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                                                $emailErr="email is not valid!";
                                            }
                                            if(strlen($email)>100){
                                                $emailErr="the lenght of your email is so long!";
                                            }
                                              $exist="SELECT * FROM ragister";
                                              $arr=mysqli_query($connect,$exist);
                                              while($rows=mysqli_fetch_assoc($arr)){
                                                  if($rows['email_adress']==$email){
                                                    $emailErr="This email_adress already ragistered!";
                                                  }
                                              }
                                        }
                                        //password validation
                                        if(empty($password)){
                                            $passwordErr="password is required!";
                                        }else{
                                            $password=test_input($password);
                                            if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
                                                $passwordErr="your password shoud be atlest 8 character and include uppercase, lowercase letter, number and special character without #";
                                            }
                                        }
                                       //confirm password validation 
                                       if(empty($confirm)){
                                            $confirmErr="confirm your password!";
                                        }else{
                                            $confirm=test_input($confirm);
                                            if($password!=$confirm){
                                                $confirmErr="your confirm password is not valid!";
                                        }
                                      }
                                     // insert into databse
                                     if($nameErr==""&&$lastnameErr==""&&$emailErr==""&&$passwordErr==""&&$confirmErr==""){
                                       
                                        
                                        $name=mysqli_real_escape_string($connect,$name);
                                        $lastname=mysqli_real_escape_string($connect,$lastname);
                                        $email=mysqli_real_escape_string($connect,$email);
                                        $password=mysqli_real_escape_string($connect,$password);
                                        $confirm=mysqli_real_escape_string($connect,$confirm);
                                        $sql="INSERT INTO ragister(ragister_id,first_name,last_name,email_adress,passwords,confirm_password)
                                         VALUES(default,'$name','$lastname','$email','$password','$confirm')";
                                        $connect->query($sql);
                                        $connect->close();
                                        

                                        $name=$lastname=$email=$password=$confirm=""; 
                                        $sumbission="Welcome";
                                        header("Location:Login.php");
                                        
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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="firstname" value="<?php echo $name; ?>"  class="form-control" placeholder="First name"  autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
                <div class="form-label-group error"> <?php echo $nameErr; ?> </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lastname" value="<?php echo $lastname; ?>"  class="form-control" placeholder="Last name"  >
                  <label for="lastName">Last name</label>
                </div>
                <div class="form-label-group error"> <?php echo $lastnameErr; ?> </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email"  value="<?php echo $email; ?>"  class="form-control" placeholder="Email address" >
              <label for="inputEmail">Email address</label>
            </div>
            <div class="form-label-group error"> <?php echo $emailErr; ?> </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" value="<?php echo $password; ?>"  class="form-control" placeholder="Password" >
                  <label for="inputPassword">Password</label>
                </div>
                <div class="form-label-group error"> <?php echo $passwordErr; ?> </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="confirm" value="<?php echo $confirm; ?>"  class="form-control" placeholder="Confirm password">
                  <label for="confirmPassword">Confirm password</label>
                </div>
                <div class="form-label-group error"> <?php echo $confirmErr; ?> </div>
              </div>
            </div>
          </div>
            <div Style="color:blue;" align="center"><?php  $sumbission; ?></div>
          <button type="submit" class="btn btn-primary btn-block" name="submit" >Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
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
