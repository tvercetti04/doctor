<?php
$connect = mysqli_connect('localhost', 'root', '', 'hospital');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Record</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="" class="navbar-brand mx-auto text-center py-0"><h3 class="text-dark">GOCORONA</h3><h2>HOSPITAL</h2></a>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-6 p-0 mx-auto">
               
               <?php
                $edit_id = $_GET['edit'];
                $query = mysqli_query($connect,"select * from appointment WHERE id='$edit_id'");
                $val = mysqli_fetch_array($query);
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for=""><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control" value="<?php echo $val['name'];?>">
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Age</strong></label>
                        <input type="text" name="age" class="form-control" value="<?php echo $val['age'];?>">
                    </div>
                     <div class="form-group">
                        <label for=""><strong>DOB</strong></label>
                        <input type="date" name="dob" class="form-control" value="<?php echo $val['dob'];?>">
                    </div>
                     <div class="form-group">
                       <label for=""><strong>Gender</strong></label><br>
                       <select class="form-control" name="gender" value="<?php echo $val['gender'];?>">
                           <option selected disabled>Gender</option>
                           <option>Male</option>
                           <option>Female</option>
                           <option>Other</option>
                       </select>
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Address</strong></label>
                        <input type="text" name="address" class="form-control" value="<?php echo $val['address'];?>">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Problems</strong></label>
                        <textarea class="form-control" name="problems" rows="3" value="<?php echo $val['problems'];?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Department</strong></label>
                        <select class="form-control" name="department" value="<?php echo $val['department'];?>">
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
                        <input type="date" name="doa" class="form-control" value="<?php echo $val['doa'];?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" class="btn btn-success btn-block"> 
                    </div>
                </form>
                <?php
                if(isset($_POST['update'])){
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $problems = $_POST['problems'];
                    $department = $_POST['department'];
                    $doa = $_POST['doa'];
                    
                    
                    $query = mysqli_query($connect, "update appointment SET name='$name', age='$age', dob='$dob', gender='$gender', address='$address', problems='$problems', department='$department', doa='$doa' WHERE id='$edit_id'");
                    
                    if($query){
                        echo "<script>open('index.php','_self')</script>";
                    }
                    else{
                        echo "failed";
                        }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>