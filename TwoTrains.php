<!doctype>
<html>

<head>
    <title>Two Trains</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    <link rel="stylesheet" href="Trains.css">
</head>


<body>
    <h1>Two Trains</h1>
<?php
    //start of on script 1
    // global variables
$Form = true;
$speedA = "";
$speedB = "";
$distance = "";
$errorCount = 0;

    // when you submit the form and if the fields are set to something, then it will validate the data to see if it's greater than 0 in each field. 
if(isset($_POST["Submit"])){
	$speedA = $_POST["trainA"];
	$speedB = $_POST["trainB"];
	$distance = $_POST["distance"];
	
	if($speedA <= 0){
		echo "The Train A's speed should be greater than 0<br/>";
		$errorCount++;
	}
	if($speedB <= 0){
		echo "The Train B's speed should be greater than 0<br/>";
		$errorCount++;
	}
	if($distance <= 0){
		echo "Distance between the trains should be greater than 0<br/>";
		$errorCount++;
	}
	
	if($errorCount > 0){
		$Form = true;
	} else {
		$Form = false;
	}
  
}
    // if the data in the fields incorrect (which is why it is set to true), then it will display the form again indicating that the user needs to input the correct data indicated. 
if ($Form == true) {
    //end of php script 1
	?>
	<form name="twoTrains" action="TwoTrains.php" method="post">
	<p>Speed of Train A: <input type="text" name="trainA" value="<?php echo $speedA; ?>" /></p>
	<p>Speed of Train B: <input type="text" name="trainB" value="<?php echo $speedB; ?>" /></p>
	<p>Distance between the trains: <input type="text" name="distance" value="<?php echo $distance; ?>" /></p>
	    <p><input type="submit" name="Submit" value="Submit"></p>
	<p><input type="reset" name="Reset" value="Clear Form"></p>
	</form>
<?php
	// start on php script 2
    
    // this else has the data of formulas to calculate the distances between trains and the speed of the trains depending on the input the user types in the fields
} else{
	$distanceA = (($speedA / $speedB) * $distance) / (1 + ($speedA / $speedB));
	$distanceB = $distance - $distanceA;
	$timeA = $distanceA / $speedA;
	$timeB = $distanceB / $speedB;
	
    // these echos display the output/answers of the formulas with the data placed in the fields by the user
	echo "Train A travelled " . $distanceA . " for a total time of " . $timeA . "<br>";
	echo "Train B travelled " . $distanceB . " for a total time of " . $timeB . "<br>";
	echo "The sum of the two distances is " . ($distanceA + $distanceB) . " miles.<br/>";
}
    //end of php script 2
?>
</body>

</html>
