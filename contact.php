<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Comunicate with me" />
        <meta name="author" content="Esmatullah Mohammadi" />
        <title>Comunicate with me</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/Esmat1.png" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .text-red{
                color:red;
            }
        </style>
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
            include_once("header.php");
            ?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->

                                <!-- php code -->
                                <?php
                                    $name="";$lastname="";$email="";$phone="";$message="";$sumbission="";$eror="";
                                    $nameErr="";$lastnameErr="";$emailErr="";$phoneErr="";$messageErr="";

                                    

                                    if(isset($_POST['submit'])){
                                        $name=$_POST['firstname'];    $lastname=$_POST['lastname'];
                                        $email=$_POST['email'];       $phone=$_POST['phone'];
                                        $message=$_POST['message'];
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
                                        }
                                        //phone number validation
                                        if(empty($phone)){
                                            $phoneErr="phone number is required!";
                                        }else{
                                            $phone=test_input($phone);
                                            if(!preg_match("/^[0]+[0-9]+$/",$phone)){
                                                $phoneErr="phone number is not valid!";
                                            }
                                            if(strlen($phone)>15&&strlen($phone)<10){
                                                $phoneErr="the lenght of your phone number is is not valid!";
                                            }
                                        }
                                       //message validation 
                                       if(empty($message)){
                                            $messageErr="message is required!";
                                        }else{
                                            $message=test_input($message);
                                            if(!preg_match("/^[a-zA-Z\s]+(,\s?[a-zA-Z\s]*)*$/",$message)){
                                                $messageErr="your message is not valid!!";
                                        }
                                      }
                                     // insert into databse
                                     if($nameErr==""&&$lastnameErr==""&&$emailErr==""&&$phoneErr==""&&$messageErr==""){
                                        require_once("Admine/database.php");
                                        $name=mysqli_real_escape_string($connect,$name);
                                        $lastname=mysqli_real_escape_string($connect,$lastname);
                                        $email=mysqli_real_escape_string($connect,$email);
                                        $phone=mysqli_real_escape_string($connect,$phone);
                                        $message=mysqli_real_escape_string($connect,$message);
                                        $sql="INSERT INTO costumers(costumer_id,first_name,last_name,email_adress,phone_number,message)
                                         VALUES(default,'$name','$lastname','$email','$phone','$message')";
                                        $connect->query($sql);
                                        
                                        // $connect->close();

                                        $name=$lastname=$email=$message=$phone="";
                                        $sumbission="Form submited successfully!";
                                        
                                     }else{
                                        $eror="Error sending message!";
                                     }
                                    }
                                    
                                    
                                    
                                    function test_input($data){
                                        $data = trim($data);
                                        $data = stripcslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                    }
                                
                                ?>
                                    
                                <form id="contactForm" method="POST" data-sb-form-api-token="API_TOKEN">
                                    <!-- hidden id -->
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" value="<?php echo $name ?>" id="name" name="firstname" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">First name</label>
                                        <div class="text-red" ><?php echo $nameErr;  ?> </div>
                                    </div>
                                    <!-- Last name -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" value="<?php echo $lastname ?>" id="name" name="lastname" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Last name</label>
                                        <div class="text-red"> <?php echo $lastnameErr;  ?></div>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" value="<?php echo $email ?>" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                        <label for="email">Email address</label>
                                        <div class="text-red"><?php echo $emailErr;  ?></div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" value="<?php echo $phone ?>" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                        <label for="phone">Phone number</label>
                                        <div class="text-red"><?php echo $phoneErr;  ?></div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" value="<?php echo $message ?>" id="message" name="message" type="textarea" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="message">Message &middot;<span style="font-size:80%;">don't use any special character</span></label>
                                        <div class="text-red"><?php echo $messageErr;;  ?></div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div  id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder" Style="color:blue"><?php echo $sumbission; ?></div> 
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div  id="submitErrorMessage">
                                        <div class="text-center text-danger mb-3"><?php echo $eror; ?></div>
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg enabled" name="submit" id="submitButton" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php
        require_once("Admine/database.php");
        include_once("footer.php");
        // $connect->close();
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
