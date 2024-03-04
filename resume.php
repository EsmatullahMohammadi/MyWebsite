<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="HTML ,CSS ,JavaScript, Software Enginier" />
        <meta name="author" content="Esmatullah Mohammadi" />
        <title>Resume</title>
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
    </head>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
            include_once("header.php");
            ?>
            <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Resume</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0">Experience</h2>
                                <!-- Download resume button-->
                                <!-- Note: Set the link href target to a PDF file within your project-->
                                <a class="btn btn-primary px-4 py-3" href="pdf/myCV.pdf" download>
                                    <div class="d-inline-block bi bi-download me-2"></div>
                                    Download Resume
                                </a>
                            </div>
                            <!-- Experience Card 1-->
                            <?php
                                require_once("Admine\database.php");
                                $sql="SELECT * FROM resumeexperience WHERE experience_id = 1";
                                $result=mysqli_query($connect,$sql);
                                while($row=mysqli_fetch_assoc($result)){
                                    echo '
                          
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-primary fw-bolder mb-2">'. $row["years"] .' </div>
                                                <div class="small fw-bolder">'.$row["skill1"].'  </div>
                                                <div class="small fw-bolder ">'.$row["skill2"].'  </div>
                                                <div class="small text-muted">'.$row["adress"].'</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">'.$row["information"] ; }?><div>
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Experience Card 2-->
                            <?php
                                $sql1="SELECT * FROM resumeexperience WHERE experience_id = 2";
                                $result1=mysqli_query($connect,$sql1);
                                while($row=mysqli_fetch_assoc($result1)){
                                    echo '
                            
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-primary fw-bolder mb-2">'. $row["years"] .'</div>
                                                <div class="small fw-bolder">'.$row["skill1"].' </div>
                                                <div class="small fw-bolder">'.$row["skill2"].' </div>
                                                <div class="small text-muted">'.$row["adress"].'</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">'.$row["information"] ; } ?><div>
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Education Section-->
                        <section>
                            <h2 class="text-secondary fw-bolder mb-4">Education</h2>
                            <!-- Education Card 1-->
                            <?php  
                            $sql="SELECT * FROM resumeeducation WHERE education_id = 1";
                            $result=mysqli_query($connect,$sql);
                            while($row=mysqli_fetch_assoc($result)){
                                echo '
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-secondary fw-bolder mb-2">'. $row["years"] .'</div>
                                                <div class="mb-2">
                                                    <div class="small fw-bolder">'. $row["university"] .'</div>
                                                    <div class="small text-muted">'. $row["city"] .'</div>
                                                </div>
                                                <div class="fst-italic">
                                                    <div class="small text-muted">'. $row["education"] .'</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">'. $row["information"];}?><div>
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Education Card 2-->
                            <?php  
                            $sql="SELECT * FROM resumeeducation WHERE education_id = 2";
                            $result=mysqli_query($connect,$sql);
                            while($row=mysqli_fetch_assoc($result)){
                                echo '
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-secondary fw-bolder mb-2">'. $row["years"] .'</div>
                                                <div class="mb-2">
                                                    <div class="small fw-bolder">'. $row["university"] .'</div>
                                                    <div class="small text-muted">'. $row["city"] .'</div>
                                                </div>
                                                <div class="fst-italic">
                                                    <div class="small text-muted">'. $row["education"] .'</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">'. $row["information"];}?><div>
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Divider-->
                        <div class="pb-5"></div>
                        <!-- Skills Section-->
                        <section>
                            <!-- Skillset Card-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <!-- Professional skills list-->
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Professional Skills</span></h3>
                                        </div>
                                        <?php  
                                            $sql="SELECT * FROM language WHERE id = 1";
                                            $result=mysqli_query($connect,$sql);
                                            while($row=mysqli_fetch_assoc($result)){
                                                echo '
                                        <div class="row row-cols-1 row-cols-md-3 mb-4">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["one"] .'</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["two"] .'</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["three"] .'</div></div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["four"] .'</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["five"] .'</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["six"];} ?></div></div>
                                        </div>
                                    </div>
                                    <!-- Languages list-->
                                    <div class="mb-0">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-code-slash"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Languages</span></h3>
                                        </div>
                                        <?php  
                                            $sql="SELECT * FROM language WHERE id = 2";
                                            $result=mysqli_query($connect,$sql);
                                            while($row=mysqli_fetch_assoc($result)){
                                                echo '
                                        <div class="row row-cols-1 row-cols-md-3 mb-4">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["one"] .'</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["two"] .'</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["three"] .'</div></div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3">
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["four"] .'</div></div>
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["five"] .'</div></div>
                                            <div class="col"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">'. $row["six"];}?></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <?php
        include_once("footer.php");
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
