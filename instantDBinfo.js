
$(document).ready(function() {

    $('#input').change(function() {

        document.getElementById("submit").submit();
    });
}); 
/*
function getPicturesInstantly(order, sortBy, limit) {
    
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
    } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                $('#pictures').fadeOut('slow', function() {

                    document.getElementById("pictures").innerHTML = xmlhttp.responseText;
                    $('#pictures').fadeIn();
                });
                
             
            }
    }

    console.log('lllllllllllllllllllllllllllllllllllow');
    //xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.open("GET","loadPicturesFromDBreturningHTMLtableWithPics.php?order="+order+"&&sortby="+sortBy+"&&limit="+limit+"", true);
    xmlhttp.send();
}

window.onload = getPicturesInstantly('1','filename' ,'5');*/