<?php
// Assigning our page title.
$page_title = 'Names Processor';

// Routine initialization.
include_once("../includes/initialize.php");
    if (!isset($_POST['submit'])) {
      echo "<small>Upload a text file with names. Or not; <a href='names.txt'>this one</a> with the expected formatting will be loaded if you don't. But if you happen to have one of your own that uses the same formatting, feel free to try it! It doesn't even have to be names, but the feedback you get won't make sense otherwise.</small>";
      echo "<form action='' method='post'>";
        echo "<label for='namesTxt'>Upload a text file with names (or not - it will load one by default):</label>";
        echo "<input type='file' id='namesTxt' name='namesTxt' value='names.txt'>";
        echo "<input type='submit' name='submit' value='Submit'>";
      echo "</form>";
    } else {
      // Load the text file with the names, then create new objects to store the names in.
      if (!isset($_POST['namesTxt'])) {
        $dataFile = file_get_contents($_POST["namesTxt"]);    
      } else {
        $dataFile = file_get_contents("names.txt");    
      }
      $firstNames = new NameType;
      $lastNames = new NameType;
      $fullNames = new NameType;
      $specialityUniqueNames = read_names($dataFile, $firstNames, $lastNames, $fullNames);

      // Echo the unique counts of first, last and full names.
      echo '<p><b>The unique count of full names:</b> '.$fullNames->uniqueNames.'</p>';
      echo '<p><b>The unique count of last names:</b> '.$lastNames->uniqueNames.'</p>';
      echo '<p><b>The unique count of first names:</b> '.$firstNames->uniqueNames.'</p>';

      // Echo the ten most common names, which we counted and sorted earlier.
      list_names("The ten most common last names are", $lastNames->get_most_common_names(), true);

      list_names("The ten most common first names are", $firstNames->get_most_common_names(), true);

      // Echo the names, in the order they appear in the data, that are the first full name to use both the first and last name that makes it up.
      list_names("A list of 25 speciality unique names:", $specialityUniqueNames, false);

      // Echo some random names I made up from the unique first and last names that are otherwise not in the unique first names array.
      modify_names($firstNames, $lastNames);
    }
   
$breadcrumb = "../index.php";
include_once("../includes/footer.php");
?>

