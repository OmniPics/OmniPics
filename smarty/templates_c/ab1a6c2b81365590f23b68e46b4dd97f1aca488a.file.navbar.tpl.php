<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-08 12:05:16
         compiled from "C:\wamp\www\TestWeb\smarty\templates\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13480560a6a2f0a4b98-13027907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab1a6c2b81365590f23b68e46b4dd97f1aca488a' => 
    array (
      0 => 'C:\\wamp\\www\\TestWeb\\smarty\\templates\\navbar.tpl',
      1 => 1444298604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13480560a6a2f0a4b98-13027907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560a6a2f0c8c36_98299199',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560a6a2f0c8c36_98299199')) {function content_560a6a2f0c8c36_98299199($_smarty_tpl) {?><div id="navbaren">
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
            </button>
            <a class="navbar-brand" href="http://localhost/TestWeb">Webshop admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a role="button" id="visibilityOfProducts">Products</a></li>

                <li role="button" name="page" value="smartyTable"><a href="index.php?page=smartyTable">Smarty</a></li>
            </ul>
        </div>
    </div>
    </nav>
</div><?php }} ?>
