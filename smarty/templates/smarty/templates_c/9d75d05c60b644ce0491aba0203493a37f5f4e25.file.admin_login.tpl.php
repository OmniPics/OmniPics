<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-06 15:10:41
         compiled from "smarty\templates\admin_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13876551b1196e1eed9-43206431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d75d05c60b644ce0491aba0203493a37f5f4e25' => 
    array (
      0 => 'smarty\\templates\\admin_login.tpl',
      1 => 1428325815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13876551b1196e1eed9-43206431',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551b1196e623d3_97987589',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551b1196e623d3_97987589')) {function content_551b1196e623d3_97987589($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<h1>Login</h1>

<form action="admin.php" method="POST">
    <label>Username <input type="text" class="form-control" name="username" size="15" /></label><br />
    <label>Password <input type="password" class="form-control" name="password" size="15" /></label><br />
    <input type="hidden" name="page" value="login" />
    <input type="submit" class="btn btn-primary" value="Login" />
</form>

<?php echo $_smarty_tpl->getSubTemplate ("admin_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
