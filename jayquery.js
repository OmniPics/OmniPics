$('#triggerFile').on('click', function(e){
        e.preventDefault()
        $("#inputFile").trigger('click')
    });


$(document).ready(function() {

	$('#input').change(function() {

		document.getElementById("submit").submit();
	});

