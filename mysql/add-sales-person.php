<?php
// Assigning our page title.
$page_title = 'Add Sales Person';

// Routine initialization, assignment and testing.
include_once('initialize.php');
check_db_connection($connect);

$empID = $_POST['empID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$userQuery = add_sales_person_query($empID, $firstName, $lastName); // Replace with query.

$result = mysqli_query($connect, $userQuery);
check_that_query_runs($result);

// Page specific display.
if ($result) {
	print("	<h1>ADD A NEW PERSONNEL RECORD</h1>");
	print ("<p>The following record was added to the personnel table:</p>");
	print("<table border='0'>
			<tr><td>EMPLOYEE ID</td><td>$empID</td></tr>
			<tr><td>FIRST NAME</td><td>$firstName</td></tr>
			<tr><td>LAST NAME</td><td>$lastName</td></tr>		
			<tr><td>JOB TITLE</td><td>sales</td></tr>
			<tr><td>HOURLY WAGE</td><td>8.25</td></tr>
			</table>");
}

// Finalized stuff.
mysqli_close($connect);
include_once("includes/footer.php");
?>
