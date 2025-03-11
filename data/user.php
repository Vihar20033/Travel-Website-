<?php

$insert = false;
$update = false;
$delete = false;
$showError = false;

// Connect to the Database
require('../required-file/dbconnection.php');


if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM user WHERE no = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $firstname = $_POST["firstnameEdit"];
        $lastname = $_POST["lastnameEdit"];
        $suemail = $_POST["suemailEdit"];
        $supassword = $_POST["supasswordEdit"];
        // Sql query to be executed
        $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$suemail', password = '$supassword' WHERE user.no = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "We could not update the record successfully";
        }
    } 
    else{
      
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $suemail = $_POST["suemail"];
      $supassword = $_POST["supassword"];
  
      $existSql = "SELECT * FROM `user` WHERE email = '$suemail'";
      $result = mysqli_query($conn, $existSql);
      $numExistRows = mysqli_num_rows($result);
      if($numExistRows > 0){
          setcookie("emailerror", "true", time() + 1, "/");
          header("location: ../user/sighup.php");
      }
      else{
        
        $sql = "INSERT INTO user(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname', '$lastname', '$suemail', '$supassword')";
        $result = mysqli_query($conn, $sql);
        setcookie("emailerror", "false", time() + 1, "/");
        if (!$result) {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
        else{
          require "../email/sighup-email.php";
          header("location: ../user/login.php");
        }
        
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">


    <title>User Data</title>

</head>

<body>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="../data/user.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <table>
                            <tr>
                                <td>
                                    <h4>First Name</h4>
                                </td>
                                <td>:-</td>
                                <td><input type="text" name="firstnameEdit" id="firstnameEdit" required></td>
                            </tr>

                            <tr>
                                <td>
                                    <h4>Last Name</h4>
                                </td>
                                <td>:-</td>
                                <td><input type="text" name="lastnameEdit" id="lastnameEdit" required></td>
                            </tr>

                            <tr>
                                <td>
                                    <h4>Email</h4>
                                </td>
                                <td>:-</td>
                                <td><input type="email" name="suemailEdit" id="suemailEdit" required></td>
                            </tr>

                            <tr>
                                <td>
                                    <h4>password</h4>
                                </td>
                                <td>:-</td>
                                <td><input type="text" name="supasswordEdit" id="supasswordEdit" required></td>
                            </tr>

                        </table>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Data has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
    <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Data has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  
  ?>



    <div class="container my-4">


        <table class="table" id="myTable" border=2>
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">firstname</th>
                    <th scope="col">lastname</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        
          $sql = "SELECT * FROM `user`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['firstname'] . "</td>
            <td>". $row['lastname'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['password'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['no'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['no'].">Delete</button>  </td>
          </tr>";
        } 
      
          ?>


            </tbody>
        </table>
    </div>
    <hr>

    <div class="container01">
        <div class="container02">

            <form method="post" action="../converter/pdf-folder/pdf.php">
                <button name="pdf_user" class="pdf">Pdf</button>
            </form>

            <form method="post" action="../converter/excel.php">
                <button name="excel_user" class="excel">Excel</button>
            </form>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            firstname = tr.getElementsByTagName("td")[0].innerText;
            lastname = tr.getElementsByTagName("td")[1].innerText;
            suemail = tr.getElementsByTagName("td")[2].innerText;
            supassword = tr.getElementsByTagName("td")[3].innerText;
            console.log(firstname, lastname, suemail, supassword);
            firstnameEdit.value = firstname;
            lastnameEdit.value = lastname;
            suemailEdit.value = suemail;
            supasswordEdit.value = supassword;
            snoEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this Data!")) {
                console.log("yes");
                window.location = `/project/data/user.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
</body>

</html>