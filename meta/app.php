<?php


	print("Hello world");

	$size = getimagesize("./test.jpg",$info);
	if(isset($info['APP13'])){
		
		$iptc = iptcparse($info['APP13']);
		var_dump($iptc);

	}


?>
