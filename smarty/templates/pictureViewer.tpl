{include file="header.tpl"}
	

		
		<div id="topArea">
			<button id="toFrontPageButton" type="button" class="btn btn-default" aria-label="Left Align" onclick="location.href='index.php'">Front Page
			</button>
		
		</div>
	<div class="container">

		<ul class="nav nav-tabs">
	        		<button id="pnecil" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					<button id="trash" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-trash" ></span>
					</button>
	        		<button id="sort" type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-sort"></span>
					</button>
		</ul>

		<div id="ViewerRow" class="row">


						<a {if (isset($pictures[$picture_id-1]))}href="index.php?page=pictureViewer&&picture_id={$picture_id - 1}"{/if}>
						<div class="col-md-1" id="tilbakeBlokk">
						
						</div></a>

						<div class="col-md-7" id="pictureViewerImg">
						<img class="img-responsive" src="{$pictures[$picture_id].path}">
						</div>

						
						<a {if (isset($pictures[$picture_id+1]))} href="index.php?page=pictureViewer&&picture_id={$picture_id + 1}"{/if}>
						 <div class="col-md-1" id="nesteBlokk">
						
						</div>
						</a>
						
						<div class="col-md-3">
						Metadata kommer her
					
					

					
						<!--<p>{$pictures[$i+$j].filename}</p>-->
						
					
			
		</div>


{include file="footer.tpl"}