

var wrapper;

window.onload = function() {
    wrapper = document.getElementById("wrapper");


    getImages("./api/getImages.php?startIndex=1&offset=20");
}

function getImages(url) {

	var images = [];

	$.ajax({
		url: url,
		method: "GET"
	}).done(function(data) {
		var formatted = JSON.parse(data);
		renderImages(formatted);
	});
}

function renderImages(data) {
	for(var i = 0; i<data.length; i++) {
		var current = data[i];
		
		console.log(current);
		var div = document.createElement("div");
		var h2 = document.createElement("h2");
		var innerDiv = document.createElement("div");
		var image = document.createElement("img");

		div.className = "white";

		h2.innerHTML = current[1];
		image.setAttribute("src","./images/" + current[2] + "." + current[3]);

		innerDiv.appendChild(image);

		div.appendChild(h2);
		div.appendChild(innerDiv);

		wrapper.appendChild(div);
	

	}
}
