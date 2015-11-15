<?php /* Smarty version 3.1.27, created on 2015-11-15 13:57:57
         compiled from "/var/www/html/Omnipics/smarty/templates/frontPage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:203452247556488155adb8d2_83947351%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65af30718fd2a2622ab10f0be2295ff8a350e933' => 
    array (
      0 => '/var/www/html/Omnipics/smarty/templates/frontPage.tpl',
      1 => 1447592269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203452247556488155adb8d2_83947351',
  'variables' => 
  array (
    'allExistingTags' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56488155b4a265_80547312',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56488155b4a265_80547312')) {
function content_56488155b4a265_80547312 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '203452247556488155adb8d2_83947351';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>




<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript">
<!-- search funciton javascript jQuery-->


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


function search() {
  var allTags = JSON.stringify($('#myTags').tagit('assignedTags'));
  searchPictures(allTags);
}

function pictureLink(startIndex) {
    var link = "index.php?page=pictureViewer&&picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+startIndex+"";
    $.redirect(link,{searchForKeys : keysArray});
}

$(function(){

  $('#myTags').tagit({
            availableTags: allExistingTags,
            singleField: true,
            singleFieldNode: $('#mySingleField'),
            removeConfirmation: true,

            afterTagAdded: function(evt, ui) {
                if (!ui.duringInitialization) {
                  var tag = $('#myTags').tagit('tagLabel', ui.tag);
                    search();
                }
            },
            afterTagRemoved: function(evt, ui) {
                var tag = $('#myTags').tagit('tagLabel', ui.tag);
                search();
            },

          });
      });

<?php echo '</script'; ?>
>

<div id="topArea">



    <div id="searcharea">

     <form id="submit" class="col-md-4" action="backend/bulkUpload.php" method="post" enctype="multipart/form-data">
    <span class="btn btn-default btn-file">
        <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Upload
        <input type="file" id="input" name="myPic[]" multiple="multiple">
    </span>
    </form>


        <div id="search" class="input-group">
            <!--<input id="keysearchfield" type="text" class="form-control" placeholder="Søk" >-->

            <input name="tags" id="mySingleField" disabled="true" style="display: none;" placeholder="Søk etter alle dine favorittbilder her!">
            <ul id="myTags"></ul>
            <h5>Søk etter alle dine favorittbilder her!</h5>

        <span class="input-group-btn">
            <!--<button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>-->
	    </span>
        </div>
        <div class="media">
            <div class="media-left">
                <div id="livesearch">

                </div> <!-- updated by javascript -->
            </div>
        </div>
    </div>


</div>

<div class="container">

    <ul class="nav nav-tabs">
        <li role="presentation" id="dato" onclick="sortBy('upload_date')"><a role="button">Dato</a></li>
        <li role="presentation" id="navn" onclick="sortBy('filename')"><a role="button">Navn</a></li>
        <li role="presentation" id="sted" onclick="sortBy('place')"><a role="button">Sted</a></li>
        <button id="trash" type="button" class="btn btn-default"
                onclick="deletePicsFromDB()">
            <span class="glyphicon glyphicon-trash"></span>
        </button>
        <button id="sort" type="button" class="btn btn-default" onclick="toggleAscDesc()">
            <span class="glyphicon glyphicon-sort"></span>
        </button>
    </ul>

    <div id="pictures"></div>
    
    <!--<div id="loadmoreajaxloader" style="height: 50px; width: 50px; display: none;"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></center></div>-->
   
    <div id="loadmoreajaxloader" style="display:none;"><center><img src="endlessScrolling/ajax-loader.gif" /></center></div>


</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>