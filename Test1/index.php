<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form id="form1" name="form1" method="post" action="">
        <label>Please type the 1st number
            <input type="text" name="num1" id="num1" />
        </label>
        <label>and 2nd number
            <input type="text" name="num2" id="num2" />
        </label>
        <p>
        <label>Submit
            <input type="submit" name="submit" id="submit" value="Submit" />
        </label>
        </p>
        </form> 
        <br /> 
        <?php 
        
        require 'function.php';
        
        if(isset($_POST['submit'])) {
            $num1 = intval(str_replace(" ", "", $_POST['num1']));
            $num2 = intval(str_replace(" ", "", $_POST['num2']));

            echo outputFormula($num1,$num2);
        }
        ?>
    </body>
</html>

