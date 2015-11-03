<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="stylingPictureViewer.css" style="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="TagSystem/jQuery.tagit.css" rel="stylesheet" type="text/css">
    	<link href="TagSystem/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="functionsPictureViewer.js"></script>
		<script type="text/javascript" src="jQueryRotate.js"></script>
		<script src="TagSystem/tag-it.js" type="text/javascript" charset="utf-8"></script>
		
	</head>
	<body>



		<script language="JavaScript" type="text/javascript">
		{literal} //In order to write javascript in smarty

			var picsAscOrDesc = {/literal}{$picsAscDesc}{literal};
			var orderPicsBy = "{/literal}{$orderPicsBy}{literal}";
			var picsIndexStart = {/literal}{$picsIndexStart}{literal};
			var amountOfPics = 3; //Need two pictures to check if the next pic exists
			var nextPicExists = {/literal}{$nextPicExists}{literal};
			var prevPicExists = {/literal}{$prevPicExists}{literal};

			/*$(function() {


				$('#img').rotate(90);
			});*/
		
			function rotate(picture_id) {

				$.ajax({
			       type: "POST",
			       url: "rotate.php?picture_id="+picture_id+"",
			       success: function(result){
			            window.location = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"";
			            console.log(result);
			        }
			    });
			}


			function nextPic() {

				if(nextPicExists == 1){
					picsIndexStart++;
					window.location = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"";
				}
			}

			function previousPic() {

				if(prevPicExists == 1) {
					picsIndexStart--;
					window.location = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"";
				}
			}

			function pictureDelete(picture_id) {
				
			      
				$.ajax({
			       type: "POST",
			       url: "delete.php?picture_id="+picture_id+"",
			       complete: function() {
			       	
					    if(nextPicExists == 1) {
					    	window.location = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"";
						}else {

					    	if(prevPicExists == 1) { 
					    		previousPic();
					    	}else {
				    			window.location = "index.php";
					    	}	    		
						}
			       }

			    });

			}

			$(function(){

				var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];

			 	$('#myTags').tagit({ 
			 		availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
                	// configure the name of the input field (will be submitted with form), default: item[tags]
                	itemName: 'item',
                	fieldName: 'tags',
                	singleField: true,
                	singleFieldNode: $('#mySingleField')
            	});
			});

		{/literal}
		</script>
		<div id="parent" class="col-md-8">
		{if $prevPicExists eq true}
			<div id="leftChild" class="col-md-1" onclick="previousPic()"><span id="leftLogo" class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></div>
		{/if}
			<img id="img" style="display: none;" src="{$picture[0].path}?x= {php}date('H:i:s'){/php}">
		{if $nextPicExists eq true}
			<div id="rightChild" class="col-md-1" onclick="nextPic()"><span id="rightLogo" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></div>
		{/if}
			
				<div id ="topMenuRight">
					<button type="button" class="btn btn-default">
		  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					
					<button type="button" class="btn btn-default" onclick="rotate({$picture[0].picture_id})"> 
		  					<span class="glyphicon glyphicon-repeat" ></span>
					</button>
					<button  type="button" class="btn btn-default" onclick="pictureDelete({$picture[0].picture_id})">
		  					<span class="glyphicon glyphicon-trash"  ></span>
					</button>
				</div>
				<div id ="topMenuLeft">
					<button id="toFrontPageButton" type="button" class="btn btn-default" aria-label="Left Align" onclick="location.href='index.php'">Front Page
					</button>
				</div>
		</div>
		<div id="metadata" class="col-md-4">

		<h3>{$picture[0].filename}</h3>
			<ul class="list-group">
			  <li class="list-group-item">Filepath <input class="form-control" type="text" value="{$picture[0].path}"></li>
			  <li class="list-group-item">Place: {$picture[0].place}</li>
			  <li class="list-group-item">Date: {$picture[0].upload_date}</li>


			</ul>
			<h4>Tags</h4>
				<input name="tags" id="mySingleField" value="{$existingTags}" disabled="true" style="display: none;">
				<ul id="myTags"></ul>

		</div>


	

{include file="footer.tpl"}
