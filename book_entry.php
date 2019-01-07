<!DOCTYPE html>
<html>
<head>
<title>Book Entry</title>
</head>
<body>

<!-- Add header and navigation   -->
<?php include 'head_nav.php' ?>

<div class="main_content template clear">

<form action="book_entry.php" method="post">

<br><br>Book Entry <br><br>

Book Name: <input type="text" name="b_name">
<br><br>
Author:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="author">
<br><br>
Edition:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="edition">
<br><br>

<input type="submit" name="submit" value="   Save   ">
</form>

<?php

if(isset($_POST['submit'])){
	
	$b_name = $author = $edition = "";
	
	if(isset($_POST['b_name'])) {$b_name = $_POST['b_name'];}
	if(isset($_POST['author'])) {$author = $_POST['author'];}
	if(isset($_POST['edition'])) {$edition = $_POST['edition'];}
	
	
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


     $sql = "INSERT INTO book (book_name, author_name, edition)
        VALUES ('$b_name','$author', '$edition')";



if ($conn->query($sql) === TRUE) {
    echo "<br>Success";
} else {
        echo "<br>Not Success";
}

$conn->close(); 	

	
}


?>

</div>

<!-- Add footer -->
<?php include 'footer.php'  ?>
</body>
</html>