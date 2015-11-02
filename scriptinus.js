




$(document).ready(function() {

	$('#topMenuRight').hide();
	$('#topMenuLeft').hide();

	var width = $('#parent').width();
	var height = $(window).height();

	$('#img').css('height', height+'px');
	$('#img').css('width', width+'px');

	$('body').height(height);
	$('div').height(height);


	var x = document.getElementById("img").naturalWidth;
	var y = document.getElementById("img").naturalHeight;

	var perfRatio = width/height;
	var imgRatio = x/y;



	$('#rightChild').css('height', (height-38)+'px');
	$('#leftChild').css('height', (height-38)+'px');

	console.log('height:' +height);
	console.log('width:' +width);

	console.log('nat-height:' +y);
	console.log('nat-width:' +x);


	if( (width > x) && (height > y) ) {

		
		$('#img').css('max-width', x);
		$('#img').css('max-height', y);

		var centerVertically=(height- y)/2;
		$('#img').css('top', centerVertically+'px');

	}else {


		
		if(imgRatio > perfRatio) {
			var centerVertically=(height- width/imgRatio)/2;
			$('#img').css('top', centerVertically+'px');
			$('#img').css('max-height', width/imgRatio);

		}else {

			
			$('#img').css('max-width', height*imgRatio);
		}

	}

	$('#parent').hover(function() {

		$('#topMenuRight').fadeIn();
		$('#topMenuLeft').fadeIn();


	});

	$('#metadata').hover(function() {

		$('#topMenuRight').fadeOut();
		$('#topMenuLeft').fadeOut();
	});

	var rightHoyden = $('#rightChild').height();
	var leftHoyden = $('#leftChild').height();

	var rightCenter = rightHoyden/2.5;
	var leftCenter = leftHoyden/2.5;

	var rightHalf = rightHoyden/4;
	var leftHalf = leftHoyden/4;

	$('#rightChild').height(rightHalf);
	$('#leftChild').height(leftHalf);

	$('#rightChild').css('top', rightCenter+'px');
	$('#leftChild').css('top', leftCenter+'px');

	var rightTop = ( $('#rightChild').height() - $('#rightLogo').height() ) / 2;
	var leftTop = ( $('#leftChild').height() - $('#leftLogo').height() ) / 2;

	$('#rightLogo').css('top', rightTop+'px');
	$('#leftLogo').css('top', leftTop+'px');




	
	$(window).resize(function() {

		height = $(window).height();
	    width = $('#parent').width();

		$('#rightChild').css('height', (height-38)+'px');
		$('#leftChild').css('height', (height-38)+'px');

	    $('#img').height(height);
		$('#img').width(width);

		$('body').height(height);
		$('#parent').height(height);

		if( (width > x) && (height > y) ) {

		
			$('#img').css('max-width', x);
			$('#img').css('max-height', y);

			var centerVertically=(height- y)/2;
			$('#img').css('top', centerVertically+'px');
		}else {

			if(imgRatio > perfRatio) {
				var centerVertically=(height- width/imgRatio)/2;
			$('#img').css('top', centerVertically+'px');

				$('#img').css('max-height', width/imgRatio);
			}else {

				$('#img').css('max-width', height*imgRatio);
			}
				
		}
		
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

	$(document).keydown(function(e) {
		
	    switch(e.which) {
	        case 37: 
	        	previousPic();
	        break;

	        case 39:
	        	nextPic();
	        break;

	        default: return; 
	    }
	    e.preventDefault(); 
	});

});

	