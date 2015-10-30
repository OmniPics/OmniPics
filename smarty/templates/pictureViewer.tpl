<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="stylingz.css" style="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" id ="script"></script>
		
	</head>
	<body>

	


		<script language="JavaScript" type="text/javascript">
		{literal} //In order to write javascript in smarty

			var picsAscOrDesc = {/literal}{$picsAscDesc}{literal};
			var orderPicsBy = "{/literal}{$orderPicsBy}{literal}";
			var picsIndexStart = {/literal}{$pictureIndex}{literal};
			var amountOfPics = '2'; //Need two pictures to check if the next pic exists

			$(document).ready(function() {
				pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics);
			});

			function pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics) {

				$.ajax({
			       type: "POST",
			       url: "getPictureViewerContent.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"",
			       success: function(result){
			            $("#parent").html(result);
			         },
			       complete: function() {

			       	$.getScript( "scriptinus.js", function( data, textStatus, jqxhr ) {
					  $('#script').append(data); // Data returned
					  console.log( textStatus ); // Success
					  console.log( jqxhr.status ); // 200
					  console.log( "Load was performed." );
					});

			       }
			       
			    });

			}

			function rotate(rotatePath, picture_id) {

				$.ajax({
			       type: "POST",
			       url: "getPictureViewerContent.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"&&rotatePath="+rotatePath+"&&picture_id="+picture_id+"",
			       success: function(result){
			            $("#parent").html(result);
			        }
			    });
			}

			function deletePic(pictureId, picsIndexStart, noMorePics) {
				
				if(noMorePics) {

					window.location = "index.php"; 
				}

				$.ajax({
			       type: "POST",
			       url: "getPictureViewerContent.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"&&deletePic="+pictureId+"",
			       success: function(result){
			            $("#parent").html(result);
			        }
			    });

			}

			function getScript() {

				$.ajax({
			       type: "POST",
			       url: "getScript.php",
			       success: function(result){
			            $("#script").html(result);
			        }
			    });

			}

			function nextPic() {

				$.redirect("index.php?picture_id="+{/literal}{$picsIndexStart}); 
			}

			function previousPic() {

				picsIndexStart--;
				pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics);
			}
			
		{/literal}
		</script>

		<div id="parent" class="col-md-8">

			<div id="leftChild" class="col-md-1" onclick="previousPic()"></div>
			<img id="img" src="{$picture.path}?x={php} date('H:i:s') {/php}" >
			<div id="rightChild" class="col-md-1" onclick="nextPic()"><span id="right" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></div>
			
				<div id ="topMenuRight">
					<button type="button" class="btn btn-default">
		  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>
					
					<button type="button" class="btn btn-default" onclick="rotate( {$picture.picture_id},'{$picture.path}')">
		  					<span class="glyphicon glyphicon-repeat" ></span>
					</button>
					<button  type="button" class="btn btn-default">
		  					<span class="glyphicon glyphicon-trash" onclick="deletePic( {$picture.picture_id} )" ></span>
					</button>
				</div>
				<div id ="topMenuLeft">
					<button id="toFrontPageButton" type="button" class="btn btn-default" aria-label="Left Align" onclick="location.href='index.php'">Front Page
					</button>
				</div>
		</div>
		<div id="metadata" class="col-md-4"></div>


	

{include file="footer.tpl"}
