<?php
class NameType {
  public $associativeNames;
  public $indexedNames;
  public $uniqueNames;
  
  public function get_associative_names() {
    return $this->associativeNames;
  }
  public function get_indexed_names() {
    return $this->indexedNames;
  }
  // Sort the associative arrays by value, so that we can get the most common names later.
  public function get_most_common_names() {
    $array = $this->associativeNames;
    arsort($array);
    return $array;
  }
  public function set_names($name) {
    if (!isset($this->associativeNames[$name])) {
      $this->uniqueNames++;
      $this->indexedNames[] = $name;
      $this->associativeNames[$name] = 1;
    } else {
      $this->associativeNames[$name] += 1;
    }
  }
}
