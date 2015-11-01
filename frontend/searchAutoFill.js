/**
 * Created by tomasz on 30.10.15.
 */

function showResult(tagArray){
    // TODO: generate media div's for search, how many?
    var tag = "<a>"+tagArray+"</a>";
    var media = "<div class='media-object'><img src='images/thumbs/3366ff.png' alt='...'>"+tag+"</div>";
    var media2 = "<div class='media-object'><img src='images/thumbs/images.jpeg' alt='...'>"+tag+"</div>";
    document.getElementById("livesearch").innerHTML = media + media2;
}

function hideResult() {
    document.getElementById("livesearch").innerHTML = "";
}