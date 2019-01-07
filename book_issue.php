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

<form action="book_issue.php" method="get">

<fieldset>
 <legend>Information:</legend>
    Student ID:
    <input type="text" name="std_id"><br><br>
    Book name:
    <input type="text" name="book_name"><br><br>
	Author ID:
    <input type="text" name="author"><br><br>
	Issued Date:
    <input type="date" name="issue_time"><br><br>
	Returned Date:
    <input type="date" name="ret_time"><br><br><br>
    <input type="submit" name="submit" value="Submit">
  </fieldset>
</form>

<?php

if(isset($_GET['submit'])){

$std_id = $book_name = $author = $issue_time = $ret_time = "";


if(isset($_GET['std_id'])){ $std_id = $_GET['std_id']; }
if(isset($_GET['book_name'])){ $book_name = $_GET['book_name']; }
if(isset($_GET['author'])){ $author = $_GET['author']; }
if(isset($_GET['issue_time'])){ $issue_time = $_GET['issue_time']; }
if(isset($_GET['ret_time'])){ $ret_time = $_GET['ret_time']; }


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





/* $sql =  "INSERT INTO issue_book (std_id, book_name, author_name, issue_date, return_date)
SELECT * FROM (SELECT $std_id, '$book_name', '$author', '$issue_time', '$ret_time') AS tmp
WHERE NOT EXISTS (
    SELECT std_id FROM issue_book WHERE std_id = $std_id
) LIMIT 1";
*/


  $sql = "INSERT INTO issue_book (std_id, book_name, author_name, issue_date, return_date)
  VALUES ($std_id, '$book_name', '$author', '$issue_time', '$ret_time')";


/*
 if ($conn->query($sql) === TRUE) {
    echo "<br>Book Issued Successful";
} else {
        echo "<br>You have allready a book";
}
*/



$result = $conn->query("SELECT * FROM issue_book where std_id = $std_id");

if ($result->num_rows > 0) {
    // output data of each row
    

echo "You allready have a book.";


} else {
    if ($conn->query($sql) === TRUE) {
    echo "<br>Book Issued Successful";
} else {
        echo "<br>You are not registered.";
}
}





$conn->close();
}
?>



</div>


<!-- footer section -->
<?php include 'footer.php'; ?>

</body>

<html>