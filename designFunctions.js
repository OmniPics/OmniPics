$(document).ready(function() {


	$('#input').change(function() {

		document.getElementById("submit").submit();
	});

	$('#golink').click(function() {
        return false;
    	}).dblclick(function() {
        	window.location = this.href;
        	return false;
    });

    sortBy(orderPicsBy);
});

var picsAscOrDesc = '0';
var orderPicsBy = "upload_date";
var amountOfPicsDisplayed = '9';

var selectedPicture_ids = {};

function toggleAscDesc() {

	if(picsAscOrDesc == '0'){

		picsAscOrDesc = '1';
	}else {
		picsAscOrDesc = '0';
	}

	listPicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed);
}

function listPicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed) {

	$.ajax({
       type: "POST",
       url: "loadPicturesFromDBreturningHTMLtableWithPics.php?order="+picsAscOrDesc+"&&sortby="+orderPicsBy+"&&limit="+amountOfPicsDisplayed+"",
       data: { 	selectedPictures : selectedPicture_ids },
       success: function(result){
            $("#pictures").html(result);
        }
    });

    selectedPicture_ids = {};
}

function deletePicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed) {

	listPicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed);
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

			case "upload_date":

				if(!$('#dato').hasClass('active')) {


					$('#dato').addClass('active');
					$('#navn').removeClass('active');
					$('#sted').removeClass('active');

					orderPicsBy = 'upload_date';
					listPicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed);

				}
				break;

			case "filename":

				if(!$('#navn').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').addClass('active');
					$('#sted').removeClass('active');

					orderPicsBy = 'filename';
					listPicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed);
				}
				break;

			case "place":

				if(!$('#sted').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').removeClass('active');
					$('#sted').addClass('active');

					orderPicsBy = 'place';
					listPicsFromDB(picsAscOrDesc, orderPicsBy, amountOfPicsDisplayed);
				}
				break;
		}
	}
