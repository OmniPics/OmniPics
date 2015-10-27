$(document).ready(function() {

	var height = $(window).height();

	$('#img').height(height);
	$('body').height(height);
	$('div').height(height);
	var x = document.getElementById("img").naturalWidth;
	//var maxHeight = $("#img").naturalHeight();
	$('#img').css('max-height', x);
	
	$(window).resize(function() {
		height = $(window).height();
		$('#img').height(height);
		$('body').height(height);
		$('div').height(height);
	});

	$('#leftChild').hover(function() {
			$(this).css('opacity', '0.5');
	}, function() {
			$(this).css('opacity', '0');

	});

	$('#rightChild').hover(function() {
			$(this).css('opacity', '0.5');
	}, function() {
			$(this).css('opacity', '0');

	});

});