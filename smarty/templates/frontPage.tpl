{include file="header.tpl"}


<div id="search" class="input-group">
      <input type="text" class="form-control" placeholder="Søk">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </span>
    </div>

<a href='fileupload.form.html'>Upload</a>

<div class="container">

	<ul class="nav nav-tabs">
		<li role="presentation" id="upload"><a href='fileupload.form.html'>Upload</a></li>
        <li role="presentation" id="dato" onclick="sortBy('dato')"><a role="button">Dato</a></li>
        <li role="presentation" id="navn" onclick="sortBy('navn')"><a role="button">Navn</a></li>
        <li role="presentation" id="sted" onclick="sortBy('sted')"><a role="button">Sted</a></li>
    </ul>


{for $i=0 to $id|@count step 3}
	<div class="row">

	{for $j=0 to 2}
		{if isset($img[$i+$j])}
		<div class="col-md-4 portfolio-item">
			<img class="img-responsive" src="{$img[$i+$j]}">
			<h3>lalalal</h3>
		</div>
		{/if}
	{/for}

	</div>
{/for}

</div>

{include file="footer.tpl"}