<?php

// Measurements converter functions!
const LIQUID_TO_GALLON = array (
    "gallons" => 1,
    "buckets" => 4,
    "butts" => 108,
    "firkins" => 9,
    "hogsheads" => 54,
    "pints" => 0.125
);

const LENGTH_TO_CENTIMETER = array (
    "grains" => .7,
    "thumbs-length" => 2.1,
    "palms" => 3.3,
    "fists" => 10.4,
    "feet" => 25,
    "steps" => 62.5,
    "double-steps" => 1500,
    "rods" => 3000
);

function convert_to_gallon($value, $fromUnit) {
  if (LIQUID_TO_GALLON[$fromUnit]) {
      return $value * LIQUID_TO_GALLON[$fromUnit];
  } else {
      return "Unsupported from unit.";
  }
}

function convert_from_gallon($value, $toUnit) {
  if (LIQUID_TO_GALLON[$toUnit]) {
      return $value / LIQUID_TO_GALLON[$toUnit];
  } else {
      return "Unsupported to unit.";
  }
}

function convert_to_meters($value, $fromUnit) {
  switch($fromUnit) {
    case 'inches':
      return $value * 0.0254;
      break;
    case 'feet':
      return $value * 0.3048;
      break;
    case 'yards':
      return $value * 0.9144;
      break;
    case 'miles':
      return $value * 1609.344;
      break;
    case 'millimeters':
      return $value * 0.001;
      break;
    case 'centimeters':
      return $value * 0.01;
      break;
    case 'meters':
      return $value;
      break;
    case 'kilometers':
      return $value * 1000;
      break;
    default:
      return "Unsupported unit.";
  }
}

function convert_from_meters($value, $toUnit) {
  switch($toUnit) {
    case 'inches':
      return $value / 0.0254;
      break;
    case 'feet':
      return $value / 0.3048;
      break;
    case 'yards':
      return $value / 0.9144;
      break;
    case 'miles':
      return $value / 1609.344;
      break;
    case 'millimeters':
      return $value / 0.001;
      break;
    case 'centimeters':
      return $value / 0.01;
      break;
    case 'meters':
      return $value;
      break;
    case 'kilometers':
      return $value / 1000;
      break;
    default:
      return "Unsupported unit.";
      break;
  }
}

function convert_length($value, $fromUnit, $toUnit) {
  $meterValue = convert_to_meters($value, $fromUnit);
  $newValue = convert_from_meters($meterValue, $toUnit);
  return $newValue;
}

function convert_to_centimeter($value, $fromUnit) {
  if (LENGTH_TO_CENTIMETER[$fromUnit]) {
      return $value * LENGTH_TO_CENTIMETER[$fromUnit];
  } else {
      return "Unsupported from unit.";
  }
}

function convert_from_centimeter($value, $toUnit) {
  if (LENGTH_TO_CENTIMETER[$toUnit]) {
      return $value / LENGTH_TO_CENTIMETER[$toUnit];
  } else {
      return "Unsupported to unit.";
  }
}

function convert_centimeter($value, $fromUnit, $toUnit) {
  $centimeterValue = convert_to_centimeter($value, $fromUnit);
  $newValue = convert_from_centimeter($centimeterValue, $toUnit);
  return $newValue;
}

// Names processor functions!
// Fetching data, putting it in memory, and setting up the variables we need to perform operations on the data.
function list_names ($echo, $array, $isAssoc) {
  echo '<p>'.$echo.'<ol>';
  $i = 0;
  if ($isAssoc) {
    foreach ($array as $key => $value) {
      echo '<li>'.$key.' with '.$value.' occurrences</li>';
      if (++$i == 10) break;
    }
  } else {
    foreach ($array as $value) {
      echo '<li>'.$value.'</li>';
      if (++$i == 25) break;
    }
  }
  echo '</ol></p>';
}

function modify_names ($firstNames, $lastNames) {
  echo '<p>A list of 25 speciality modified names: <ol>';
  $i = 0;
  while ($i < 25) {
    $seed = $i;
    $testName = $firstNames->indexedNames[$seed+1].' '.$lastNames->indexedNames[$seed+2];
    if (!isset($fullNames[$testName])) {
      echo '<li>'.$testName.'</li>';
      $i++;
    } else {
      $seed++;
    }
  }
  echo '</ol></p>';
}

function read_names ($dataFile, $firstNames, $lastNames, $fullNames) {
  // Setting all the variables we'll need. Mostly arrays and counters.
  $rows = explode("\n", $dataFile);
  $specialityUniqueNames = array();

  // Combing through the data, only even rows because those are the rows with names on them.
  for ($i = 0; $i < sizeof($rows); $i += 2) {
    // This fun bit of code validates the names using regular expressions after removing the Lorem Ipsum after the name.
    if (preg_match('/^[A-Z][a-zA-Z\'-]+, [A-Z][a-zA-Z\'-]+/', substr($rows[$i], 0, strpos($rows[$i], '--')))) {
    // Parses and stores the first, last and full names in our validated data.
    $rowData = explode(',', $rows[$i]);
    $lastName = $rowData[0];
    $firstName = substr($rowData[1], 0, strpos($rowData[1], '--'));
    $fullName = $firstName.' '.$lastName;

    // If the first or last name haven't been encountered before, add it to the specialty unique names array.
    // This has to be done BEFORE counting the unique first and last names.
    if (!isset($firstNames->associativeNames[$firstName]) and !isset($lastNames->associativeNames[$lastName])) {
      $specialityUniqueNames[] = $fullName;
    }

    // If the first name hasn't been encountered before, increase unique first names counter and add the name to the array.
    // If the first name has been encountered before, increase its usage count.
    $firstNames->set_names($firstName);

    // If the last name hasn't been encountered before, increase unique last names counter and add the name to the array.
    // If the last name has been encountered before, increase its usage count.
    $lastNames->set_names($lastName);

    // If the full name hasn't been encountered before, increase unique full names counter and add the name to the array.
    // If the full name has been encountered before, increase its usage count.
    $fullNames->set_names($fullName);
    }
  }
  return $specialityUniqueNames;
}

