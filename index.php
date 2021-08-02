<!-- AUTHOR: Paul Brylinski
PURPOSE: Weather Wizards Website
CREATEDATE: 3/28/2021 -->



<?php # Script 3.7 - index.php #2

	// This function outputs theoretical HTML
	// for adding ads to a Web page.
function create_ad() {
		echo '<p
		 	class="ad">Don\'t Forget to <a href="registration.php">Register</a> to Become a Weather Wizard!
		</p>';
		} // End of the function definition.

$page_title = 'Welcome to The Weather Wizards Site!';
include ('includes/header.html');

	// Call the function:
	create_ad();
?>

	<h1>
		Weather Wizards
	</h1>

	<p>
		Welcome to the Weather Wizards Website for budding meterologists in the Southern Lowcountry Area.
	</p>

	<p>
		Our Website is flooded with information about local weather, workshops, and more. so Check back often
	</p>

<?php

// Call the function again:
create_ad();

include ('includes/footer.html');
?>
