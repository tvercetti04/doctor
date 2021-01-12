<?php
$connect = mysqli_connect('localhost','root','','hospital');

if(isset($_GET['del'])){
    $del = $_GET['del'];
    
    $query = mysqli_query($connect, "delete from appointment where id='$del'");
    
    
    echo "<script>open('index.php','_self')</script>";

}

?>

