<?php

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

require_once("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM costumers WHERE costumer_id = $delete_id";
    mysqli_query($connect, $delete_query);
}

?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <!-- Table header and body code remains the same as before -->

            <tbody>
                <?php
                $sql = "SELECT * FROM costumers";
                $result = mysqli_query($connect, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                      <td>" . $row['costumer_id'] . "</td>
                      <td>" . $row['first_name'] . "</td>
                      <td>" . $row['last_name'] . "</td>
                      <td>" . $row['email_adress'] . "</td>
                      <td>" . $row['phone_number'] . "</td>
                      <td>" . $row['message'] . "</td>
                      <td><button class='btn btn-danger p-2 ml-2' onclick='deleteRow(" . $row['costumer_id'] . ")'>Delete</button></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

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
