<?php
class validate {
 
  public $errors = array();
 
  public function validateNum($postVal, $postName) {
    if(empty($postVal)) {
      $this->setError($postName, ucfirst($postName)." must not be empty!");
    } else if(!is_numeric($postVal)) {
      $this->setError($postName, ucfirst($postName)." must be numeric");
    }
  }
 
  public function compareNum($postVal, $postName, $postVal2, $postName2) {
    if($postVal>$postVal2) {
      $this->setError($postName, ucfirst($postName)." must not larger than ".ucfirst($postName2)."!");
      $this->setError($postName2, ucfirst($postName)." must not larger than ".ucfirst($postName2)."!");
    } 
  }

  private function setError($element, $message) {
    $this->errors[$element] = $message;
  }

  public function getError($elementName) {
    if($this->errors[$elementName]) {
      return $this->errors[$elementName];
    } else {
      return false;
    }
  }

  public function displayErrors() {
    $errorsList = "<ul class=\"errors\">\n";
    foreach($this->errors as $value) {
      $errorsList .= "<li>". $value . "</li>\n";
    }
    $errorsList .= "</ul>\n";
    return $errorsList;
  }

  public function hasErrors() {
    if(count($this->errors) > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function errorNumMessage() {
    if(count($this->errors) > 1) {
            $message = "There were " . count($this->errors) . " errors sending your message!\n";
        } else {
            $message = "There was an error sending your message!\n";
        }
    return $message;
  }
 
}