<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-28 10:45:36
         compiled from "smarty\templates\admin_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20581551b12f1175052-57549665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24a5c432bfc55cf3a04831d96a743208a4480387' => 
    array (
      0 => 'smarty\\templates\\admin_products.tpl',
      1 => 1430210726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20581551b12f1175052-57549665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551b12f11a88a5_41317235',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551b12f11a88a5_41317235')) {function content_551b12f11a88a5_41317235($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<h1>Product list</h1>



    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $('#example').dataTable(
                    {
                        "processing": true,
                        "serverSide": true,
                        "bFilter": true, // disable search
                        "ajax": "product_list2.php",
                        "order": [[ 3, "desc" ]],
                        "paging": true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]

                    }
            );
        });
    <?php echo '</script'; ?>
>



<table id="example" class="table" cellspacing="0" width="100%"> <!--table table-striped hover*/-->

    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Bonus price</th>
            <th>Photo</th>
        </tr>
    </thead>

    <!--
    <tbody>

    
        <tr>
            <td><a href="admin.php?page=product&product_id=</a></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    

    </tbody>
-->
    <tfoot>
        <tr>

            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Bonus price</th>
            <th>Photo</th>
        </tr>
    </tfoot>

</table>


<a href="admin.php?page=product"><input type="submit" value="Add new product" class="btn btn-primary"/></a>


<?php echo $_smarty_tpl->getSubTemplate ("admin_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
