<?php /* Smarty version 3.1.27, created on 2015-11-10 10:58:10
         compiled from "C:\wamp\www\OmniPics\smarty\templates\pictureEdit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:225615641bfb244ec87_53278522%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5fd21e36012fbb4748b6f9d78d79c262748fadc' => 
    array (
      0 => 'C:\\wamp\\www\\OmniPics\\smarty\\templates\\pictureEdit.tpl',
      1 => 1447089859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '225615641bfb244ec87_53278522',
  'variables' => 
  array (
    'picture_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5641bfb260b357_26871501',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5641bfb260b357_26871501')) {
function content_5641bfb260b357_26871501 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '225615641bfb244ec87_53278522';
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="./andjoh/css/font-awesome.min.css">   <!-- Bruker font-awesome -->
	 <link rel="stylesheet" href="./andjoh/css/bootstrap.min.css">    <!-- css fil for bootstrap -->
	 <?php echo '<script'; ?>
 src="./andjoh/assets/js/jquery.min.js"><?php echo '</script'; ?>
>  <!-- fulgte med pluginen. Skjønner bare delvis hva den gjør. Rotete formattering i kildefil -->
	 <?php echo '<script'; ?>
 src="./andjoh/assets/js/tooltip.min.js"><?php echo '</script'; ?>
>  <!-- javascript for tooltip. for å vise forklarende tekst over knapper.  -->
	 <?php echo '<script'; ?>
 src="./andjoh/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
> <!-- javascript for bootstrap -->
	 <?php echo '<script'; ?>
 src="./andjoh/plugin/cropper.js"><?php echo '</script'; ?>
>  <!-- javascript for pluginen vi bruker -->
	 <?php echo '<script'; ?>
 src="./andjoh/main.js"><?php echo '</script'; ?>
>

	</head>
	<body>  
	            <div id="parent" class="col-md-8">

				<div class="row docs-actions" id ="topMenuRight">
			       
					
					<button type="button" class="btn btn-default" data-method="zoom" data-option="0.1" title="zoom in">  
					<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
					<span class="fa fa-search-plus"></span>
					</span>
					</button>  
					<button type="button" class="btn btn-default" data-method="zoom" data-option="-0.1" title="zoom ut">  
					<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
					<span class="fa fa-search-minus"></span>
					</span>
					</button> 
						  
					<button type="button" class="btn btn-default" data-method="rotate" data-option="-45" title="Rotate venstre">  
				    <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
					<span class="fa fa-rotate-left"></span>
					</span>
				    </button>  
					<button type="button" class="btn btn-default" data-method="rotate" data-option="45" title="Rotate høyre">  
				    <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
				    <span class="fa fa-rotate-right"></span>
				     </span>
					</button>
					<button type="button" class="btn btn-default" data-method="getCroppedCanvas">    
					<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">
					Cropped  <!-- tekst på knapp--> </span>
					</button> 
					<button type="button" class="btn btn-default" data-method="clear" title="Clear"> 
					<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;clear&quot;)"> 
					<span class="fa fa-remove"></span>
					</span>
					</button>  <!-- clear button -->
					<button type="button" class="btn btn-default" data-method="reset" title="Reset"> 
					<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;reset&quot;)"> 
					<span class="fa fa-refresh"></span>
					</span>
					</button>
					
					<button type="button" class="btn btn-default"  onclick="location.href='index.php?page=pictureViewer&&picsAscOrDesc=0&&orderPicsBy=upload_date&&picsIndexStart=1'" title="Clear"> 
					<span> 
					<span>quit</span>
					</span>
					</button> 
					

				</div>
				
				 <img id="img" class="container-fluid" src="<?php echo $_smarty_tpl->tpl_vars['picture_path']->value;?>
">;
		
              </div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>