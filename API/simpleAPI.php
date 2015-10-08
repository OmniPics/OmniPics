<?php

    class API {
        public $filepath;
        public $dataset;
        public $data;
        public $file;

        public function __construct($filepath) {
            $this->filepath = $filepath;
        }

        public function loadFile() {
            $file = file_get_contents($this->filepath) or die("Could not find file");
            if($file) {
                $this->file = $file;
            }

            $formatted = json_decode($this->file, true) or die("failed");
            if($formatted) {
                $this->data = $formatted;
            }
        }

        /*
            in range => between $first and $last
            index >= $first || $index <= $last
        */

        public function getRange($first, $last) {
            $result = Array();
            foreach ($this->data as $indexOfImages => $imageArray) {
                foreach($imageArray as $key => $value) {
                    if($key == "id") {
                        if($value >= $first && $value <= $last) {
                            // the current value is in the range
                            print_r("value in range: " . $value);
                            print_r("<br>");
                            array_push($result, $imageArray);
                        } else {
                            print_r("value not in range <br>");
                        }
                    } else {
                        // the key is not ID, but filename or filetype
                    }
                }

            }
        }

        public function getImage($index) {
            $result = Array();
            foreach ($this->data as $indexOfImages => $imageArray) {
                foreach($imageArray as $key => $value) {
                    if($key == "id" && $value == intval($index)) {
                        // when the key is ID -> the value should be $index (parameter)
                        print_r("found<br>");
                        array_push($result, $imageArray);
                    } else {
                        // the key is not ID, but filename or filetype
                    }
                }

            }

            print_r($result);
        }

    }



?>
