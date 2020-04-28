<?php
// Assigning our page title.
$page_title = 'Liquid Measurement';

// Routine initialization ans assignment.
include_once("../includes/initialize.php");
$fromValue = '';
$fromUnit = '';
$toUnit = '';
$toValue = '';

// If the form has been submitted, assign variables.
if(!isset($_POST['submit'])) {
    $_POST['submit'] = '';
} else {
  $fromValue = $_POST['fromValue'];
  $fromUnit = $_POST['fromUnit'];
  $toUnit = $_POST['toUnit'];
  
  $toValue = convert_liquid($fromValue, $fromUnit, $toUnit);
}
?>

  <form action="" method="post">
    <div class="entry">
      <label>From:</label>
      <select name="fromUnit">
        <option value="gallons"<?php if($fromUnit == 'gallons') { echo " selected"; } ?>>gallons</option>
        <option value="buckets"<?php if($fromUnit == 'buckets') { echo " selected"; } ?>>buckets</option>
        <option value="butts"<?php if($fromUnit == 'butts') { echo " selected"; } ?>>butts</option>
        <option value="firkins"<?php if($fromUnit == 'firkins') { echo " selected"; } ?>>firkins</option>
        <option value="hogsheads"<?php if($fromUnit == 'hogsheads') { echo " selected"; } ?>>hogsheads</option>
        <option value="pints"<?php if($fromUnit == 'pints') { echo " selected"; } ?>>pints</option>
      </select><br>
      <input type="text" name="fromValue" placeholder="0" value="<?php echo $fromValue; ?>">&nbsp;
    </div>

    <div class="entry">
      <select name="toUnit">
        <option value="gallons"<?php if($toUnit == 'gallons') { echo " selected"; } ?>>gallons</option>
        <option value="buckets"<?php if($toUnit == 'buckets') { echo " selected"; } ?>>buckets</option>
        <option value="butts"<?php if($toUnit == 'butts') { echo " selected"; } ?>>butts</option>
        <option value="firkins"<?php if($toUnit == 'firkins') { echo " selected"; } ?>>firkins</option>
        <option value="hogsheads"<?php if($toUnit == 'hogsheads') { echo " selected"; } ?>>hogsheads</option>
        <option value="pints"<?php if($toUnit == 'pints') { echo " selected"; } ?>>pints</option>
      </select>
      <label>To:</label><br>
        <span><?php if($toValue)echo $toValue;else echo 0;?></span>&nbsp;
    </div>
    
    <?php
      if ($fromValue) {
        echo "<p>".$fromValue." ".$fromUnit." = ".$toValue." ".$toUnit."</p>";
      }
    ?>
    
    <a href="index.php">Go Back</a>
    <input type="submit" name="submit" value="Submit">
  </form>
  
<?php
$breadcrumb = "index.php";
include_once("../includes/footer.php");
?>
  