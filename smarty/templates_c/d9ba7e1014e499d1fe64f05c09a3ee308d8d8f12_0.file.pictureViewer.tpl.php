<?php /* Smarty version 3.1.27, created on 2015-11-06 22:03:34
         compiled from "c:\wamp\www\omnipics\smarty\templates\pictureViewer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19772563d15a6c4ffe4_41702187%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9ba7e1014e499d1fe64f05c09a3ee308d8d8f12' => 
    array (
      0 => 'c:\\wamp\\www\\omnipics\\smarty\\templates\\pictureViewer.tpl',
      1 => 1446843809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19772563d15a6c4ffe4_41702187',
  'variables' => 
  array (
    'picsAscDesc' => 0,
    'orderPicsBy' => 0,
    'picsIndexStart' => 0,
    'nextPicExists' => 0,
    'prevPicExists' => 0,
    'picture' => 0,
    'allExistingTags' => 0,
    'tag' => 0,
    'tagsBoundToPic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563d15a6d61723_45086866',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563d15a6d61723_45086866')) {
function content_563d15a6d61723_45086866 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19772563d15a6c4ffe4_41702187';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="stylingPictureViewer.css" style="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="TagSystem/jQuery.tagit.css" rel="stylesheet" type="text/css">
    	<link href="TagSystem/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="functionsPictureViewer.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="jQueryRotate.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="TagSystem/tag-it.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
		
	</head>
	<body>



		<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript">
		 //In order to write javascript in smarty

			var picsAscOrDesc = <?php echo $_smarty_tpl->tpl_vars['picsAscDesc']->value;?>
;
			var orderPicsBy = "<?php echo $_smarty_tpl->tpl_vars['orderPicsBy']->value;?>
";
			var picsIndexStart = <?php echo $_smarty_tpl->tpl_vars['picsIndexStart']->value;?>
;
			var amountOfPics = 3; //Need two pictures to check if the next pic exists
			var nextPicExists = <?php echo $_smarty_tpl->tpl_vars['nextPicExists']->value;?>
;
			var prevPicExists = <?php echo $_smarty_tpl->tpl_vars['prevPicExists']->value;?>
;
			var picture_id = <?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['picture_id'];?>
;
			var allExistingTags = [];

			
			<?php
$_from = $_smarty_tpl->tpl_vars['allExistingTags']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tag']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
$foreach_tag_Sav = $_smarty_tpl->tpl_vars['tag'];
?>
    			 allExistingTags.push('<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
');
			<?php
$_smarty_tpl->tpl_vars['tag'] = $foreach_tag_Sav;
}
?>

			/*$(function() {


				$('#img').rotate(90);
			});*/
		
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
                    	}
                	},
                	afterTagRemoved: function(evt, ui) {
                    	var tag = $('#myTags').tagit('tagLabel', ui.tag);
                    	deleteTag(tag);
                	},

              	});
            });

			

		

		<?php echo '</script'; ?>
>
		<div id="parent" class="col-md-8">
		<?php if ($_smarty_tpl->tpl_vars['prevPicExists']->value == true) {?>
			<div id="leftChild" class="col-md-1" onclick="previousPic()"><span id="leftLogo" class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></div>
		<?php }?>
			<img id="img" style="display: none;" src="<?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['path'];?>
?x= <?php date('H:i:s')?>">
		<?php if ($_smarty_tpl->tpl_vars['nextPicExists']->value == true) {?>
			<div id="rightChild" class="col-md-1" onclick="nextPic()"><span id="rightLogo" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></div>
		<?php }?>
			
				<div id ="topMenuRight">
					<button type="button" class="btn btn-default" onclick="location.href='index.php?page=pictureEdit&&picture_path=<?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['path'];?>
'">
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

		<h3><?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['filename'];?>
</h3>
			<ul class="list-group">
			  <li class="list-group-item">Filepath <span id="filepath"><?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['path'];?>
</span><input style="display: none;" id="inputFilepath" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['path'];?>
"></li>
			  <li class="list-group-item">Place: <span id="place"><?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['place'];?>
</span><input style="display: none;" id="inputPlace" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['place'];?>
"></li>
			  <li class="list-group-item">Date: <span id="date"><?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['upload_date'];?>
</span><input style="display: none;" id="inputDate" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['picture']->value[0]['upload_date'];?>
"></li>
			</ul>
			<button id="edit" type="button" class="btn btn-default">
		  		Edit
			</button>
			<button id="save" type="button" class="btn btn-default" style="display: none;">
		  		Save
			</button>

			<h4>Tags</h4>
				<input name="tags" id="mySingleField" value="<?php echo $_smarty_tpl->tpl_vars['tagsBoundToPic']->value;?>
" disabled="true" style="display: none;">
				<ul id="myTags"></ul>

		</div>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>