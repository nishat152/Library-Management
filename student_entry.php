<!DOCTYPE html>
<html>

<head>
<title>Student Entry</title>
</head>

<body>


<!-- Here, include header and navigation section -->
<?php include 'head_nav.php'; ?>




<!-- Main Content -->

<div class="main_content template clear">

<form action="student_entry.php" method="post">

<h1>Students Information </h2>

Name:&nbsp; <input type="text" name="name">
<br><br>
ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="id">
<br><br>
Dept:&nbsp;&nbsp; <input type="text" name="dept">
<br><br>
Intake: <input type="text" name="intake">
<br><br>
Gender: <input type="radio" name="gender" value="male" checked>Male
        <input type="radio" name="gender" value="female">Female
		
		<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="   Submit   ">

</form>




<?php

if(isset($_POST['submit'])){
	
$name = $dept = $intake = $gender = "";
$id = 0;

if(isset($_POST['name'])){ $name = $_POST['name']; } 
if(isset($_POST['id'])){ $id = $_POST['id']; } 
if(isset($_POST['dept'])){ $dept = $_POST['dept']; } 
if(isset($_POST['intake'])){ $intake = $_POST['intake']; } 
if(isset($_POST['gender'])){ $gender = $_POST['gender']; } 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$sql = "INSERT INTO students (name, id, dept, intake, gender)
VALUES ('$name', $id, '$dept', '$intake', '$gender')";



if ($conn->query($sql) === TRUE) {
    echo "<br>Registered successful";
} else {
        echo "<br>Failed";
}

$conn->close(); 
}
?>



</div>


<!-- footer section -->
<?php include 'footer.php'; ?>

</body>

<html>