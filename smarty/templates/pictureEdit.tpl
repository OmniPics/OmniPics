<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="./andjoh/css/font-awesome.min.css">   <!-- Bruker font-awesome -->
	 <link rel="stylesheet" href="./andjoh/css/bootstrap.min.css">    <!-- css fil for bootstrap -->
	 <script src="./andjoh/assets/js/jquery.min.js"></script>  <!-- fulgte med pluginen. Skjønner bare delvis hva den gjør. Rotete formattering i kildefil -->
	 <script src="./andjoh/assets/js/tooltip.min.js"></script>  <!-- javascript for tooltip. for å vise forklarende tekst over knapper.  -->
	 <script src="./andjoh/assets/js/bootstrap.min.js"></script> <!-- javascript for bootstrap -->
	 <script src="./andjoh/plugin/cropper.js"></script>  <!-- javascript for pluginen vi bruker -->
	 <script src="./andjoh/main.js"></script>

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
				
				 <img id="img" class="container-fluid" src="{$picture_path}?">;
		
              </div>
	
{include file="footer.tpl"}
