<?php

session_start();
  if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit();
  }


    $experienceSuccess=$educationSuccess=$error=$errorr="";
    //change the experience in the resume page 
    if(isset($_POST['submit'])){
        $id=$_POST['experience_id'];
        $year=$_POST['year'];
        $skill1=$_POST['skill1'];
        $skill2=$_POST['skill2'];
        $city=$_POST['city'];
        $information=$_POST['information'];
        require_once("database.php");
        $sql = "UPDATE resumeexperience SET years = '$year', skill1 = '$skill1',
        skill2='$skill2',adress='$city',information='$information' WHERE experience_id = $id";
        $result=mysqli_query($connect,$sql);
        $connect->close();
        if($result){
            $experienceSuccess="Successfully changed!";
        }
        else{
            $errorr="Error Occured!";
        }
    }
    // change the education in resume page
    if(isset($_POST['submits'])){
        $id=$_POST['experience_ids'];
        $year=$_POST['years'];
        $university=$_POST["universitys"];
        $education=$_POST['educations'];
        $city=$_POST['citys'];
        $information=$_POST['informations'];
        require_once("database.php");
        $sql = "UPDATE resumeeducation SET years = '$year', university = '$university',
        city='$city', education='$education' ,information='$information' WHERE education_id= $id";
        $result=mysqli_query($connect,$sql);
        $connect->close();
        if($result){
            $educationSuccess="Successfully changed!";
        }
        else{
            $error="Error Occured!";
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
            
            background-color:rgb(222,222,222);
            border-radius:5%;*/
            width:80%; 
            padding:4.9%;
            align:center; 
            margin:100px;

        }
        #a{
          width:100%;
        }
        
    </Style>

    <title>change the resume</title>
</head>
<body style="background-color:rgb(240,240,240)" id="page-top">
    <?php
      include("header.php");
    ?>
    
    
    <!-- change Eperience  -->
    <div id="wrapper">
        <?php
        include_once("slidebar.php");
        ?>
        <!-- <h1 >Change your Resume Page</h1> -->
        
       <div id="a">
        <div class="exper" >
         <h2 align="center">Change Experience</h2>
            <form method="POST">
                <pre >
                write duration of year: <input type="text" name="year" id="year" value="2023-present"><br><br>
                write your Skill one:   <input type="text" name="skill1" id="skill1" value="Web Developer" ><br><br>
                write your Skill two:   <input type="text" name="skill2" id="skill2" value="sotware Enginier" ><br><br>
                write your city:        <input type="text" name="city" id="city" value="kabul,Afghanistan" ><br><br>
                write your information: <br>
                <textarea name="information" id="information" cols="30" rows="10" >Know i am a student in Kabul Polytecnic university, and i am a web developer i work online project of Web, and also i am Software Enginier. I use java programming Language in my desktop application.</textarea>
                select which experience do you wanto change: 
                                    <select name="experience_id">
                                        <option value="1">Experience one</option>
                                        <option value="2">Experience two</option>
                                    </select>
                                    <div Style="color:blue; text-align:center;"><?php echo $experienceSuccess  ?><span style="color:red"><?php echo $errorr; ?></span></div>
                <input type="submit"  name="submit" value="submit">
                </pre>
                
            </form>
        </div>
    
        <!-- change education -->
        <div class="exper">
          <h2 align="center">Change Education</h2>
            <form method="POST">
                <pre >
                write duration of year :   <input type="text" name="years"  value="2021-present"><br><br>
                write where you educate:   <input type="text" name="universitys"  value="KPU university" ><br><br>
                write your city :          <input type="text" name="citys"  value="Kabul ,Afghanistan" ><br><br>
                write your eduction:       <input type="text" name="educations"  value="licence of Computer Science" ><br><br>
                write your information: <br>
                <textarea name="informations" id="information" cols="30" rows="10" >I start the university in 2021 in Polytecnic university at computer Science faculte.know i am an a web developer and java programmer.</textarea>
                select which experience do you wanto change: 
                                    <select name="experience_ids">
                                        <option value="1">education one</option>
                                        <option value="2">ducation two</option>
                                    </select>
                                    <div style="color:blue; " align=center><?php echo $educationSuccess; ?><span style="color:red"><?php echo $error; ?></span></div>
                <input type="submit"  name="submits" value="submit">
                </pre>
                
            </form>
        </div>
    
        <!-- change profisinal skill -->
        <?php
        $success=$er="";
        if(isset($_POST['submitss'])){
        $one=$_POST['one'];
        $two=$_POST["two"];
        $three=$_POST['three'];
        $four=$_POST['four'];
        $five=$_POST['five'];
        $six=$_POST['six'];
        require_once("database.php");
        $sql = "UPDATE language SET one = '$one', two = '$two',three='$three',
        four='$four', five='$five' ,six='$six' WHERE id= 1";
        $result=mysqli_query($connect,$sql);
        $connect->close();
        if($result){
            $success="Successfully changed!";
        }
        else{
            $er="Error Occured!";
        }
    } $s=$e="";
    if(isset($_POST['submitsss'])){
            $one=$_POST['onel'];
            $two=$_POST["twol"];
            $three=$_POST['threel'];
            $four=$_POST['fourl'];
            $five=$_POST['fivel'];
            $six=$_POST['sixl'];
            require_once("database.php");
            $sql = "UPDATE language SET one = '$one', two = '$two',three='$three',
            four='$four', five='$five' ,six='$six' WHERE id= 2";
            $result=mysqli_query($connect,$sql);
            $connect->close();
            if($result){
                $s="Successfully changed!";
            }
            else{
                $e="Error Occured!";
            }
    }
    ?>
        
        <div class="exper">
          <h2 align=center>Professional Skills</h2>
            <form method="POST">
                <pre >
                skill one :   <input type="text" name="one"  value="JAVA Programming"><br>
                skill two :   <input type="text" name="two"  value="Statistical Analysis"><br>
                skill three:  <input type="text" name="three"  value="Web Development"><br>
                skill four:   <input type="text" name="four"  value="Network Security" ><br>
                skill five:   <input type="text" name="five"  value="Adobe Software Suite" ><br>
                skill six:    <input type="text" name="six"  value="User Interface Design" ><br>
                            <div style="color:blue;" align=center><?php echo $success; ?><span style="color:red;"><?php echo $er;?></span></div>
                <input type="submit"  name="submitss" value="submit">
                </pre>
                
            </form>
        </div>
        <div class="exper">
          <h2 align=center>Languages</h2>
            <form method="POST">
                <pre >
                language one :   <input type="text" name="onel"  value="HTML"><br>
                language two :   <input type="text" name="twol"  value="CSS"><br>
                language three:  <input type="text" name="threel"  value="JavaScript"><br>
                language four:   <input type="text" name="fourl"  value="Python" ><br>
                language five:   <input type="text" name="fivel"  value="PHP" ><br>
                language six:    <input type="text" name="sixl"  value="C++" ><br>
                <div style="color:blue;" align=center><?php echo $s; ?><span style="color:red;"><?php echo $e;?></span></div>
                <input type="submit"  name="submitsss" value="submit">
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