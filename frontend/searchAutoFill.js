/**
 * Created by tomasz on 30.10.15.
 */

function showResult(tagArray){
    var media = "<img class='media-object' src='images/thumbs/3366ff.png' alt='...'>"
    document.getElementById("livesearch").innerHTML = media + "<a>" + tagArray + "</a>";
}

function hideResult() {
    //document.getElementById("livesearch").innerHTML = "";
}