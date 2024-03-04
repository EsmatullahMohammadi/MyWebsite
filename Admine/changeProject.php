<?php

session_start();
  if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit();
  }



require_once("database.php");
$names=$infomations=$filename=$files=$success="";
$imagesError="";
//insert into database
if(isset($_POST['sumbits'])){
    $names=$_POST['project_names'];
    $infomations=$_POST['informations'];

    $target_path = './project images/';
    $valid_extension = array("jpeg", "jpg", "png", "gif");
    
        $file_array = explode(".", $_FILES['images']['name']);
        $file_ext = strtolower(end($file_array));
        if(in_array($file_ext, $valid_extension)){
            $files=time().$_FILES['files']['name'];
            $destinations=$target_path.$files;
            move_uploaded_file($_FILES['files']['tmp_name'], $destinations);
            
            $filename = time().".".$file_ext;
            $destination = $target_path . $filename;
            move_uploaded_file($_FILES['images']['tmp_name'], $destination);
            
                $sql = "INSERT INTO project values (default, '$names', '$infomations', '$filename','$files');";
                if(mysqli_query($connect, $sql)){
                    $success="data successfully inserted in databse";
                }

        }else{
            $imagesError="please choose an image";
        }

}
//ubdate database
$file=$error=$suc="";
if(isset($_POST['sumbit'])){
    $name=$_POST['project_name'];
    $infomation=$_POST['information'];
    $id=$_POST['project_id'];

    $target_path = './project images/';
    $valid_extension = array("jpeg", "jpg", "png", "gif");
    
        $file_array = explode(".", $_FILES['image']['name']);
        $file_ext = strtolower(end($file_array));
        if(in_array($file_ext, $valid_extension)){
            $file=time().$_FILES['file']['name'];
            $destination=$target_path.$file;
            move_uploaded_file($_FILES['file']['tmp_name'], $destination);

            $filename = time().".".$file_ext;
            $destination = $target_path . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            
                $sql = "UPDATE project SET project_name = '$name', project_information = '$infomation',
                project_image='$filename',project_file='$file' WHERE project_id = $id";;
                if(mysqli_query($connect, $sql)){
                    $suc="data successfully ubdated in databse";
                }

        }else{
            $error="please choose an image";
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
    

    <style>
        body{
            background-color:rgb(232,233,231);
            
        }
        .center{
          
            background-color:rgb(229,229,229);
            
        }
        .a{
            /* /* display: inline-block; */
            background-color:rgb(222,222,222);
            border-radius:5%;*/
            width:50%; 
            padding:4.9%;
            align:center; 
            margin-left:200px;
            margin-bottom:60px;
        
        }
    </style>
    <meta charset="UTF-8">
    <title>change projects</title>
</head>
<body id="page-top">
    <?php
      include("header.php");
    ?>
   <div id="wrapper">
        <?php
        include_once("slidebar.php");
        ?>
     <div class="center">
    
      <h1 align="center">Change your projects</h1>
        <div class="a">
        <h2 align="center">update your projects</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                write your project name: <input type="text" name="project_name"><br><br>
                write your infromation: <br>   <textarea name="information" id="" cols="30" rows="10"></textarea><br><br>
                choose an image for your project: <input type="file" name="image"><br><br>
                choose your project file:         <input type="file" name="file"><br><br>
                select witch project you want to ubdate:
                                    <select name="project_id">
                                        <?php
                                        require_once("database.php");
                                        $s="SELECT * FROM project";
                                        $resul=mysqli_query($connect,$s);
                                        while($roww=mysqli_fetch_assoc($resul)){
                                        echo '
                                        <option value="'.$roww["project_id"].'">'. $roww["project_name"].'</option>
                                        ';}?>
                                    </select><br>
                                    <div style="color:red"><?php echo $error; ?> <span style="color:blue"><?php echo $suc; ?></span></div>
                <input type="submit" name="sumbit" value="update project">
            </form>   
        </div>
    
        <div class="a">
        <h2 align="center">add your projects</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                write your project name: <input type="text" name="project_names" value="Calculator"><br><br>
                write your infromation: <br>   <textarea name="informations" id="" cols="30" rows="10">It was my first project i maked this application with java programming Language. It is very strong Calculator, it can calculate five operation of math and can calculate the all operation of trigomitry and also square root and some else.</textarea><br><br>
                choose an image for your project: <input type="file" name="images"><br><br>
                choose your project file:         <input type="file" name="files"><br><br>
                <div style="color:red"><?php echo $imagesError; ?> <span style="color:blue"><?php echo $success; ?></span></div>
                <br>
                <input type="submit" name="sumbits" value="Add Project">
                
            </form>
            
        </div>
        
    
        <?php
        $a=$b="";
        if(isset($_POST['delete'])){
            require_once("database.php");
            $ID=$_POST['project_id'];
            $q="DELETE  FROM project WHERE project_id=$ID";
            $end=mysqli_query($connect,$q);
            if($end){
                $a="your project delete sucessfully";
            }else{
                $b="Error Occurred!";
            }
        }
        ?>

        <div class="a"  style="background-color:rgb(222,222,222);" width=100%>
            <center>
              <h2 align=center>Delete a project</h2>
               select witch project you want to ubdate:
                <form action="" method="POST"> 
                                        <select name="project_id">
                                            <?php
                                            require_once("database.php");
                                            $s="SELECT * FROM project";
                                            $resul=mysqli_query($connect,$s);
                                            while($roww=mysqli_fetch_assoc($resul)){
                                            echo '
                                            <option value="'.$roww["project_id"].'">'. $roww["project_name"].'</option>
                                            ';}?>
                                    </select>
                    <br><br>
                    <div style="color:red"><?php echo $b; ?> <span style="color:blue"><?php echo $a; ?></span></div>
                    <br>
                    <input type="submit" name="delete" value="delete the project"><br><br>
                </form> 
            </center>
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






