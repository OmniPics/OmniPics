{include file="header.tpl"}

<div class="container">


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