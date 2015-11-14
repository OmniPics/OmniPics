<?php

class Metaclass {
	private $path;
	private $filename;
	public $meta;

	public function __construct($path, $filename) {
		$this->path = $path;
		$this->filename = $filename;
	}


	public function getMeta() {
		$info = array();
		$size = getimagesize($this->path . $this->filename, $info);


		if(isset($info['APP13'])) {
			$app13 = $info['APP13'];
			$iptcUnhandled = iptcparse($app13);
			$returnIPTCarray = $this->getIPTC($iptcUnhandled);

			print_r($returnIPTCarray);

		}
	}

	public function getIPTC($iptc_raw) {

		$iptc_tag_array = array(
			//"2#105" => "",
			"2#005" => "",
			"2#025" => "",		// keywords
			"2#055" => "",
			"2#090" => "",
			"2#095" => "",
			"2#110" => "", 		// credit - not necessarirly the owner/creator
			"2#115" => "",		// Source - Creator
			"2#116" => "",		// copyright
			"2#120" => ""		// caption abstact
		);

		foreach($iptc_raw as $tag=>$value) {
			//print_r($tag . "<br>");
			switch ($tag) {
				case "2#105":
					$iptc_tag_array['2#105'] = $value;
					//print_r("keyword<br>");
					break;
				case "2#116":
					$iptc_tag_array['2#116'] = $value;
					//print_r("copyright<br>");
					break;
				case "2#120":
					$iptc_tag_array['2#120'] = $value;
					//print_r("caption abstract<br>");
					break;
				case "2#025":
					$iptc_tag_array['2#025'] = $value;
					//print_r("keywords<br>");
					break;
				case "2#055":
					$iptc_tag_array['2#055'] = $value;
					//print_r("date created<br>");
					break;
				case "2#090":
					$iptc_tag_array['2#090'] = $value;
					//print_r("city<br>");
					break;
				case "2#095":
					$iptc_tag_array['2#095'] = $value;
					//print_r("state<br>");
					break;

				default:
					break;
			}
		}
		return $iptc_tag_array;
	}

	public function writeMeta($metaarray) {
		$definitions = array(
			"title" => "2#005",
			"keywords" => "2#025",
			"credit" => "2#110",
			"creator" => "2#115",
			"copyright" => "2#216",
			"description" => "2#220"
		);

		$foundtags = array();

		foreach($metaarray as $row=>$value) {
			foreach($definitions as $currentDef=>$tagValue) {
				if($row == $currentDef) {
					// keywords must be handled
					// they are keywords as array and not string
					if($row == "keywords") {
						$totalString = "";
						foreach($value as $currentKeyword) {
							$totalString .= $currentKeyword;
						}
						$foundtags[$tagValue] = $totalString;
					} else {
						$foundtags[$tagValue] = $value;
					}
				}
			}
		}

		/*
		foreach($metaarray as $row=>$value) {

			switch ($row) {
				case "title":
					$array["2#005"] = $value;
					break;
				case "description":
					$array["2#120"] = $value;
					break;
				case "keywords":
					$string = "";
					foreach($value as $currentTag) {
						$string .= "[" . $currentTag . "]";
					}
					$array["2#025"] = $string;
					break;
				case "author":
					# code...
					break;
				case "copyright":
					$array["2#025"] = $value;
					break;
				default:
					# code...
					break;
			}
		}*/

		$data = "";

		foreach($foundtags as $tag=>$string) {
			$tag = substr($tag, 2);
			$data .= $this->IPTCmakeTag(2,$tag, $string);
		}

		$newContent = iptcembed($data, $this->path . $this->filename);

		$file = fopen($this->path . $this->filename, "wb");
		fwrite($file, $newContent);
		fclose($file);

	}


	# CREDIT TO Thies C. Arntzen
	public function IPTCmakeTag($rec,$dat,$val){
	    $len = strlen($val);
	    if ($len < 0x8000)
	        return chr(0x1c).chr($rec).chr($dat).
	        chr($len >> 8).
	        chr($len & 0xff).
	        $val;
	    else
	        return chr(0x1c).chr($rec).chr($dat).
	        chr(0x80).chr(0x04).
	        chr(($len >> 24) & 0xff).
	        chr(($len >> 16) & 0xff).
	        chr(($len >> 8 ) & 0xff).
	        chr(($len ) & 0xff).
	        $val;
	}
}

$me = new Metaclass("./","img.jpg");

$me->getMeta();
print_r("<br>-----------------------------------<br>");

$array = array(
	"title" => "this is the title of the image",
	"keywords" => array("Hello;","World;", "This shit;", "Some tags;"),
	"credit" => "Thomas Darvik",
	"creator" => "Thomas Darvik is the creator",
	"copyright" => "THOMAS DARVIK @ DARVIK.NET",
	"description" => "This is a short description of the image"
);

$me->writeMeta($array);
print_r("<br>-----------------------------------<br>");
$me->getMeta();
/*

	function starter() {
		//getMeta("./samples/","1.jpg");

		getMeta("./","img.jpg");

		$iptc = array(
			"2#120" =>"Hello world",
			"2#025" => "Your keywords will be placed here",
			"2#116" => "Thomas Darvik heter jeg"
		);

		$data = "";
		foreach($iptc as $tag => $string) {
			$tag = substr($tag, 2);
			$data .= IPTCmakeTag(2,$tag, $string);
		}

		$content = iptcembed($data,"./img.jpg");
		$file = fopen("./img.jpg","wb");
		fwrite($file, $content);
		fclose($file);

		getMeta("./","img.jpg");
	}
}

*/
?>
