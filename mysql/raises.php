<?php
// Assigning our page title.
$page_title = 'Raises';

// Routine initialization and testing.
include_once("initialize.php");
check_db_connection($connect);

$userQuery = raises_query();

$result = mysqli_query($connect, $userQuery);

check_that_query_runs($result);
check_query_num_rows($result); // Only for queries that need it!

// Page specific display.
if (mysqli_num_rows($result) !== 0) { 

	echo "<h1>List of Employees Who Need a Raise</h1>";
	echo "<table border=\"1\" width=\"2em\">";
	echo "<tr><th>EmpID</th><th>First</th><th>Last</th></tr>";
	
	while($row = mysqli_fetch_assoc($result)) { 
		echo ("<tr><td>" . $row['empID'] . "</td><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td></tr>");
	}
	echo "</table>";
}

// Finalized stuff.
mysqli_close($connect); 
include_once("includes/footer.php");
?>


