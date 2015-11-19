<!DOCTYPE html>
<html>
	<head>
		 <link rel="stylesheet" type="text/css" href="Client/pictureViewer/stylingPictureViewer.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="TagSystem/jQuery.tagit.css" rel="stylesheet" type="text/css">
    	<link href="TagSystem/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="functionsPictureViewer.js"></script>
		<script src="Client/frontPage/jquery.redirect.js" type="text/javascript" charset="utf-8"></script>
		<script src="TagSystem/tag-it.js" type="text/javascript" charset="utf-8"></script>

	</head>
	<body>



		<script language="JavaScript" type="text/javascript">
		{literal} //In order to write javascript in smarty
			var existsInPicsSearchedFor = true;
			var picsAscOrDesc = {/literal}{$picsAscDesc}{literal};
			var orderPicsBy = "{/literal}{$orderPicsBy}{literal}";
			var picsIndexStart = {/literal}{$picsIndexStart}{literal};
			var nextPicExists = {/literal}{$nextPicExists}{literal};
			var prevPicExists = {/literal}{$prevPicExists}{literal};
			var picture_id = {/literal}{$picture[0].picture_id}{literal};
			var keysArray = [];
			var allExistingTags = [];
			var amountOfPics = 3; //Need two pictures to check if the next pic exists

			{/literal}
			{foreach from=$allExistingTags item=tag}
    			{literal} allExistingTags.push('{/literal}{$tag}{literal}');
			{/literal}{/foreach}

			{foreach from=$keysArray item=key}
    			{literal} keysArray.push('{/literal}{$key}{literal}');
			{/literal}{/foreach}{literal}

			var amountOftagsSearchedFor = keysArray.length; 

			function rotate() {

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

				if(existsInPicsSearchedFor) {
					picsIndexStart++;
				}
				if(nextPicExists == 1) {
					var link = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"";
    				$.redirect(link,{searchForKeys : keysArray});
				}
			}

			function previousPic() {

				if(prevPicExists == 1) {
					picsIndexStart--;
					var link = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"";
    				$.redirect(link,{searchForKeys : keysArray});
				}
			}

			function pictureDelete() {

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


			function addTag(tag) {

				$.ajax({
			       type: "POST",
			       url: "editTags.php?picture_id="+picture_id+"&&tag="+tag+""
				});
			}

			function deleteTag(tag) {

				$.ajax({
			       type: "POST",
			       url: "editTags.php?picture_id="+picture_id+"&&tagToDelete="+tag+""
				});
			}

			$(document).keydown(function(e) {

			    switch(e.which) {
			        case 37:
			        	previousPic();
			        break;

			        case 39:
			        	nextPic();
			        break;

			        default: return;
			    }
			    e.preventDefault();
			});

			$(function(){

				$('#myTags').tagit({
                	availableTags: allExistingTags,
                	singleField: true,
                	singleFieldNode: $('#mySingleField'),
                	removeConfirmation: true,
					afterTagAdded: function(evt, ui) {
                    	if (!ui.duringInitialization) {
                    		var tag = $('#myTags').tagit('tagLabel', ui.tag);
                        	addTag(tag);
                    		if( $.inArray(tag, keysArray) > -1 ) {
                    			existsInPicsSearchedFor = true;
                    		}
                    	}
                	},
                	afterTagRemoved: function(evt, ui) {
                    	var tag = $('#myTags').tagit('tagLabel', ui.tag);
                    	deleteTag(tag);
                    	if( $.inArray(tag, keysArray) > -1 && existsInPicsSearchedFor ) {
                    		console.log('success');
                    		existsInPicsSearchedFor = false;
                    	}
                	}
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
					<button type="button" class="btn btn-default" onclick="location.href='index.php?page=pictureEdit&&picture_path={$picture[0].path}'">
		  					<span class="glyphicon glyphicon-pencil" ></span>
					</button>

					<button type="button" class="btn btn-default" onclick="rotate()">
		  					<span class="glyphicon glyphicon-repeat" ></span>
					</button>
					<button  type="button" class="btn btn-default" onclick="pictureDelete()">
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

			<ul class="list-group" id="metalist">
			  <li class="list-group-item">Filepath: <span id="filepath">{$picture[0].path}</span>
			  <input style="display: none;" id="inputFilepath" class="form-control" type="text" value="{$picture[0].path}"></li>
			  <li class="list-group-item">Place: <span id="place">{$picture[0].place}</span><input style="display: none;" id="inputPlace" class="form-control" type="text" value="{$picture[0].place}"></li>
			  <li class="list-group-item">Date: <span id="date">{$picture[0].upload_date}</span><input style="display: none;" id="inputDate" class="form-control" type="text" value="{$picture[0].upload_date}"></li>
			</ul>
			<button id="edit" type="button" class="btn btn-default">
		  		Edit
			</button>
			<button id="save" type="button" class="btn btn-default" style="display: none;">
		  		Save
			</button>

			<h4>Tags</h4>
			<input name="tags" id="mySingleField" value="{$tagsBoundToPic}" disabled="true" style="display: none;">
			<ul id="myTags"></ul>

			<div id="loadmoreajaxloader" style="display: none;"><img src="endlessScrolling/ajax-loader.gif"/></center></div>
		</div>


{include file="footer.tpl"}
