<!--
AUTHOR: Paul Brylinski
PURPOSE: Calculate the Heat Index for Weather Wizards
CREATEDATE: 3/31/2021
-->


	<?php
	$page_title = 'Heat Index';
	include ('includes/header.html');
	?>

	<h1>Heat Index</h1>
	<p>
		In the Summer, when people say "It’s not the heat, it’s the humidity", what do they
		mean? There are 2 factors that make a hot day feel really hot. The first is the air
		temperature and the second is relative humidity. After taking measurements for
		temperature and relative humidity, we can calculate a heat index that is called our “feels
		like” temperature.
	</p>

	<p>
		HI means Heat Index (the “Feels Like” Temperature).
	</p>
	
	<p>
		T means the air temperature (This formula works when temperatures are in the range of 80 to 112).
	</p>
	
	<p>
		RH means relative humidity  (This formula works when relative humidity is in the range of 13 to 85).
	</p>
	<br>

	<?php
	//Check for form submission;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//form validation
		if(isset($_POST['temperature'], $_POST['humidity']) 
			&& is_numeric($_POST['temperature']) 	
			&& is_numeric($_POST['humidity'])
	  		&& ($_POST['temperature'] > 79) 
			&& ($_POST['temperature'] <113) 
			&& ($_POST['humidity'] > 12) 
			&& ($_POST['humidity'] < 86)
		) {

			//results of heat index
			$temperature = $_POST ['temperature'];
			$humidity = $_POST ['humidity'];
			$heatIndex = -42.379 + 2.04901523 * $temperature + 10.14333127
				* $humidity - .22475541 * $temperature * $humidity - .00683783 * $temperature
				* $temperature - .05481717 * $humidity * $humidity + .00122874 * $temperature
				* $temperature * $humidity + .00085282 * $temperature * $humidity * $humidity
				- .00000199 * $temperature * $temperature * $humidity * $humidity;

		echo '<p>
				<div style="color: red; font-size: large">
					<em><strong>The Heat Index is '. ($heatIndex) .'. </strong></em>
				</div>
				<p> Please input additional data to calculate another heat index.</p>
				<br>';
	} else {
		echo '<p>
		The temperature should be a number between 80 and 112.<br>
		The humidity should be a number between 13 and 85.<br>
		Please try again.
		</p>';
	}
}//end of php
?>


<form name="heat.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<fieldset>	
		<legend>
			<em>Get the Heat Index</em>
		</legend>
		<br>
		<div>
			Temperature:
			<input type="number" name="temperature" value="temperature" >
			<br>
			Humidity:
			<input style="margin-left: 21px" type="number" name="humidity" value="humidity" >
		</div>
		<br>
			<input style="background-color: green; color: white  "type="Submit"  value="Gimme the Heat Index">
	</fieldset>
</form>
	<p>
		If you need to take the temperature, but don't have a Thermometer, then see our <a href="workshops.php">Weather Workshops</a> to
		find a workshop on How to make a Thermometer.
	</p>

	<p>
		If you need to measure the relative humidity, but don't have a Hygrometer, don't worry, we have a
		<a href="workshops.php">Weather Workshops</a> that shows you how to make a Hygrometer too!
	</p>

	<p>
		(You can go to <a href="https://weather.com/">The Weather Channel</a> for those other guys The Weather Channel to 
		get these measurements, but taking measurements from them isn't as much fun as doing it yourself.)
	</p>

<?php include ('includes/footer.html'); ?>
