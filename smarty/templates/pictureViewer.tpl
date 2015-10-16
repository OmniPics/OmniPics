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

					<div class="col-md-8 portfolio-item viewingPic">
						

						<img class="visningsbilde" src="{$pictures[$picture_id].path}">
						 {if (isset($pictures[$picture_id+1]))}
						<a href="index.php?page=pictureViewer&&picture_id={$picture_id + 1}"> <div id="nesteBlokk"></div> </a>
						{/if}
						<div id="ekstraBlokk"></div>
						{if (isset($pictures[$picture_id-1]))}
						<a href="index.php?page=pictureViewer&&picture_id={$picture_id - 1}"> <div id="tilbakeBlokk"></div></a>
						{/if}

						</div>
						<!--<p>{$pictures[$i+$j].filename}</p>-->
						<p></p>
					
			
		</div>


{include file="footer.tpl"}