<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-08 14:17:06
         compiled from "C:\wamp\www\TestWeb\smarty\templates\smartyTable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2987756163f5369dc95-85026385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '627b7892514370ae9f5f6c4e779631fcbc35800c' => 
    array (
      0 => 'C:\\wamp\\www\\TestWeb\\smarty\\templates\\smartyTable.tpl',
      1 => 1444306563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2987756163f5369dc95-85026385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56163f53763344_09503479',
  'variables' => 
  array (
    'id' => 0,
    'i' => 0,
    'j' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56163f53763344_09503479')) {function content_56163f53763344_09503479($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">

<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 3;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['id']->value)+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['id']->value))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	<div class="row">

	<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int) ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['j']->step));
if ($_smarty_tpl->tpl_vars['j']->total > 0) {
for ($_smarty_tpl->tpl_vars['j']->value = 0, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++) {
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration == 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration == $_smarty_tpl->tpl_vars['j']->total;?>
		<?php if (isset($_smarty_tpl->tpl_vars['img']->value[$_smarty_tpl->tpl_vars['i']->value+$_smarty_tpl->tpl_vars['j']->value])) {?>
		<div class="col-md-4 portfolio-item">
			<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['img']->value[$_smarty_tpl->tpl_vars['i']->value+$_smarty_tpl->tpl_vars['j']->value];?>
">
			<h3>lalalal</h3>
		</div>
		<?php }?>
	<?php }} ?>

	</div>
<?php }} ?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>