<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-07 00:56:54
         compiled from "smarty\templates\admin_navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5468551b12e57e4ac8-70777818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8afae8a0f9a6f3dfd7cdd62831d5a3f4bd45e3c9' => 
    array (
      0 => 'smarty\\templates\\admin_navbar.tpl',
      1 => 1428361012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5468551b12e57e4ac8-70777818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551b12e57e7806_37786285',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551b12e57e7806_37786285')) {function content_551b12e57e7806_37786285($_smarty_tpl) {?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <!--<span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>-->
            </button>
            <a class="navbar-brand" href="admin.php">Webshop admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin.php?page=products">Products</a></li>

                <li><a href="admin.php?page=logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav><?php }} ?>
