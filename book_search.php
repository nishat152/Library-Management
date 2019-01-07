<!DOCTYPE html>
<html>
<head>
<title>Book Search</title>

<style>
.search_book{
	
	text-align:center;
	width:100%;
}

.search_book table {
	margin: 0 auto;
	width:100%;
}
</style>
</head>
<body>
<!-- Add header and navigation -->
<?php include 'head_nav.php' ?>

<!-- main content -->
<div class="main_content template clear">

<form action="book_search.php" method="post">
<br>Search Book By Name<br>
<input type="text" name="search_id"> &nbsp;
<input type="submit" name="submit" value="Search">
<br><br>
</form>

<div class="search_book">
<?php  

if(isset($_POST['submit'])){
	
	$search_id = "";
	
	if(isset($_POST['search_id'])) {$search_id = $_POST['search_id'];}
	
	
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
	
	
	
	$result = mysqli_query($conn,"SELECT * FROM book where book_name = '$search_id' or book_name like '%$search_id%'");

    echo "<table border='1'>
    <tr>
    <th>Book Name:</th>
    <th>Author Name:</th>
	 <th>Edition:</th>
     </tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['book_name'] . "</td>";
echo "<td>" . $row['author_name'] . "</td>";
echo "<td>" . $row['edition'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
	
	
}

?> </div>

</div>

<!-- Add footer section -->
<?php include 'footer.php' ?>

</body>
</html>