<?php /* Smarty version 3.1.27, created on 2015-11-09 23:10:09
         compiled from "C:\wamp\www\OmniPics\smarty\templates\frontPage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7409564119c1d8ec78_20644622%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f26554a5eaea6d34e39c74f88fe2f641bf7fc87' => 
    array (
      0 => 'C:\\wamp\\www\\OmniPics\\smarty\\templates\\frontPage.tpl',
      1 => 1447107003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7409564119c1d8ec78_20644622',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564119c1dc33c1_62072032',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564119c1dc33c1_62072032')) {
function content_564119c1dc33c1_62072032 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7409564119c1d8ec78_20644622';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div id="topArea">



    <div id="searcharea">

     <form id="submit" class="col-md-4" action="backend/bulkUpload.php" method="post" enctype="multipart/form-data">
    <span class="btn btn-default btn-file">
        <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Upload
        <input type="file" id="input" name="myPic[]" multiple="multiple">
    </span>
    </form>

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
    <div id="loadmoreajaxloader" style="display:none;"><center><img src="endlessScrolling/ajax-loader.gif" /></center></div>
    

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>