<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:login.php");
  exit();
}
require_once("database.php");
$fullName=$instagram=$youtupe=$facebook=$image="";
$nameError=$imageError=$succes="";
    
    if(isset($_POST['submit'])){
        $fullName=$_POST['fullName'];
        $instagram=$_POST['instagram'];
        $youtupe=$_POST['youtupe'];
        $facebook=$_POST['facebook'];
        //name vallidation
        if(empty($_POST['fullName'])){
            $nameError="your fullName is requird";
        }  
        //eerror ocured here 
        //when i don't set the photo but this condition is true
        if(isset($_FILES['image'])&& $nameError==""){
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        }else{
            $imageError="please choose your photo!";
        }
    
        if($imageError==""&&$nameError==""){
            $sql="UPDATE changehome SET name='$fullName' , image='$image', instagrame='$instagram',youtupe='$youtupe',facebook='$facebook';";
            $result=mysqli_query($connect,$sql);
            if($result){
            $succes="data updated successfuly!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Tables</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <Style>
        .exper{
            display:inline-block;
            background-color:rgb(222,223,221);
            margin: 4%;
            width:70%;
            border-radius:5%;
            margin-top:none;
            margin-bottom:none;
        }
        #submit{
            width=50px;
        }
        .red{
            color:red;
        }
       
    </Style>

    <title>Change your homePage</title>
</head>
<body style="background-color:rgb(229,229,229)" id="page-top">
    <?php
      include("header.php");
    ?>
    <div id="wrapper">
        <?php
        include_once("slidebar.php");
        ?>
        
         <!-- change Eperience  -->
        <div class="exper" >
        <h1 align=center >Change your homePage</h1>
            <h2 align="center">Change your homePage</h2>
                <form method="POST" Style="font-size:17px" enctype="multipart/form-data">
                    <pre >
                    write your Fullname:       <input type="text" name="fullName"  value='Esmatullah "Mohammadi"' size=50><span class="red">*<?php echo $nameError;  ?></span><br><br>
                    write your instagram link: <input type="text" name="instagram"  value="https://www.instagram.com/esmatullah8995" size=50><br><br>
                    write your YouTupe link:   <input type="text" name="youtupe"  value="https://youtube.com/@esmatullahmohammadi9685?si=FgTvvKOOmpw0KLqL" size=50><br><br>
                    write your FaceBook link:  <input type="text" name="facebook"  value="https://www.facebook.com/mohammadi.esmatullah.7" size=50><br><br>
                    Choose your profile photo:     <input type="file" name="image" value="your photo"><span class="red">*<?php echo $imageError;  ?>
                                       
                        <div align=center style="color:blue"><?php echo $succes;  ?></div>
                    <input id="submit" type="submit"  name="submit" value="submit">
                    </pre>
                    
                </form>
                    
    
        </div>
    </div>
       
    <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Admine panel of my personal page</span>
          </div>
        </div>
      </footer>

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logge out.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
     
   
    
</body>
</html>