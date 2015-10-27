$(document).ready(function() {



var activities = ['Location Zero', 'Location One', 'Location Two'];


$.ajax({        
       type: "POST",
       url: "resultpage.php",
       data: { array : activities },
       success: function(data){alert(data);},
       failure: function(errMsg) {
            alert(errMsg);
    });

	/*window.location = "resultpage.php";*/

	
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


});