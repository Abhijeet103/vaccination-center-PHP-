<?php
 
$update=false;
$delete=false;
$server = "localhost";
$username = "root";
$password = "";
$dbname = "vms";

$con = mysqli_connect($server, $username, $password ,$dbname);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    //  echo "Success connecting to the db";


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccinaton Schedule</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>
<body>

<div class="p-3 mb-2 bg-light text-dark my-5">

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
        <form action="/Vaccination Center/emp.php" method="POST">
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
<h1>Patient Manager</h1>
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

          $sql = "SELECT * FROM  cus_info";
          $result = mysqli_query($con, $sql);
          $sno = 0;
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

            <td> <button class='edit btn btn-sm btn-danger' id=".$row['Sno'].">Reschedule</button> </td>
           <td> <button class='delete btn btn-sm btn-success' id=d".$row['Sno'].">Vaccinated</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
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

        if (confirm("Caution! marking a person vaccinated will delete the persons record")) {
          console.log("yes");
          window.location = `/vaccination center/emp.php?delete=${sno}`;
          
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>
</html>