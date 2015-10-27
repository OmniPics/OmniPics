{include file="header.tpl"}


	<h1>Smart page, this!</h1>

	
	
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Navn</th>
                <th>Fødselsdato</th>
                <th>Lønning</th>
                <th>img</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>id</th>
                <th>Navn</th>
                <th>Fødselsdato</th>
                <th>Lønning</th>
                <th>img</th>
            </tr>
        </tfoot>
    </table>

    <div id="imageBox">
		<img id="Kibuku" src="Pictures\IMG_1322.jpg"/>
	</div>

	<form action="http://localhost/TestWeb/Sport">
  		<input type="submit" value="Submit">
	</form>

	
{include file="footer.tpl"}