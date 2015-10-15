$(document).ready(function() {


	$('#dato').addClass('active');

	$('#golink').click(function() {
        return false;
    	}).dblclick(function() {
        	window.location = this.href;
        	return false;
    });
});

var selectedPicture_ids = {};

function useIt() {
	$.ajax({
       type: "POST",
       url: "index.php?page=removePics",
       data: { 	selectedPictures : selectedPicture_ids }

    });

    window.location = "index.php";
    selectedPicture_ids = [];

}


function pictureLink(link_path, link_CSS_id) {

	$(''+link_CSS_id+'').dblclick(function() {

		window.location = link_path;
	});
}

function selected(image_CSS_id, db_picture_id) {

	if($(''+image_CSS_id+'').hasClass('selected')) {

		$(''+image_CSS_id+'').removeClass('selected');

		delete selectedPicture_ids[''+db_picture_id+''];

	}
	else {

		$(''+image_CSS_id+'').addClass('selected');



		selectedPicture_ids[''+db_picture_id+''] = db_picture_id;
	}
}


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
