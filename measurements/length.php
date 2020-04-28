<?php
// Assigning our page title.
$page_title = 'Length Measurement';

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

  $toValue = convert_centimeter($fromValue, $fromUnit, $toUnit);
}
?>

  <form action="" method="post">
    <div class="entry">
      <label>From:</label>
      <select name="fromUnit">
        <option value="grains"<?php if($fromUnit == 'grains') { echo " selected"; } ?>>grains</option>
        <option value="thumbs-length"<?php if($fromUnit == 'thumbs-length') { echo " selected"; } ?>>thumbs-length</option>
        <option value="palms"<?php if($fromUnit == 'palms') { echo " selected"; } ?>>palms</option>
        <option value="fists"<?php if($fromUnit == 'fists') { echo " selected"; } ?>>fists</option>
        <option value="feet"<?php if($fromUnit == 'feet') { echo " selected"; } ?>>feet</option>
        <option value="steps"<?php if($fromUnit == 'steps') { echo " selected"; } ?>>steps</option>
        <option value="double-steps"<?php if($fromUnit == 'double-steps') { echo " selected"; } ?>>double-steps</option>
        <option value="rods"<?php if($fromUnit == 'rods') { echo " selected"; } ?>>rods</option>
      </select><br>
      <input type="text" name="fromValue" placeholder="0" value="<?php echo $fromValue; ?>">&nbsp;
    </div>

    <div class="entry">
      <select name="toUnit">
        <option value="grains"<?php if($toUnit == 'grains') { echo " selected"; } ?>>grains</option>
        <option value="thumbs-length"<?php if($toUnit == 'thumbs-length') { echo " selected"; } ?>>thumbs-length</option>
        <option value="palms"<?php if($toUnit == 'palms') { echo " selected"; } ?>>palms</option>
        <option value="fists"<?php if($toUnit == 'fists') { echo " selected"; } ?>>fists</option>
        <option value="feet"<?php if($toUnit == 'feet') { echo " selected"; } ?>>feet</option>
        <option value="steps"<?php if($toUnit == 'steps') { echo " selected"; } ?>>steps</option>
        <option value="double-steps"<?php if($toUnit == 'double-steps') { echo " selected"; } ?>>double-steps</option>
        <option value="rods"<?php if($toUnit == 'rods') { echo " selected"; } ?>>rods</option>
      </select>
      <label>To:</label><br>
        <span><?php if($toValue)echo $toValue;else echo 0;?></span>
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
// Closing
$breadcrumb = "index.php";
include_once("../includes/footer.php");
?>
