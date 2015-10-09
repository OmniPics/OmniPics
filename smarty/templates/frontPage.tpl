{include file="header.tpl"}


<div id="search" class="input-group">
      <input type="text" class="form-control" placeholder="Søk">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </span>
    </div>


<div class="container">

	<ul class="nav nav-tabs">
		<a href='server/fileupload.form.html'>Upload</a>
        <li role="presentation" id="dato" onclick="sortBy('dato')"><a role="button">Dato</a></li>
        <li role="presentation" id="navn" onclick="sortBy('navn')"><a role="button">Navn</a></li>
        <li role="presentation" id="sted" onclick="sortBy('sted')"><a role="button">Sted</a></li>
    </ul>


	{foreach $pictures as $picture}
	<div class="row">
	<div class="col-md-4 portfolio-item">
					<img class="img-responsice" src="client/{$picture.path}" height="50%">
					<h3>{$picture.filename}</h3>
				</div>
	</div>
	{/foreach}

</div>

{include file="footer.tpl"}