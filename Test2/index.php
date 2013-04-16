<?php
$num1=$num2=$output="";
$message_text=$errors=$num1Err=$num2Err="";

if(isset($_POST['submit'])) {

  require 'function.php'; 
  include('validate.class.php');
   
	$num1 = intval(str_replace(" ", "", $_POST['num1']));    
	$num2 = intval(str_replace(" ", "", $_POST['num2']));

  $v = new validate();
  $v->validateNum($num1,'num1');
  $v->validateNum($num2,'num2');
  $v->compareNum($num1,'num1',$num2,'num2');
 
  if(!$v->hasErrors()) {
        $output=outputFormula($num1,$num2);
  } else {
    $message_text = $v->errorNumMessage();      
    $errors = $v->displayErrors();
    $num1Err = $v->getError("num1");
    $num2Err = $v->getError("num2");
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow"/> 
<title>Propguru Test 2</title>
<style type="text/css">
body {
  margin:0;
  padding:0;
  font-family:Arial, Helvetica, sans-serif;
  font-size:12px;
  background-color:#101a25;
  color:#fff;
}
#test_form_wrap {
  margin:0 auto;
  margin-top:50px;
  padding:10px;
  width:350px;
}
.message {
  font-weight:bold;
}
.errors {
  color:#af1010;
}
label {
    font-weight:bold;
}
.textfield {
    padding:5px 0 0 3px;
    width:297px;
    height:20px;
    border: 1px solid #e9e9e9;
    background-color:#303942;
    color:#fff;
}
.textarea {
    padding:3px;
    width:294px;
    height:144px;
    border: 1px solid #e9e9e9;
    background-color:#303942;
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
    color:#fff;
}
.button {
    padding:3px 0 5px 0;
    width:75px;
    height:25px;
    border: none;
    background-color:#303942;
    font-weight:bold;
    cursor:pointer;
    color: #fff;
    font-family:Arial, Helvetica, sans-serif;
}
.button:hover {
    background-color:#f1f1f1;
    color: #333;
}
</style>
</head>
<body>
  <div id="test_form_wrap">
    <span class="message"><?php echo $message_text; ?></span>
    <?php echo $errors; ?>
    <form id="test_form" method="post" action=".">
      <p><label>Number 1:<br />
      <input type="text" name="num1" class="textfield" value="<?php echo htmlentities($num1); ?>" />
      </label><br /><span class="errors"><?php echo $num1Err; ?></span></p>
       
      <p><label>Number 2:<br />
      <input type="text" name="num2" class="textfield" value="<?php echo htmlentities($num2); ?>" />
      </label><br /><span class="errors"><?php echo $num2Err ?></span></p>         
     
      <p><label>Output: <br />
      <textarea name="output" class="textarea" cols="45" rows="5"><?php echo htmlentities($output); ?></textarea>
      </label></p>
       
      <p><input type="submit" name="submit" class="button" value="Submit" /></p>
    </form>
  </div>
   
</body>
</html>