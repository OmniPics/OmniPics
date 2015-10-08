<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-03 11:33:17
         compiled from "sportPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16230560a7202b41f59-43268547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a83cc9a97a69d2a97cef576468c29a23a8454fe5' => 
    array (
      0 => 'sportPage.tpl',
      1 => 1443864795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16230560a7202b41f59-43268547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560a7202b796c2_49176717',
  'variables' => 
  array (
    'navn' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560a7202b796c2_49176717')) {function content_560a7202b796c2_49176717($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<h1>Sports!</h1>

	<?php echo $_smarty_tpl->tpl_vars['navn']->value[2];?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
