<?php
$connect = mysqli_connect('localhost', 'root', '', 'hospital');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Record</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="" class="navbar-brand mx-auto text-center py-0"><h3 class="text-dark">GOCORONA</h3><h2>HOSPITAL</h2></a>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for=""><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Age</strong></label>
                        <input type="text" name="age" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for=""><strong>DOB</strong></label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                     <div class="form-group">
                       <label for=""><strong>Gender</strong></label><br>
                       <select class="form-control" name="gender">
                           <option selected disabled>Gender</option>
                           <option>Male</option>
                           <option>Female</option>
                           <option>Other</option>
                       </select>
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Address</strong></label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Problems</strong></label>
                        <textarea class="form-control" name="problems" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Department</strong></label>
                        <select class="form-control" name="department">
                            <option selected disabled>Choose Dept.</option>
                            <option>Emergency</option>
                            <option>Casuality</option>
                            <option>Aneasthetics</option>
                            <option>Cardiology</option>
                            <option>Critical Care</option>
                            <option>Ears, Nose & Throat</option>
                            <option>Geriatrics</option>
                            <option>GASTROENTEROLOGY</option>
                            <option>General Surgery</option>
                            <option>GYNAECOLOG</option>
                            <option>HAEMATOLOGY</option>
                            <option>PAEDIATRICS</option>
                            <option>NEUROLOGY</option>
                            <option>ONCOLOGY</option>
                            <option>OPTHALMOLOGY</option>
                            <option>ORTHOPEDICS</option>
                            <option>UROLOGY </option>
                            <option>PSYCHIATRY</option>
                            <option>OUTPATIENT</option>
                            <option>INPATIENT</option>
                            <option>CENTRAL STERILIZATION UNIT</option>
                            <option>PHYSIOTHERAPY</option>
                            <option>PHARMACY</option>
                            <option>NUTRITION AND DIETITICS</option>
                            <option>MICROBIOLOGY</option>
                            <option>MICROBIOLOGY</option>
                            <option>MEDICAL RECORDS</option>
                            <option>INFORMATION TECHNOLOGY & COMMUNICATION</option>
                            <option>MEDICAL MAINTENANCE & ENGINEERING</option>
                            <option>HUMAN RESOURCES</option>
                            <option>FINANCE</option>
                            <option>ADMINISTRATION</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Date Of Appointment</strong></label>
                        <input type="date" name="doa" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-block"> 
                    </div>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $problems = $_POST['problems'];
                    $department = $_POST['department'];
                    $doa = $_POST['doa'];
                    
                    
                    $query = mysqli_query($connect, "INSERT INTO appointment(name,age,dob,gender,address,problems,department,doa)value('$name','$age','$dob','$gender','$address','$problems','$department','$doa')");
                    
                    if($query){
                        echo "success";
                    }
                    else{
                        echo "failed";
                        }
                }
                ?>
            </div>
            
            <div class="col-9 row mx-auto">
                        <?php
                        $calling = mysqli_query($connect, "select * from appointment order by id ASC");
                        while($row = mysqli_fetch_array($calling)){
                            
                            $id = $row['id'];
                            ?>
                            
                            <div class="card col-4 shadow">
                                <div class="card-header bg-dark">
                                    <h3 class="text-center text-white">Appointment: <?= $row['id'];?></h3>
                                </div>
                                <div class="card-body">
                                    <p class="lead"> <?= $row['doc'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>Name:</strong> <?= $row['name'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>Age:</strong> <?= $row['age'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>DOB:</strong> <?= $row['dob'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>Gender:</strong> <?= $row['gender'];?></p>
                                    <hr class="my-2">
                                     <p class="lead"><strong>Address:</strong> <?= $row['address'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>Problems:</strong> <?= $row['problems'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>Department:</strong> <br> <?= $row['department'];?></p>
                                    <hr class="my-2">
                                    <p class="lead"><strong>Date of Appointment</strong> <?= $row['doa'];?></p>
                                    <hr class="my-2">
                                    
                                     <?php
                              echo "<a href='delete.php?del=$id' class='btn btn-danger btn-block'>DELETE</a>";
                            echo  "<a href='edit.php?edit=$id' class='btn btn-success btn-block'>EDIT</a>";
                            ?>
                            
                                </div>
                            </div>
                            
                            
                         <?php  
                        }
                        ?>
                  
               
            </div>
        </div>

    </div>
</body>
</html>