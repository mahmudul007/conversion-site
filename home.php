<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
#define("filepath", "data.txt");



$catagory = "";
$amount = 0;
$result=0;
$catErr= $amountErr = "";
$flag = false;
$successfulMessage = $errorMessage = "";



if($_SERVER['REQUEST_METHOD'] === "POST") {

    if (empty($_POST['catagory'])) {
        $catErr="value cannot be empty";
        $flag=true;
        // code...
    }
    else{
        $catagory=$_POST['catagory'];
    }

    if (empty($_POST['amount'])) {
        $amountErr="value cannot be empty";
        $flag=true;
        // code...
    }
    else{
        $amount=$_POST['amount'];
    }
    /*if(!$flag) {
            $data = $amount . "," . $res;
            $res = write($data);
            if($res) {
                $successfulMessage = "Sucessfully saved.";
            }
        else {
            $errorMessage = "Error while saving.";
        }
    }*/
    if($catagory=="inch_to_feet")
    {
        global $result;
        $result=$amount/12;
    }
    elseif($catagory=="feet_to_inch")
    {
        global $result;
        $result=$amount*12;
    }
}



/*function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function write($content) {
    $file = fopen(filepath, "a");
    $fw = fwrite($file, $content . "\n");
    fclose($file);
    return $fw;
}*/

?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <p>Page 1 [Home]</p> 
        <p>Conversion site </p>
        1. <a href="home.php">Home</a> 2. <a href="conversion.php">Conversion Rate</a> 3. <a href="history.php">History</a>
        <p>Converter</p>
         <form class="" action="conversion.php" method="post">
            <label for="catagory" >Select Catagory:</label>

            <select name="catagory" id="catagory">
                <option value="inch_to_feet">Inch_to_feet</option>  
                <option value="feet_to_inch">feet_to_inch</option>
            </select>
            <br>

            Value: <input id="amount" type="text" name="amount" value="" placeholder="Enter a Value" required><br><br>
            <input id="result" type="submit" name="result" value="result"><br>
            Result: <p><?php echo $result ?></p>  
         </form>
        <?php
        /*if ($catagory=='feet_to_inch') {
                $result=$amount*12;
                echo $amount." feet = ".$result." inch";
            }
        if ($catagory=='inch_to_feet') {
            $result=$amount/12;
            echo $amount." inch = ".$result." feet";
        }*/
        ?>
    </body>
</html>