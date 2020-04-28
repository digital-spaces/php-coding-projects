<?php
// Assigning our page title.
$page_title = 'Name Change';

// Routine initialization and testing.
include_once('initialize.php');
check_db_connection($connect);

$userQuery = name_change_query(); // ADD QUERY

$result = mysqli_query($connect, $userQuery);

check_that_query_runs($result);

// Page specific display.
print("<h1>UPDATE</h1>");
print("<p>The employee update has been completed.</p>");

// Finalized stuff.
mysqli_close($connect);
include_once("includes/footer.php");
?>
