{include file="header.tpl"}

<div>


<div id="topArea">
	<button id="uploadButton" type="button" class="btn btn-default" aria-label="Left Align" onclick="location.href='fileupload.form.html'">
  		<span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Upload
	</button>
	<div id="search" class="input-group">
	    <input type="text" class="form-control" placeholder="Søk">
	    <span class="input-group-btn">
	        <button class="btn btn-default" type="button">
	        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	        </button>
	    </span>
	</div>
</div>

<div class="container">
		
	<ul class="nav nav-tabs">
        		<li role="presentation" id="dato" onclick="sortBy('dato')"><a role="button">Dato</a></li>
        		<li role="presentation" id="navn" onclick="sortBy('navn')"><a role="button">Navn</a></li>
        		<li role="presentation" id="sted" onclick="sortBy('sted')"><a role="button">Sted</a></li>
				<button id="trash" type="button" class="btn btn-default" onclick="useIt()">
  					<span class="glyphicon glyphicon-trash"></span>
				</button>
        		<button id="sort" type="button" class="btn btn-default">
  					<span class="glyphicon glyphicon-sort"></span>
				</button>
	</ul>


	{for $i=0 to $pictures|@count step 3}

		<div class="row">

			{for $j=0 to 2}	

				{if isset($pictures[$i+$j])}

					<div class="col-md-4 portfolio-item">
						<div id="golink{$i+$j}" onclick="pictureLink('index.php?page=pictureViewer&&picture_id={$i+$j}', '#golink{$i+$j}')">
							<!--<input id="hiddenValue{*i$+$j*}" type="hidden">-->
							<img onclick="selected('#frontPageImage{$i+$j}', {$pictures[$i+$j].picture_id})" id="frontPageImage{$i+$j}" class="img-responsive" src="{$pictures[$i+$j].path}"></a>
							<p id="pictureInfo">{$pictures[$i+$j].filename}</p>
						</div>
					</div>
				{/if}	
			{/for}
		</div>
	{/for}


</div>

{include file="footer.tpl"}