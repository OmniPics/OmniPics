<?php /* Smarty version 3.1.27, created on 2015-11-06 22:05:37
         compiled from "c:\wamp\www\omnipics\smarty\templates\frontPage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:23320563d162186fe34_85241628%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bee20dbb6bf5e9148bd87db0500cf2cf499a96b' => 
    array (
      0 => 'c:\\wamp\\www\\omnipics\\smarty\\templates\\frontPage.tpl',
      1 => 1446829066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23320563d162186fe34_85241628',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563d16218ae642_75539015',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563d16218ae642_75539015')) {
function content_563d16218ae642_75539015 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '23320563d162186fe34_85241628';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div id="topArea">


    <form id="submit" action="bulkUpload.php" method="post" enctype="multipart/form-data">
	<span class="btn btn-default btn-file">
		<span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Upload
    	<input type="file" id="input" name="myPic[]" multiple="multiple">
	</span>
    </form>

    <div id="searcharea">
        <div id="search" class="input-group">
            <input type="text" class="form-control" placeholder="Søk" onkeyup="showResult(this.value)" onblur="hideResult()">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
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
                onclick="deletePicsFromDB(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics)">
            <span class="glyphicon glyphicon-trash"></span>
        </button>
        <button id="sort" type="button" class="btn btn-default" onclick="toggleAscDesc()">
            <span class="glyphicon glyphicon-sort"></span>
        </button>
    </ul>

    <div id="pictures"></div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>