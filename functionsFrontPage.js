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

     $(window).scroll(function(){

        if($(window).scrollTop() == $(document).height() - $(window).height()){

    		if(newIndexStart < amountOfPicsInDB) {
     			 
                $.ajax({
                    url: "loadFrontPage.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+newIndexStart+"&&amountOfPics="+6+"",
                    success: function(result){
                        $(result).hide().appendTo('#pictures').fadeIn('slow');
                        $('div#loadmoreajaxloader').fadeOut('slow');
     					newIndexStart += 9;
                    }
                });
            }else {
            	
            	$('div#loadmoreajaxloader').show();
            	$('div#loadmoreajaxloader').fadeOut('slow');
            }

            getAmountOfPicsInDB();
        }
    });
});

var picsAscOrDesc = '0';
var orderPicsBy = "upload_date";
var picsIndexStart = 0;
var amountOfPicsToLoad = 9;
var newIndexStart = 9;

var amountOfPicsInDB = 0;


var selectedPicture_ids = {};

function getAmountOfPicsInDB() {

	$.ajax({
       type: "POST",
       url: "amountOfPics.php",
       success: function(result){
            amountOfPicsInDB = result;
        }
    });
}

function toggleAscDesc() {

	if(picsAscOrDesc == '0') picsAscOrDesc = '1';
	else picsAscOrDesc = '0';

	listPicsFromDB(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPicsToLoad);
}

function listPicsFromDB(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPicsToLoad) {

	$.ajax({
       type: "POST",
       url: "loadFrontPage.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPicsToLoad+"",
       success: function(result){
       		$('#pictures').hide();
            $("#pictures").html(result);
            $('#pictures').fadeIn('slow');
            
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

function pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPicsToLoad) {

	$.ajax({
       type: "POST",
       url: "rotate.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPicsToLoad+"",
       success: function(result){
            $("#pictureViewer").html(result);
        }
    });
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
					listPicsFromDB(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPicsToLoad);

				}
				break;

			case "filename":

				if(!$('#navn').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').addClass('active');
					$('#sted').removeClass('active');

					orderPicsBy = 'filename';
					listPicsFromDB(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPicsToLoad);
				}
				break;

			case "place":

				if(!$('#sted').hasClass('active')) {

					$('#dato').removeClass('active');
					$('#navn').removeClass('active');
					$('#sted').addClass('active');

					orderPicsBy = 'place';
					listPicsFromDB(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPicsToLoad);
				}
				break;
		}
	}
