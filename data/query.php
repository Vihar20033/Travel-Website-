
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
    $sql = "DELETE FROM query WHERE no = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        

        $name = $_POST["myname"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $sql = "INSERT INTO `query` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message');";
        $result = mysqli_query($conn, $sql);
          
        if (!$result) {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
        else{
          require "../email/contact-email.php";
          header("location: ../html/contact.php");
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

<?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Query is successfully solve
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
          <th scope="col">subject</th>
          <th scope="col">message</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        
          $sql = "SELECT * FROM `query`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
              <th scope='row'>". $sno . "</th>
              <td>". $row['name'] . "</td>
              <td>". $row['email'] . "</td>
              <td>". $row['subject'] . "</td>
              <td>". $row['message'] . "</td>
              <td> <button class='delete btn btn-sm btn-primary' id=d".$row['no'].">Done</button>  </td>
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
                <button name="pdf_query" class="pdf">Pdf</button>
            </form>

            <form method="post" action="../converter/excel.php">
                <button name="excel_query" class="excel">Excel</button>
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
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure query is successfully solve!")) {
          console.log("yes");
          window.location = `/project/data/query.php?delete=${sno}`;
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

