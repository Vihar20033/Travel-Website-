<?php

$insert = false;
$update = false;
$delete = false;

// Connect to the Database
require('../required-file/dbconnection.php');

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM booking WHERE no = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $username = $_POST["nameEdit"];
        $email = $_POST["emailEdit"];
        $phone = $_POST["phoneEdit"];
        $age = $_POST["ageEdit"];
        $gender = $_POST["genderEdit"];
        $departure = $_POST["departureEdit"];
        $returndate = $_POST["returndateEdit"];
        $destination = $_POST["destinationEdit"];
        $package = $_POST["packageEdit"];

        // Sql query to be executed
        $sql = "UPDATE booking SET name = '$username', email = '$email', phone = '$phone', age = '$age', gender = '$gender', departure = '$departure', returndate = '$returndate', destination = '$destination', package = '$package' WHERE booking.no = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "We could not update the record successfully";
        }
    } 
    else{
        $username = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $departure = $_POST["departure"];
        $returndate = $_POST["returndate"];
        $destination = $_POST["destination"];
        $package = $_POST["package"];

        // Sql query to be executed
        $sql = "INSERT INTO booking(`name`, `email`, `phone`, `age`, `gender`, `departure`, `returndate`, `destination`, `package`) VALUES ('$username','$email','$phone','$age','$gender','$departure','$returndate','$destination','$package')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true; 

            require "../email/booking-email.php";
            header("location: ../website.php");

        } else {

            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        
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


  <title>Booking Data</title>

</head>

<body>


  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Booking Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="../data/booking.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <table>
              <tr>
                <td><h4>Name</h4></td>
                <td>:-</td>
                <td><input type="text" name="nameEdit" placeholder="Name" id="nameEdit" required></td>
              </tr>
              
              <tr>
                <td><h4>Email</h4></td>
                <td>:-</td>
                <td><input type="email" name="emailEdit" placeholder="Email-Id" id="emailEdit" required></td>
              </tr>
              
              <tr>
                <td><h4>Phone no.</h4></td>
                <td>:-</td>
                <td><input type="tel" name="phoneEdit" placeholder="Phone No." id="phoneEdit" required></td>
              </tr>
              
              <tr>
                <td><h4>Age</h4></td>
                <td>:-</td>
                <td><input type="number" name="ageEdit" placeholder="Age" id="ageEdit" required></td>
              </tr>
              
              <tr>
                <td><h4>Gender</h4></td>
                <td>:-</td>
                <td><input type="radio" name="genderEdit" value="Male" id="genderEdit" required> Male
                  <input type="radio" name="genderEdit" value="Female" id="genderEdit"> Female
                </td>
              </tr>
              
              <tr>
                <td><h4>Departure</h4></td>
                <td>:-</td>
                <td><input type="datetime-local" name="departureEdit" id="departureEdit" required></td>
              </tr>
              
              <tr>
                <td><h4>Return</h4></td>
                <td>:-</td>
                <td><input type="datetime-local" name="returndateEdit" id="returndateEdit" required></td>
              </tr>
            </table>
            <h4>Travel Destination</h4>
            <input type="radio" name="destinationEdit" value="Kashmir" id="destinationEdit"> Kashmir &nbsp; &nbsp;
            &nbsp;
            <input type="radio" name="destinationEdit" value="Istanbul" id="destinationEdit"> Istanbul &nbsp; &nbsp;
            &nbsp;
            <input type="radio" name="destinationEdit" value="Paris" id="destinationEdit"> Paris &nbsp; &nbsp; &nbsp;
            <input type="radio" name="destinationEdit" value="Bali" id="destinationEdit"> Bali &nbsp; &nbsp; &nbsp;
            <input type="radio" name="destinationEdit" value="Dubai" id="destinationEdit"> Dubai <br>
            <input type="radio" name="destinationEdit" value="Geneva" id="destinationEdit"> Geneva &nbsp; &nbsp; &nbsp;
            <input type="radio" name="destinationEdit" value="Port Blair" id="destinationEdit"> Port Blair &nbsp; &nbsp;
            &nbsp;
            <input type="radio" name="destinationEdit" value="Rome" id="destinationEdit"> Rome &nbsp; &nbsp; &nbsp;
            <input type="radio" name="destinationEdit" value="Gujarat" id="destinationEdit"> Gujarat &nbsp; &nbsp;
            &nbsp;
            <br>
            <h4>Package</h4>
            <input type="radio" name="packageEdit" value="Bronze" id="packageEdit" required> Bronze &nbsp; &nbsp; &nbsp;
            <input type="radio" name="packageEdit" value="Silver" id="packageEdit"> Silver &nbsp; &nbsp; &nbsp;
            <input type="radio" name="packageEdit" value="Gold" id="packageEdit"> Gold &nbsp; &nbsp; &nbsp;
            <input type="radio" name="packageEdit" value="Platinum" id="packageEdit"> Platinum &nbsp; &nbsp; &nbsp;
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
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">phone</th>
          <th scope="col">age</th>
          <th scope="col">gender</th>
          <th scope="col">departure</th>
          <th scope="col">returndate</th>
          <th scope="col">destination</th>
          <th scope="col">package</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `booking`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['name'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['phone'] . "</td>
            <td>". $row['age'] . "</td>
            <td>". $row['gender'] . "</td>
            <td>". $row['departure'] . "</td>
            <td>". $row['returndate'] . "</td>
            <td>". $row['destination'] . "</td>
            <td>". $row['package'] . "</td>
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
                <button name="pdf_booking" class="pdf">Pdf</button>
            </form>

            <form method="post" action="../converter/excel.php">
                <button name="excel_booking" class="excel">Excel</button>
            </form>

        </div>
    </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[0].innerText;
        email = tr.getElementsByTagName("td")[1].innerText;
        phone = tr.getElementsByTagName("td")[2].innerText;
        age = tr.getElementsByTagName("td")[3].innerText;
        gender = tr.getElementsByTagName("td")[4].innerText;
        departure = tr.getElementsByTagName("td")[5].innerText;
        returndate = tr.getElementsByTagName("td")[6].innerText;
        destination = tr.getElementsByTagName("td")[7].innerText;
        package = tr.getElementsByTagName("td")[8].innerText;
        console.log(name, email, phone, age, gender, departure, returndate, destination, package);
        nameEdit.value = name;
        emailEdit.value = email;
        phoneEdit.value = phone;
        ageEdit.value = age;
        genderEdit.value = gender;
        departureEdit.value = departure;
        returndateEdit.value = returndate;
        destinationEdit.value = destination;
        packageEdit.value = package;
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

        if (confirm("Are you sure you want to delete this data!")) {
          console.log("yes");
          window.location = `/project/data/booking.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>