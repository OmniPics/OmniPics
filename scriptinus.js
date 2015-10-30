$(document).ready(function() {

	$('#topMenuRight').hide();
	$('#topMenuLeft').hide();



	var width = $('#parent').width();
	var height = $(window).height();

	$('#img').css('height', height+'px');
	$('#img').css('width', width+'px');

	$('body').height(height);
	$('div').height(height);

	var x = document.getElementById("retrieveImgInfo").naturalWidth;
	var y = document.getElementById("retrieveImgInfo").naturalHeight;

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

	var top = ( $('#rightChild').height() - $('#right').height() ) / 2;

	$('#right').css('top', top+'px');



	
	$(window).resize(function() {

		height = $(window).height();
	    width = $('#parent').width();

		$('#rightChild').css('height', (height-38)+'px');
		$('#leftChild').css('height', (height-38)+'px');

	    $('#img').height(height);
		$('#img').width(width);

		//$('body').height(height);
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
			$(this).css('opacity', '0.25');
	}, function() {
			$(this).css('opacity', '0');

	});

	$('#rightChild').hover(function() {
			$(this).css('opacity', '0.5');
	}, function() {
			$(this).css('opacity', '0');

	});

});