<?php

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

$server = "localhost";
$username = "root";
$password = "";
$dbname = "vms";

$con = mysqli_connect($server, $username, $password ,$dbname);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
$update=false;
$delete=false;

//
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM cus_info WHERE Sno = $sno";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        $delete=true;
    }
  }


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){
 // Update the record
 $sno = $_POST["snoEdit"];
 $date = $_POST["titleEdit"];
 
 //"UPDATE MyGuests SET lastname='Doe' WHERE id=2"

// Sql query to be executed
$sql = "UPDATE cus_info SET app_date = '$date'  WHERE Sno = $sno ";
$result = mysqli_query($con, $sql);
if($result){
 $update = true;
 
 
 
 
}
else{
 echo "We could not update the record successfully";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Vaccination Center</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" style="color:#228B22">Vaccination Center</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>



  </div>
</nav>

<!-- <div class="container mt-4">
<h>//! You can now use this website</h3>
<hr>

</div> -->


<div class="container ml-auto">



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Reschedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/Vaccination Center/welcome.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="date">Assign a new date </label>
              <input type="date" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

          

          </div> 
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> The patient has been marked vaccinated , record is sucessfully deleted  
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Vaccination date is sucessfully rescheduled
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

<div class="container">
<br>
<br>
<br>
<?php echo " <h2 style=color:#228B22 ,font-family:'Sriracha' >Welcome  {$_SESSION['username']} </h2>";
?>
<!-- <h1>Patient Manager</h1> -->
<table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Name</th>
          <th scope="col">Addhar Number</th>
          <th scope="col">Gender</th>
          <th scope="col">Contact</th>
          <th scope="col">Vaccine Name</th>
          <th scope="col">Date</th>
          <th scope="col">Time Slot</th>


          
        </tr>
      </thead>
      <tbody>
        <?php 
        $insert=false;
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vms";
        $con = mysqli_connect($server, $username, $password ,$dbname);
        
            // Check for connection success
            if(!$con){
                die("connection to this database failed due to" . mysqli_connect_error());
            }


           $acc=$_SESSION['acc_id'];
        
        
          $sql = "SELECT * FROM  cus_info natural join account where acc_id={$acc} ";
        //   $stmt = $con->prepare("SELECT * FROM  cus_info natural join account where ? ");
        //  $stmt->bind_param('s', $acc);
        //  $sql=$stmt->execute();
        $result = mysqli_query($con, $sql);
            $sno=0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
        

            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['Name'] . "</td>
            <td>". $row['Addhar'] . "</td>
            <td>". $row['Sex'] . "</td>
            <td>". $row['Phone'] . "</td>
            <td>". $row['VaccineName'] . "</td>
            <td>". $row['app_date'] . "</td>
            <td>". $row['app_time'] . "</td>

            <td> <button class='edit btn btn-sm btn-success' id=".$row['Sno'].">Reschedule</button> </td>
           <td> <button class='delete btn btn-sm btn-danger' id=d".$row['Sno'].">Cancel</button>  </td>
          </tr>";
         
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>

    </div>
    <br>
    
<div class="container ml-auto">
<h2  style=padding:auto><a href="index.php" class="link-info">New Registration</a> </h2>
</div>

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
        title = tr.getElementsByTagName("td")[6].innerText;
        console.log(title);
        titleEdit.value = title;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Caution! do you want to cancel your appointment")) {
          console.log("yes");
          window.location = `/vaccination center/welcome.php?delete=${sno}`;
          
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
