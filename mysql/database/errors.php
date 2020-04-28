<?php
function check_db_connection($connect) {
    if (!$connect) {
        die("ERROR: Cannot connect to database " . DB . " on server " . SERVER .  
        " using user name . USER  (".mysqli_connect_errno().
        ", ".mysqli_connect_error().")");
    }
}

function check_that_query_runs($result) {
    if (!$result) {
        die("Could not successfully run query ($userQuery) from " . DB . ": " .	
            mysqli_error($connect) );
    }
}

function check_query_num_rows($result) {
    if (mysqli_num_rows($result) == 0) {
        print("No records found with query $userQuery");
    }
}