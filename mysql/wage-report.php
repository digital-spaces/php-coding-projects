<?php
// Assigning our page title.
$page_title = 'Wage Report';

// Routine initialization and testing.
include_once('initialize.php');
check_db_connection($connect);

$hourlyWage = $_POST['hourlyWage'];
$jobTitle = $_POST['jobTitle'];
$userQuery = wage_report_query($hourlyWage, $jobTitle); // Replace with query.

$result = mysqli_query($connect, $userQuery);

check_that_query_runs($result);
check_query_num_rows($result); // Only for queries that need it!

// Page specific display.
if (mysqli_num_rows($result) !== 0) {
	print("<h1>RESULTS</h1>");
	print("<p>The following employees have the $jobTitle job title, and an hourly wage of $".
			number_format($hourlyWage, 2)." or higher:</p>");
			
	print("<table border = \"1\">");
	print("<tr><th>EMP ID</th></tr>");

    while ($row = mysqli_fetch_assoc($result))
    {
        print (	"<tr><td>".$row['empID']."</td></tr>");
    }

	print ("</table>");
}

// Finalized stuff.
mysqli_close($connect);
include_once("includes/footer.php");
?>
