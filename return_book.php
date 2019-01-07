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

<form action="return_book.php" method="get">

<fieldset>
 <legend>Information:</legend>
    Student ID: &nbsp;
    <input type="text" name="std_id"> &nbsp;

 <input type="submit" name="check" value="Check">

 <p id="check_">Check First</p> <br><br>

   
    <input type="submit" name="return" value="Return"> <br>
  </fieldset>
</form>

<?php

if(isset($_GET['check'])){

$std_id = "";


if(isset($_GET['std_id'])){ $std_id = $_GET['std_id']; }



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



$result = $conn->query("SELECT * FROM issue_book where std_id = $std_id");

if ($result->num_rows > 0) {
    // output data of each row
    

echo "You have a book";


} else {
    
   echo "You have no book";
}





$conn->close();
}



if(isset($_GET['return'])){

$std_id = "";


if(isset($_GET['std_id'])){ $std_id = $_GET['std_id']; }



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




$sql = "DELETE FROM issue_book WHERE std_id = $std_id";



 if ($conn->query($sql) === TRUE) {
    echo "<br>Returned Successful";
} else {
        echo "<br>Failed";
}



$conn->close();
}




?>



</div>




<!-- JavaScript function -->
<script type="text/javascript">

function haveBook(){

document.getElementById("check_").innerHTML = "You Have A Book";

}

function noBook(){

document.getElementById("check_").innerHTML = "You Have No Book";

}

</script>


<!-- footer section -->
<?php include 'footer.php'; ?>

</body>

<html>