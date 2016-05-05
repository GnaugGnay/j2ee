<?php /* Smarty version 3.1.27, created on 2015-12-10 15:15:05
         compiled from "E:\php\zao\web\zao\template\goods\typeList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:856856692679385138_23713134%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2292a27a0ecce0e8425932a54e601719e27936b' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\goods\\typeList.tpl',
      1 => 1449552682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '856856692679385138_23713134',
  'variables' => 
  array (
    'info_list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566926795697a0_93558875',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566926795697a0_93558875')) {
function content_566926795697a0_93558875 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\php\\zao\\lib\\library\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '856856692679385138_23713134';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telphone=no, email=no" />
    <link rel="dns-prefetch" href="">
    <?php echo $_smarty_tpl->getSubTemplate ("../public/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</head>

<body>
<!-- header start -->
<?php echo $_smarty_tpl->getSubTemplate ("../public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!-- header end -->
<!-- container start -->
<div class="container">
    <div class="main">
        <div class="main-inner">
                <div class="main-page">
                    <div class="dm-page-head">
                        <div class="dm-nav">
                            <ul class="dm-nav-inner">
                                <li>
                                    <a class="current" href="">类型列表</a>
                                </li>
                                <li>
                                    <a href="?ct=index&ac=addType" >添加类型</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table class="dm-table table">
                        <thead>
                            <tr>
                                <th>类型名称</th>
                                <th>第一属性名字</th>
                                <th>第一属性内容</th>
                                <th>第二属性名字</th>
                                <th>第二属性内容</th>
                                <th>添加时间</th>
                                <th style="padding-right:20px;">操作</th>
                            </tr>
                        </thead>
                        <tbody id="banner_table">
                        <?php
$_from = $_smarty_tpl->tpl_vars['info_list']->value['list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
                            <tr>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cat_name'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cat_one_name'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cat_one'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cat_two_name'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cat_two'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ct'],"%Y-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8');?>
</td>
                                <td style="padding-right:20px;">
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['cid'] != 1) {?> <!--这里判断是否是默认的属性，默认属性只能修改-->
                                    <a data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cid'], ENT_QUOTES, 'UTF-8');?>
" class="js_type_delete">删除</a>
                                    <a href="?ct=index&ac=addType&content_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cid'], ENT_QUOTES, 'UTF-8');?>
" class="js_type_change">修改</a>
                                    <?php } else { ?>
                                    <a href="?ct=index&ac=addType&content_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cid'], ENT_QUOTES, 'UTF-8');?>
" class="js_type_change">修改</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                        </tbody>
                    </table>
                    <!-- ##### -->
                    <div class="dm-tfoot clearfix">
                        <div class="item fr">
                            <div class="page-cnt">共<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info_list']->value['total'], ENT_QUOTES, 'UTF-8');?>
条，每页<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info_list']->value['page_num'], ENT_QUOTES, 'UTF-8');?>
条</div>
                            <div class="dm-page dm-page-large dm-page-right">
                                <?php echo $_smarty_tpl->tpl_vars['info_list']->value['page_html'];?>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../public/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</div>

<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/js/lib/sea.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/js/lib/seajs_preload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/js/lib/seajs_config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    seajs.use('page/goods/typeList');
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>