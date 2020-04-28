<?php

function raises_query () {
    $userQuery = "SELECT empID, firstName, lastName";
    $userQuery .= " FROM personnel";
    $userQuery .= " WHERE hourlyWage < 10.00";
    return $userQuery;
}

function name_change_query () {
    $userQuery = "UPDATE personnel";
    $userQuery .= " SET lastName = 'Jackson', jobTitle = 'manager'";
    $userQuery .= " WHERE empID=12353";
    return $userQuery;
}

function wage_report_query($hourlyWage, $jobTitle) {
    $userQuery = "SELECT empID";
    $userQuery .= " FROM personnel";
    $userQuery .= " WHERE hourlyWage >= ".$hourlyWage." AND jobTitle= '".$jobTitle."'";
    return $userQuery;
}

function add_sales_person_query($empID, $firstName, $lastName) {
    $userQuery = "INSERT INTO personnel (empID, firstName, lastName, jobTitle, hourlyWage)";
    $userQuery .= " VALUES (".$empID.", '".$firstName."', '".$lastName."', 'sales', 8.25)";
    return $userQuery;
}
