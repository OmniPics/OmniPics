



<?php

	

	echo "
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
	<script>


	function go() {

		var dataObject = { routeID: 'routeID',
                   custID:  'custID',
                   stopnumber: 'stopnumber',
                   customer: 'customer',
                   latitude: 'lat',
                   longitute: 'lng',
                   timestamp: 'timeStamp'};

		$.ajax({ 
			 type: 'POST',
             url: 'resultpage.php',
             data: dataObject,
             cache: false,
             success: function(response)
             {/*check response: it's always good to check server output when developing...*/
                 console.log(response);
                 alert('You will redirect in 10 seconds');

             }	
    });

	/*window.location = 'resultpage.php';*/
}
</script>";

echo "<div style='height: 100px; width: 200px; background-color:green;' onclick='go()'></div>";

	$array;

	echo "<p>yeeeeeeeeeeeeeeeeeeeeee". $_POST['routeID'];

	

		
	/*}*/ echo "</p>";

echo "</br>";
	//$smud = $_REQUEST['filename'];


	$smudArr = array();

	$smudArr['45'] = 45;
	$smudArr['46'] = 46;
	$smudArr['47'] = 47;
	$smudArr['48'] = 48;
	$smudArr['49'] = 49;

	$smudArr['50'] = 50;
	$smudArr['51'] = 51;


	//echo $smud;

	foreach ($smudArr as $key => $value) {
		echo $key . "=>" . $value . "</br>";
	} 

	?>

	</html>
