<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-07 00:45:12
         compiled from "smarty\templates\admin_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15596551d778a579af3-13773811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c588ad85907482b1da0bea2feb3c2e4964cff1ce' => 
    array (
      0 => 'smarty\\templates\\admin_product.tpl',
      1 => 1428360266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15596551d778a579af3-13773811',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551d778a6025d7_89693789',
  'variables' => 
  array (
    'errors' => 0,
    'product_id' => 0,
    'checkName' => 0,
    'name' => 0,
    'checkDesc' => 0,
    'desc' => 0,
    'checkPrice' => 0,
    'price' => 0,
    'checkBonus' => 0,
    'bonus_price' => 0,
    'checkPhoto' => 0,
    'photo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551d778a6025d7_89693789')) {function content_551d778a6025d7_89693789($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php $_smarty_tpl->tpl_vars["checkName"] = new Smarty_variable('', null, 0);
$_smarty_tpl->tpl_vars["checkDesc"] = new Smarty_variable('', null, 0);
$_smarty_tpl->tpl_vars["checkPrice"] = new Smarty_variable('', null, 0);
$_smarty_tpl->tpl_vars["checkBonus"] = new Smarty_variable('', null, 0);
$_smarty_tpl->tpl_vars["checkPhoto"] = new Smarty_variable('', null, 0);?>

<?php if (count($_smarty_tpl->tpl_vars['errors']->value)!=0) {?>

    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?>
        <?php $_smarty_tpl->tpl_vars['checkName'] = new Smarty_variable("form-group has-error", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['checkName'] = new Smarty_variable("form-group has-success", null, 0);?>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['desc'])) {?>
        <?php $_smarty_tpl->tpl_vars['checkDesc'] = new Smarty_variable("form-group has-error", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['checkDesc'] = new Smarty_variable("form-group has-success", null, 0);?>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['price'])) {?>
        <?php $_smarty_tpl->tpl_vars['checkPrice'] = new Smarty_variable("form-group has-error", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['checkPrice'] = new Smarty_variable("form-group has-success", null, 0);?>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['bonus_price'])) {?>
        <?php $_smarty_tpl->tpl_vars['checkBonus'] = new Smarty_variable("form-group has-error", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['checkBonus'] = new Smarty_variable("form-group has-success", null, 0);?>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['photo'])) {?>
        <?php $_smarty_tpl->tpl_vars['checkPhoto'] = new Smarty_variable("form-group has-error", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['checkPhoto'] = new Smarty_variable("form-group has-success", null, 0);?>
    <?php }?>

<?php }?>

<h1><?php if ($_smarty_tpl->tpl_vars['product_id']->value>0) {?>Modify<?php } else { ?>Add new<?php }?> product</h1>

<form action="admin.php" method="POST">
    <div class="<?php echo $_smarty_tpl->tpl_vars['checkName']->value;?>
"><label class="control-label">Name <input type="text" class="form-control" name="name" cols="22" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /></label><br /></div>
    <div class="<?php echo $_smarty_tpl->tpl_vars['checkDesc']->value;?>
"><label class="control-label">Description <textarea name="desc" class="form-control" rows="4" cols="22"><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</textarea></label><br /></div>
    <div class="<?php echo $_smarty_tpl->tpl_vars['checkPrice']->value;?>
"><label class="control-label">Price <input type="number" class="form-control" name="price" cols="22" value="<?php echo $_smarty_tpl->tpl_vars['price']->value;?>
"/></label><?php if (array_key_exists("price",$_smarty_tpl->tpl_vars['errors']->value)) {
echo $_smarty_tpl->tpl_vars['errors']->value['price'];
}?><br /></div>
    <div class="<?php echo $_smarty_tpl->tpl_vars['checkBonus']->value;?>
"><label class="control-label">Bonus price <input type="number" class="form-control" name="bonus_price" cols="22" value="<?php echo $_smarty_tpl->tpl_vars['bonus_price']->value;?>
" /></label><br /></div>
    <div class="<?php echo $_smarty_tpl->tpl_vars['checkPhoto']->value;?>
"><label class="control-label">Photo <input type="text" class="form-control" name="photo" cols="22" value="<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" /></label><br /></div>
    <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" />
    <input type="hidden" name="page" value="product" />
    <input type="hidden" name="action" value="do" />
    <input type="submit" class="btn btn-primary" value="<?php if ($_smarty_tpl->tpl_vars['product_id']->value>0) {?>Modify<?php } else { ?>Add new<?php }?> product" />
</form>

<?php echo $_smarty_tpl->getSubTemplate ("admin_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
