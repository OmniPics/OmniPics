function pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics) {

	$.ajax({
       type: "POST",
       url: "rotate.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"",
       success: function(result){
            $("#pictureViewer").html(result);
        }
    });


}

$(document).ready(function() {

	pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics);
});

var picsAscOrDesc = '0';
var orderPicsBy = "upload_date";
var picsIndexStart = '0';
var amountOfPics = "1";	