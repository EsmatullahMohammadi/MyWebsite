<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit();
}

require_once('database.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
  $delete_id = $_POST['delete_id'];
  $delete_query = "DELETE FROM ragister WHERE ragister_id = $delete_id";
  mysqli_query($connect, $delete_query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- header -->
    <?php
    include("header.php");
    ?>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once("slidebar.php");
        ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Data Table Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Email address</th>
                                        <th>Password</th>
                                        <th>Confirm Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Email address</th>
                                        <th>Password</th>
                                        <th>Confirm Password</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM ragister";
                                    $result = mysqli_query($connect, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "
                                        <tr>
                                          <td>" . $row['ragister_id'] . "</td>
                                          <td>" . $row['first_name'] . "</td>
                                          <td>" . $row['last_name'] . "</td>
                                          <td>" . $row['email_adress'] . "</td>
                                          <td>" . $row['passwords'] . "</td>
                                          <td>" . $row['confirm_password'] . "</td>
                                          <td><button class='btn btn-danger p-2 ml-2' onclick='deleteRow(" . $row['ragister_id'] . ")'>Delete</button></td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated in <?php date_default_timezone_set("Asia/Kabul");
                                                                        if ($result) {
                                                                            echo date("Y/m/d   h:i:s");
                                                                        }  ?> </div>
                </div>

                <p class="small text-center text-muted my-5">
                    <em>More table examples coming soon...</em>
                </p>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Admin panel of my personal page</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Delete row script -->
    <script>
        const deleteRow = (id) => {
            if (confirm('Are you sure you want to delete this record?')) {
                // Send AJAX request to delete the record
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // Reload the page or update the table after successful deletion
                        location.reload();
                    }
                };
                xhttp.open("POST", "", true); // An empty string for the URL indicates the same file
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("delete_id=" + id);
            }
        }
    </script>

</body>

</html>
