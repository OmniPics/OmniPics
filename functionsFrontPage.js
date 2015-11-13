$(document).ready(function() {

	getAmountOfPicsInDB();

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

     $(window).scroll(function(){

        if($(window).scrollTop() == $(document).height() - $(window).height()){

        	console.log('indexStart: '+newIndexStart+' endOfPics: '+ endOfPics);

    		if(newIndexStart < endOfPics) {

                $.ajax({
                    url: "loadFrontPage.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+newIndexStart+"&&amountOfPics="+6+"",
                    success: function(result){
                        $(result).hide().appendTo('#pictures').fadeIn('slow');
                        $('div#loadmoreajaxloader').fadeOut('slow');
     					newIndexStart += 6;
                    }
                });

            }else {

            	$('div#loadmoreajaxloader').show();
            	$('div#loadmoreajaxloader').fadeOut('slow');
            }

        }
    });
});

var picsAscOrDesc = '0';
var orderPicsBy = "upload_date";
var picsIndexStart = 0;
var amountOfPicsToLoad = 9;
var newIndexStart = 9;

var amountOfPicsInDB = 0;
var endOfPics = 0;

var keysArray = {};


var selectedPicture_ids = {};

function getAmountOfPicsInDB() {

	$.ajax({
       type: "POST",
       url: "amountOfPics.php",
       success: function(result){
            amountOfPicsInDB = result;
            endOfPics = parseInt(amountOfPicsInDB) + 6;
        }
    });
}

function toggleAscDesc() {

	if(picsAscOrDesc == '0') picsAscOrDesc = '1';
	else picsAscOrDesc = '0';

	searchPictures(keysArray);
}
function searchPictures(keysArrayIn) {
	keysArray = keysArrayIn;
	console.log(keysArray);
	$.ajax({
			 type: "POST",
			 url: "loadFrontPage.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPicsToLoad+"",
			 data: { searchForKeys : keysArray },
			 success: function(result){
					
				$("#pictures").html(result);
						

				}
		});

		selectedPicture_ids = {};
}

function deletePicsFromDB() {

	$.ajax({
       type: "POST",
       url: "loadFrontPage.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPicsToLoad+"",
       data: { 	selectedPictures : selectedPicture_ids },
       success: function(result){
            $('#pictures').html(result);
        }
    });

    selectedPicture_ids = {};
    getAmountOfPicsInDB();
    newIndexStart = 9;

}


function pictureLink(startIndex) {

		window.location = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+startIndex+"";
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



    	newIndexStart = 9;

		switch(sortingType) {

			case "upload_date":

				if(!$('#dato').hasClass('active')) {


					$('#dato').addClass('active');
					$('#navn').removeClass('active');
					$('#sted').removeClass('active');

					orderPicsBy = 'upload_date';
					searchPictures(keysArray);

				}
				break;

			case "filename":

				if(!$('#navn').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').addClass('active');
					$('#sted').removeClass('active');

					orderPicsBy = 'filename';
					searchPictures(keysArray);
				}
				break;

			case "place":

				if(!$('#sted').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').removeClass('active');
					$('#sted').addClass('active');

					orderPicsBy = 'place';
					searchPictures(keysArray);
				}
				break;
		}
	}
