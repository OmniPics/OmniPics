$(document).ready(function() {



var arr = [];

arr['45'] = 45;

arr['56'] = 56;

$.ajax({        
       type: "POST",
       url: "http://localhost/jquery/resultpage.php",
       data: { 	array : arr }
    });

	window.location = "resultpage.php";

});