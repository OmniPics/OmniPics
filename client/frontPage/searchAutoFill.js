/**
 * Created by tomasz on 30.10.15.
 */

function showResult(tagArray){
    // TODO: generate media div's for search, how many?
    var media = "<div class='media-object'><img class='thumb-image' src='images/thumbs/2iHDjiM.jpg' alt='...'>"+tagArray+"</div>";
    var media2 = "<div class='media-object'><img class='thumb-image' src='images/thumbs/My Snapshot99.jpg' alt='...'>"+tagArray+"</div>";
    var media3 = "<div class='media-object'><img class='thumb-image' src='images/thumbs/snek_irl.png' alt='...'>"+tagArray+"</div>";
    var media4 = "<div class='media-object'><img class='thumb-image' src='images/thumbs/3366ff.png' alt='...'>"+tagArray+"</div>";
    document.getElementById("livesearch").innerHTML = media + media2 + media3 + media4;
}

function hideResult() {
    document.getElementById("livesearch").innerHTML = "";
}