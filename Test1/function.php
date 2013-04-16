<?php
function outputFormula($firstnum, $secondnum) {
    $result="";
    $temp="";
    if ($firstnum > $secondnum) {
        for($i=$firstnum;$i>$secondnum-1;$i--) {
            $temp=checkFizzBuzz($i);
            $result.="$temp ";
        }
    } else {
        for($i=$firstnum;$i<$secondnum+1;$i++) {
            $temp=checkFizzBuzz($i);
            $result.="$temp ";
        }      
    }
    return $result;
}

function checkFizzBuzz($checknumber) {
    $bool=0;
    $temp=$checknumber;
    if ($checknumber % 3 == 0) {
        $temp="Fizz";
        $bool=1;
    }
    if ($checknumber % 5 == 0) {
        if($bool) $temp.="Buzz";
        else $temp="Buzz";
    }
    return $temp; 
}
?>
