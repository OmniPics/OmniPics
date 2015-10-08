<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-27 23:05:31
         compiled from "smarty\templates\admin_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7261551b1196e6e725-89073075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b66561ef90f06938250982c9b65d89f60a640aed' => 
    array (
      0 => 'smarty\\templates\\admin_header.tpl',
      1 => 1430168546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7261551b1196e6e725-89073075',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551b1196ec7686_11817679',
  'variables' => 
  array (
    'logged_in' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551b1196ec7686_11817679')) {function content_551b1196ec7686_11817679($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title>Webshop Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.css"> <!-- //cdn.datatables.net/1.10.5/css/jquery.dataTables.css*/-->

    <link rel="stylesheet" type="text/css" href="http://www.ux.uis.no/~chriskru/ChrIstoph3r-assignments/10/Styling.css">


    <?php echo '<script'; ?>
 src="jquery-1.11.2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"><?php echo '</script'; ?>
>
    <!--<?php echo '<script'; ?>
 src="realSmudTabell.js"><?php echo '</script'; ?>
>-->


</head>
<body>




<?php if ($_smarty_tpl->tpl_vars['logged_in']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin_navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
<p>
    <?php if ($_smarty_tpl->tpl_vars['msg']->value=="error_login_empty") {?><div class="alert alert-danger" role="alert">Missing username or password</div><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msg']->value=="error_login_invalid") {?><div class="alert alert-danger" role="alert">Invalid username or password</div><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msg']->value=="error_product_form") {?><div class="alert alert-danger" role="alert">The form contains errors</div><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msg']->value=="success_product_mod") {?><div class="alert alert-success" role="alert">Modifications successfully saved</div><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msg']->value=="success_product_add") {?><div class="alert alert-success" role="alert">New product successfully added</div><?php }?>
</p>
<?php }?><?php }} ?>
