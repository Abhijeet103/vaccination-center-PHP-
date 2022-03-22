 <?php
 $insert=false;

 session_start();


 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
 {
     header("location: login.php");
 }
 
 if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";
$dbname = "vms";

$con = mysqli_connect($server, $username, $password ,$dbname);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    // echo "Success connecting to the db";

     // Collect post variables
     
     $name = $_POST['name'];
     $age = $_POST['age'];
     $gender = $_POST['gender'];
     $addhar_num = $_POST['addhar'];
     $phone = $_POST['phone'];
     $Vacc_name = $_POST['vaccine'];
     $timeSlot=$_POST['time'];
    $date=time();
    $id=$_SESSION['acc_id'];
    echo $id;
    $d=date("Y-m-d",$date);
     $sql = "INSERT INTO cus_info (Sno, Name, Addhar, Sex, Phone, app_date, app_time, VaccineName,acc_id) VALUES (NULL, '$name', '$addhar_num', '$gender', '$phone','$d' ,'$timeSlot', '$Vacc_name' , '$id')";

       // Execute the query
    if($con->query($sql) == true){
         

        // Flag for successful insertion
        $insert = true;
        header("Location: login.php");
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserLogin</title>
     <link rel="stylesheet" href="style.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body >

<div class="p-3 mb-2 bg-light text-dark">
<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Slot is sucessfully booked 
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<div class="container">
        <h1 style="color:#228B22", style="text-decoration:none">Welcome to Vaccination Center</h1>
        <p>Please enter your details</p>
        
</div>
    <div class="signup">
    <form action="index.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input   name="name" class="form-control" id="exampleInputEmail1"  placeholder="Enter your name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Age</label>
    <input  name="age" class="form-control" id="exampleInputEmail1" >

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Addhar Number</label>
    <input  name="addhar"class="form-control" id="exampleInputEmail1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control"  name="gender"id="exampleFormControlSelect1">
    <option>Select</option>
      <option>Male</option>
      <option>Female</option>
      <option>Non binary</option>

    
    </select>

  </div>

  <div class="mb-3 ">
    <label class="exampleInputEmail1" for="exampleCheck1">Phone Number</label>
    <input  name="phone" class="form-control" id="exampleInputEmail1">    
  </div>

  <div class="mb-3 ">
  <label for="exampleFormControlSelect1">Time Slot</label>
  <select class="form-control"name="time" id="exampleFormControlSelect1">
    <option>Select</option>
      <option>9:00 am - 12:00 pm</option>
      <option>1:00 pm - 3:00 pm</option>
      <option>4:00 pm - 6:00pm</option>
</select>
  </div>

  <div class="mb-3 ">
  <label class="exampleInputEmail1" for="exampleCheck1">Vaccine Name </label>
  <select class="form-control" name="vaccine"id="exampleFormControlSelect1">
    <option>Select</option>
      <option>Covid Sheild</option>
      <option>Covaccine</option>
      <option>Hepatitis B</option>
      <option>Hepatitis A</option>
      <option>DTP</option>

</select>
  </div>


  <button type="submit" class="btn btn-success">Submit</button>

</form>
</div>

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
</body>
</html>

