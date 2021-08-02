	<!--
	AUTHOR: Paul Brylinski
	PURPOSE: Allow weather wizards to register and see fields they already entered
	CREATEDATE: 4/4/2021
	-->



	<!doctype HTML>
	<html>
	<head>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		h1 {
			border-bottom: 1px dashed;
		}
		section article{
			float: left
		}
		section aside{
			float: right
		}
		.big_margin{
			margin-left: 10px;
		}
		label{
			color: green;
		}
		.checkboxes{
			color: orange;
		}
		option{
			color: red;
		}
		.color{
			color: red;
		}
	
	</style>
</head>
<body>
<?php
	$page_title = 'Weather Wizards Registration';
	include ('includes/header.html');
	?>

	<?php
		$interest[] = "";
		//Check for form submission;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//Sticky Data
			//open field saved response
			if (!empty($_REQUEST['yourName'])) {
			$yourName = $_REQUEST['yourName'];
		} else {
			$yourName = NULL;
		}

		if (!empty($_REQUEST['parentName'])) {
			$parentName = $_REQUEST['parentName'];
		} else {
			$parentName = NULL;
		}
		if (!empty($_REQUEST['parentEmail'])) {
			$parentEmail = $_REQUEST['parentEmail'];
		} else {
			$parentEmail = NULL;
		}
		if (!empty($_REQUEST['parentPhone'])) {
			$parentPhone = $_REQUEST['parentPhone'];
		} else {
			$parentPhone = NULL;
		}
		if (!empty($_REQUEST['method'])) {
			$method = $_REQUEST['method'];
		} else {
			$method = NULL;
		}
		//workshop saved response
		if (isset($_POST['interest'])) {
			foreach ($_POST['interest'] as $value) {
				$interest[] = $value;
			}
		}
		//Location Saved response
		if (!empty($_REQUEST['location'])) {
			$location = $_REQUEST['location'];
		}	else {
			$location= NULL;
		}

		//begin if statements
		//everything is lined up
		if (empty($yourName)) {
			echo "<p>
				You forgot to enter your name.
			</p>";
		}
		if (empty($parentName)) {
			echo "<p>
				You forgot to enter your parent or guardian's name.
			</p>";
		}
		if (empty($parentEmail)) {
			echo "<p>
				You forgot to enter your parent or guardian's email.
			</p>";
		}
		if (empty($parentPhone)) {
			echo "<p>
				You forgot to enter your parent or guardian's phone.
			</p>";
		}
		if (empty($method)) {
			echo "<p>
				You forgot to enter your membership status.
			</p>";
		} 
		if (empty($yourName) 
			|| empty($method) 
			|| empty($parentName) 
			|| empty($parentEmail) 
			|| empty($parentPhone) 
			|| empty($method)
		) {
		echo "<p>
			Weather Wizard, We need your name and your parent or guardian's name, 
			email, phone, and your membership status to send information about our workshops. 
			Enter required information and click the register button again.
		</p>";
		} else {
		//if all of the above is good, server moves on to the following
		switch ($location) {
			case "charleston":
				echo "<p>
					You are nearest to our Charleston, SC location, the Holy City! Go River Dogs!";
				break;
			case "summerville":
				echo "<p>
					You are nearest to our Summerville, SC location, the birthplace of sweet tea! Refreshing!";
				break;
			case "pleasant":
				echo "<p>
					You are nearest to our Mt. Pleasant, SC location that has a historical and beachy vibe";
			default:
				echo "<p>
					Not sure of the nearest location? We will send you an email to keep in touch!";
		}
		
		//continue
		switch ($method) {
			case "yes":
				echo "<p>
					Welcome back $yourName! Thank you for being a member of weather wizards.";
				break;
			case "no":
				echo "<p>
					Hi $yourName, we hope you'll join Weather Wizards. We have more fun than a jar of lightning bugs!";
				break;
			case "sign":
				echo "<p>
					Hi $yourName, Welcome to Weather Wizards where the forecast is always a 99% change of fun!";
				break;
		}
		//processing checkbox
		if (isset($interest)) {
			echo "<p>
				You have chosen the following workshops:";
			foreach ($interest as $value) {
			echo "<p>
				$value <br>
			</p>";
			}
		} else {
			echo "<p>
				You have not chosen a workshop, but we add new workshops all the time. We'll keep you updated by email";
		}
		}
		}	
?>



<form name="register.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h1>Weather Wizards Workshops</h1>
			<p>
				We host weather wizards workshops throughout the year for kids from 6-12.
			</p>
					
			<p>
				Please note that the following workshops are free to members:
			</p>
				<ul>
					<li>Make a Rain Guage</li>
					<li>Make a Thermometer</li>
				</ul>
			<br>
		<fieldset>
			<legend class="member">
				Register Your Interests
			</legend>
				<div class="checkboxes">
					<input type="checkbox" name="interest[]" value="Make a Rain Guage" 
						<?php if (in_array('Make a Rain Guage', $interest)) echo(' CHECKED ');?>
						>Make a Rain Guage
						<br>
							
					<input type="checkbox" name="interest[]" value="Make a Thermometer"
						<?php if (in_array('Make a Thermometer', $interest)) echo(' CHECKED ');?>
						>Make a Thermometer
						<br>
				
					<input type="checkbox" name="interest[]" value="Make a Windsock"
						<?php if (in_array('Make a Windsock', $interest)) echo(' CHECKED '); ?>
						>Make a Windsock
						<br>
				
					<input type="checkbox" name="interest[]" value="Make Lightning in Your Mouth"
						<?php if (in_array('Make Lightning in Your Mouth', $interest)) echo(' CHECKED '); ?>
						>Make Lightning in Your Mouth
						<br>
				
					<input type="checkbox" name="interest[]" value="Make a Hygrometer"
						<?php if (in_array('Make a Hygrometer', $interest)) echo(' CHECKED '); ?>
						>Make a Hygrometer
						<br>
				</div>
	
				<br>
					
				<div class="big_margin">
					<p>
						<label>
							Your Name:
							<br>
							<input type="yourName" name="yourName" size="30" maxlength="100" 
							value="<?php if (isset($_POST['yourName'])) echo $_POST['yourName']; ?>">
						</label>
					</p>
					
					<p>
						<label>
							Your parent or guardian's name:
							<br>
							<input type="parentName" name="parentName"  size="30" maxlength="100" 
							value="<?php if (isset($_POST['parentName'])) echo $_POST['parentName']; ?>">
						</label>
					</p>
					
					<p>
						<label>
							Your parent or guardian's email:
							<br>
							<input type="parentEmail" name="parentEmail" size="30" maxlength="100" 
							value="<?php if (isset($_POST['parentEmail'])) echo $_POST['parentEmail']; ?>">
						</label>
					</p>

					<p>
						<label>
							Your parent or guardian's phone:
							<br>
							<input type="parentPhone" name="parentPhone" size="30" maxlength="100" 
							value="<?php if (isset($_POST['parentPhone'])) echo $_POST['parentPhone']; ?>">
						</label>
					</p>
				</div>
				
				<section>
					<p class="big_margin">
						Your closest center:
						<select name="location">
							<option 
								selected value="charleston" <?php if (isset($_POST['location']) 
								&& ($_POST['location'] == 'charleston')) echo 'selected = "selected"'; ?>
								>Charleston
							</option>
							
							<option 
								value="summerville" <?php if (isset($_POST['location']) 
								&& ($_POST['location'] == 'summerville')) echo 'selected = "selected"'; ?>
								>Summerville
							</option>
									
							<option 
								value="pleasant" <?php if (isset($_POST['location']) 
								&& ($_POST['location'] == 'pleasant')) echo 'selected = "selected"'; ?>
								>Mt. Pleasant
							</option>
						</select>
					</p>
							
					<p class="member">
						Are you a member?
						<label>
							<input type="radio" name="method" value="yes" <?php if (isset($_POST['method']) 
							&& ($_POST['method'] == 'yes')) echo 'checked="checked"'; ?>
							>Yes
						</label>
						<label>
							<input type="radio" name="method" value="no" <?php if (isset($_POST['method']) 
							&& ($_POST['method'] == 'no')) echo 'checked="checked"'; ?>
							>No 
						</label>
						<label>
							<input type="radio" name="method" value="sign" <?php if (isset($_POST['method']) 
							&& ($_POST['method'] == 'sign')) echo 'checked="checked"'; ?>
							>Sign me up.
						</label>
					</p>
					<br>
			<input type="submit" value="Register">
			<input type="reset"  value="Reset">
			<br>
			<br>
		</section>
	</fieldset>
</form>


<?php include ('includes/footer.html'); ?>
