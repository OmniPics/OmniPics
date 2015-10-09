$(document).ready(function() {
	
	$('#dato').addClass('active');
});

function sortBy(sortingType) {

		switch(sortingType) {

			case "dato":

				if(!$('#dato').hasClass('active')) {

					$('#dato').addClass('active');
					$('#navn').removeClass('active');
					$('#sted').removeClass('active');
				}
				break;

			case "navn":

				if(!$('#navn').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').addClass('active');
					$('#sted').removeClass('active');
				}
				break;

			case "sted":

				if(!$('#sted').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').removeClass('active');
					$('#sted').addClass('active');
				}
				break;
		}
	}