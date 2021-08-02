<!--
AUTHOR: Paul Brylinski
PURPOSE: Provide Data for all City options
CREATEDATE: 4/24/2021
-->


	<?php
	$page_title = 'Climate Data';
	include ('includes/header.html');

  //Heading
	echo '<h1>Climate Data for All Cities</h1>';

  // Connect to the db.
  require ('mysqli_connect.php'); 

      //Begin Query
      $q = "SELECT city, state, record_high, record_low, days_clear, 
            days_cloudy, days_with_precip, days_with_snow FROM city_stats ORDER BY city ASC;";
      
      $r = @mysqli_query ($dbc, $q); // Run the query.

      // Count the number of returned rows:
      $num = mysqli_num_rows($r);

          if ($num > 0) { 
              echo "<p>There are currently $num Cities.</p>\n";

              // Table header.
              echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
                  <tr>
                      <td align="left"><b>City</b></td>
                      <td align="left"><b>State</b></td>
                      <td align="left"><b>High</b></td>
                      <td align="left"><b>Low</b></td>
                      <td align="left"><b>Days Clear</b></td>
                      <td align="left"><b>Days Cloudy</b></td>
                      <td align="left"><b>Days with Precip</b></td>
                      <td align="left"><b>Days with Snow</b></td>
                  </tr>';

              // Fetch and print all the records:
              while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                  echo '<tr>
                      <td align="left">' . $row['city'] . '</td>
                      <td align="left">' . $row['state'] . '</td>
                      <td align="left">' . $row['record_high'] . '</td>
                      <td align="left">' . $row['record_low'] . '</td>
                      <td align="left">' . $row['days_clear'] . '</td>
                      <td align="left">' . $row['days_clear'] . '</td>
                      <td align="left">' . $row['days_with_precip'] . '</td>
                      <td align="left">' . $row['days_with_snow'] . '</td>
                  </tr>';
          } 

              echo '</table>'; // Close the table.

          mysqli_free_result ($r);

          } else { 

          echo '<p class="error">There are currently no cities in the database.</p>';

          }

  mysqli_close($dbc); // Close the database connection.

  //finish with include statement producing footer
  include ('includes/footer.html');

  ?>
