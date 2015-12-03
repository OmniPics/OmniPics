var picsAscOrDesc = '0';
var orderPicsBy = "upload_date";
var amountOfPicsToLoad = 9;
var newIndexStart = 9;
var picsIndexStart = 0;
var amountOfPicsInDB = 0;
var endOfPics = 0;
var picturesAreSelected = false;
var keysArray = {};
var selectedPicture_ids = {};

function getAmountOfPicsInDB() {

    $.ajax({
        type: "POST",
        url: "amountOfPics.php",
        success: function(result) {
            amountOfPicsInDB = result;
            endOfPics = parseInt(amountOfPicsInDB) + amountOfPicsToLoad;
        }
    });
}

function toggleAscDesc() {

    if (picsAscOrDesc == '0') picsAscOrDesc = '1';
    else picsAscOrDesc = '0';

    searchPictures(keysArray);
}

function searchPictures(keysArrayIn) {
    keysArray = keysArrayIn;
    console.log(keysArray);

    $.ajax({
        type: "POST",
        url: "loadFrontPage.php?picsAscOrDesc=" + picsAscOrDesc + "&&orderPicsBy=" + orderPicsBy + "&&picsIndexStart=" + picsIndexStart + "&&amountOfPics=" + amountOfPicsToLoad + "",
        data: {
            searchForKeys: keysArray
        },
        success: function(result) {
            $("#pictures").html(result);
            newIndexStart = 9;
        }
    });

}

function deletePicsFromDB() {

    $.ajax({
        type: "POST",
        url: "loadFrontPage.php?picsAscOrDesc=" + picsAscOrDesc + "&&orderPicsBy=" + orderPicsBy + "&&picsIndexStart=" + picsIndexStart + "&&amountOfPics=" + amountOfPicsToLoad + "",
        data: {
            selectedPictures: selectedPicture_ids
        },
        success: function(result) {
            searchPictures(keysArray);
            selectedPicture_ids = {};
            getAmountOfPicsInDB();
            newIndexStart = 9;
        }
    });
}

function multiTagging(tag) {

    $.ajax({
        type: "POST",
        url: "multiTagging.php?tag=" + tag + "",
        data: {
            selectedPictures: selectedPicture_ids
        },
        success: function(result) {

        }
    });
}

function multiTaggingDelete(tag) {

    $.ajax({
        type: "POST",
        url: "multiTagging.php?tagToDelete=" + tag + "",
        data: {
            selectedPictures: selectedPicture_ids
        },
        success: function(result) {

        }
    });
}


function pictureLink(startIndex) {

    var link = "index.php?page=pictureViewer&&picsAscOrDesc=" + picsAscOrDesc + "&&orderPicsBy=" + orderPicsBy + "&&picsIndexStart=" + startIndex + "";
    $.redirect(link, {
        searchForKeys: keysArray
    });
}


function selected(image_CSS_id, db_picture_id) {

    if ($('' + image_CSS_id + '').hasClass('selected')) {

        $('' + image_CSS_id + '').removeClass('selected');

        delete selectedPicture_ids['' + db_picture_id + ''];
    } else {

        $('' + image_CSS_id + '').addClass('selected');
        selectedPicture_ids['' + db_picture_id + ''] = db_picture_id;
    }

    console.log(selectedPicture_ids);
    if (jQuery.isEmptyObject(selectedPicture_ids)) {
        picturesAreSelected = false;
        $('#myTags').removeClass('taggingActive');
        $('#searchBarInfo').html('Søk etter bildene dine her!');
    }else {
        picturesAreSelected = true;
        $('#myTags').addClass('taggingActive');
        $('#searchBarInfo').html('Tag bildene her!');
    }
}

function search() {
    var allTags = JSON.stringify($('#myTags').tagit('assignedTags'));
    searchPictures(allTags);
}

function pictureLink(startIndex) {
    var link = "index.php?page=pictureViewer&&picsAscOrDesc=" + picsAscOrDesc + "&&orderPicsBy=" + orderPicsBy + "&&picsIndexStart=" + startIndex + "";
    $.redirect(link, {
        searchForKeys: keysArray
    });
}

function sortBy(sortingType) {


    switch (sortingType) {

        case "upload_date":

            if (!$('#dato').hasClass('active')) {


                $('#dato').addClass('active');
                $('#navn').removeClass('active');
                $('#sted').removeClass('active');

                orderPicsBy = 'upload_date';
                searchPictures(keysArray);
            }
            break;

        case "filename":

            if (!$('#navn').hasClass('active')) {

                $('#dato').removeClass('active');
                $('#navn').addClass('active');
                $('#sted').removeClass('active');

                orderPicsBy = 'filename';
                searchPictures(keysArray);
            }
            break;

        case "place":

            if (!$('#sted').hasClass('active')) {

                $('#dato').removeClass('active');
                $('#navn').removeClass('active');
                $('#sted').addClass('active');

                orderPicsBy = 'place';
                searchPictures(keysArray);
            }
            break;
    }
}

$(document).ready(function() {

    getAmountOfPicsInDB();
    sortBy(orderPicsBy);

    //AJAX for submit button

    $('#submit').on('submit', (function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                getAmountOfPicsInDB();
                selectedPicture_ids = {};
                newIndexStart = 9;

                searchPictures(keysArray);
                console.log("success");
                console.log(data);
            },
            error: function(data) {
                console.log("error");
                console.log(data);
            }
        });
    }));

    $("#input").on("change", function() {
        $("#submit").submit();
    });

    //-----------------------
    /*selectedPicture_ids.addEventListener('change', function(){
      if(selectedPicture_ids.length > 0) {
        enableTaggingField();
        picturesAreSelected = true;
      }
    });*/

    $('#golink').click(function() {
        return false;
    }).dblclick(function() {
        window.location = this.href;
        return false;
    });


    $(function() {

        $('#myTags').tagit({
            availableTags: allExistingTags,
            singleField: true,
            singleFieldNode: $('#mySingleField'),
            removeConfirmation: true,

            afterTagAdded: function(evt, ui) {
                if (!ui.duringInitialization) {
                    var tag = $('#myTags').tagit('tagLabel', ui.tag);
                    if (picturesAreSelected) {
                      multiTagging(tag);
                    } else {
                      search();
                    }
                }
            },
            afterTagRemoved: function(evt, ui) {
                var tag = $('#myTags').tagit('tagLabel', ui.tag);
                if (picturesAreSelected) {
                    multiTaggingDelete(tag);
                } else {
                    search();
                }
            },
        });
    });


    $(window).scroll(function() {

        if ($(window).scrollTop() == $(document).height() - $(window).height()) {

            if (newIndexStart < endOfPics) {

                console.log('indexStart: ' + newIndexStart + ' endOfPics: ' + endOfPics);

                $.ajax({
                    url: "loadFrontPage.php?picsAscOrDesc=" + picsAscOrDesc + "&&orderPicsBy=" + orderPicsBy + "&&picsIndexStart=" + newIndexStart + "&&amountOfPics=" + amountOfPicsToLoad + "",
                    data: {
                        searchForKeys: keysArray
                    },
                    success: function(result) {
                        $(result).hide().appendTo('#pictures').fadeIn('slow');
                        $('div#loadmoreajaxloader').fadeOut('slow');
                        newIndexStart += amountOfPicsToLoad;
                    }
                });
            } else {
                $('div#loadmoreajaxloader').show();
                $('div#loadmoreajaxloader').fadeOut('slow');
            }
        }
    });
});
