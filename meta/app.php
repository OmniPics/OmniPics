<?php

class Metaclass {
	private $path;
	private $filename;
	public $meta;

	public function __construct($path, $filename) {
		$this->path = $path;
		$this->filename = $filename;
	}


	public $definitions = array(
		"title" => "2#005",
		"keywords" => "2#025",
		"credit" => "2#110",
		"creator" => "2#115",
		"copyright" => "2#216",
		"description" => "2#220"
	);


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

		$foundTags = array();


		foreach($iptc_raw as $rawTag=>$rawValue) {
			foreach($this->definitions as $currentDefHuman=>$currentDefIndex) {
				if($rawTag == $currentDefIndex) {
					// the tags match

					$foundTags[$currentDefHuman] = $rawValue;

				}
			}
		}
		return $foundTags;
	}

	public function writeMeta($metaarray) {


		$foundtags = array();

		foreach($metaarray as $row=>$value) {
			foreach($this->definitions as $currentDef=>$tagValue) {
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

?>
