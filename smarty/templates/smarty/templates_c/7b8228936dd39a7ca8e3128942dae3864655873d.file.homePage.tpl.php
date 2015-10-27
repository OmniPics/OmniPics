<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-08 12:06:53
         compiled from "C:\wamp\www\TestWeb\smarty\templates\homePage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18620560a55ea201041-77694110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8228936dd39a7ca8e3128942dae3864655873d' => 
    array (
      0 => 'C:\\wamp\\www\\TestWeb\\smarty\\templates\\homePage.tpl',
      1 => 1444298397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18620560a55ea201041-77694110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560a55ea237e32_47568724',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560a55ea237e32_47568724')) {function content_560a55ea237e32_47568724($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



	<h1>Smart page, this!</h1>

	
	
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Navn</th>
                <th>Fødselsdato</th>
                <th>Lønning</th>
                <th>img</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>id</th>
                <th>Navn</th>
                <th>Fødselsdato</th>
                <th>Lønning</th>
                <th>img</th>
            </tr>
        </tfoot>
    </table>

    <div id="imageBox">
		<img id="Kibuku" src="Pictures\IMG_1322.jpg"/>
	</div>

	<form action="http://localhost/TestWeb/Sport">
  		<input type="submit" value="Submit">
	</form>

	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
