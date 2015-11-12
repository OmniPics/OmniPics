<?php
require ('setup.php');
require ('Picture.php');
/**
 * Instagram filters with PHP and ImageMagick
 *
 * @package    Instagraph
 * @author     Webarto &lt;dejan.marjanovic@gmail.com>
 * @copyright  NetTuts+
 * @license    http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC
 */

class Instagraph
{

    public $_image = NULL;
    public $_output = NULL;
    public $_prefix = 'IMG';
    private $_width = NULL;
    private $_height = NULL;
    private $_tmp = NULL;

    public static function factory($image, $output)
    {
        return new Instagraph($image, $output);
        echo "no";
    }

    public function __construct($image, $output)
    {
      $image = ('images/Mercedes Benz_SL_VVSCV3_545_1.jpg');
        if(file_exists($image))
        {
            //$this->_image = $image;
          //  $image = ('images/Mercedes Benz_SL_VVSCV3_545_1.jpg');
            list($this->_width, $this->_height) = getimagesize($image);
            $this->_output = $output;
        }
        else
        {
            throw new Exception('File not found. Aborting.');
        }
    }

    public function tempfile()
    {
        # copy original file and assign temporary name
        $this->_tmp = $this->_prefix.rand();
        copy($this->_image, $this->_tmp);
    }

    public function output()
    {
        # rename working temporary file to output filename
        rename($this->_tmp, $this->_output);
    }

    public function execute($command)
    {
        # remove newlines and convert single quotes to double to prevent errors
        $command = str_replace(array("\n", "'"), array('', '"'), $command);
        $command = escapeshellcmd($command);
        # execute convert program
        exec($command);
    }

    /** ACTIONS */

    public function colortone($input, $color, $level, $type = 0)
    {
        $args[0] = $level;
        $args[1] = 100 - $level;
        $negate = $type == 0? '-negate': '';

        $this->execute("convert
        {$input}
        ( -clone 0 -fill '$color' -colorize 100% )
        ( -clone 0 -colorspace gray $negate )
        -compose blend -define compose:args=$args[0],$args[1] -composite
        {$input}");
    }

    public function border($input, $color = 'black', $width = 20)
    {
        $this->execute("convert $input -bordercolor $color -border {$width}x{$width} $input");
    }

    public function frame($input, $frame)
    {
        $this->execute("convert $input ( '$frame' -resize {$this->_width}x{$this->_height}! -unsharp 1.5×1.0+1.5+0.02 ) -flatten $input");
    }

    public function vignette($input, $color_1 = 'none', $color_2 = 'black', $crop_factor = 1.5)
    {
        $crop_x = floor($this->_width * $crop_factor);
        $crop_y = floor($this->_height * $crop_factor);

        $this->execute("convert
        ( {$input} )
        ( -size {$crop_x}x{$crop_y}
        radial-gradient:$color_1-$color_2
        -gravity center -crop {$this->_width}x{$this->_height}+0+0 +repage )
        -compose multiply -flatten
        {$input}");
    }
    public function toaster()
    {
        $this->tempfile();
        $this->colortone($this->_tmp, '#330000', 100, 0);

        $this->execute("convert $this->_tmp -modulate 150,80,100 -gamma 1.2 -contrast -contrast $this->_tmp");

        $this->vignette($this->_tmp, 'none', 'LavenderBlush3');
        $this->vignette($this->_tmp, '#ff9966', 'none');
        echo "shit";


        $this->output();
    }
    /** RESERVED FOR FILTER METHODS */

}
