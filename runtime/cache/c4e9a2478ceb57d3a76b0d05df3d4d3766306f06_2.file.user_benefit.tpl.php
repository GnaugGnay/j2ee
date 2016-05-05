<?php /* Smarty version 3.1.27, created on 2016-01-05 11:58:25
         compiled from "E:\php\zao\web\zao\template\trade\user_benefit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19228568b3f6156ee22_25433850%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4e9a2478ceb57d3a76b0d05df3d4d3766306f06' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\trade\\user_benefit.tpl',
      1 => 1451966303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19228568b3f6156ee22_25433850',
  'variables' => 
  array (
    'order' => 0,
    'info' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_568b3f616b31e1_84627288',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_568b3f616b31e1_84627288')) {
function content_568b3f616b31e1_84627288 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\php\\zao\\lib\\library\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '19228568b3f6156ee22_25433850';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telphone=no, email=no" />
    <link rel="dns-prefetch" href=" ">
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
            <div class="main-container">
                <div class="dm-page-head">
                    <div class="dm-nav">
                    <ul class="dm-nav-inner">
                        <li>
                            <a class="current"> 用户提成记录列表</a>
                        </li>
                    </ul>
                    </div>
                    <div class="right-item vercenter-wrap">
                        <span class="dm-search-item item vercenter">
                            <span class="dm-input">
                              <input class="form-control" name="keyword" type="text" placeholder="输入卖家名字指定搜索" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['keyword'], ENT_QUOTES, 'UTF-8');?>
"/>
                            </span>
                            <button class="btn-orange btn" id="search">搜索</button>
                        </span>
                    </div>
                </div>
                <div class="table-wrap">
                    <table class="dm-table-large dm-table table table-striped">
                        <thead>
                            <tr>
                                <th>订单号</th>
                                <th>买家</th>
                                <th>卖家</th>
                                <th>商品</th>
                                <th>单价</th>
                                <th>数量</th>
                                <th>用户利润</th>
                                <th>交易时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->tpl_vars['info']->value['list'];
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
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname_buyer'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname_seller'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['count'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['benefit'], ENT_QUOTES, 'UTF-8');?>
</td>
                                    <td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ct'],"%Y-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8');?>
</td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                                <tr><td colspan="8">没有订单</td></tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                    <div class="dm-tfoot clearfix">
                        <div class="item fr">
                            <div class="page-cnt">共<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['total'], ENT_QUOTES, 'UTF-8');?>
条，每页<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['page_num'], ENT_QUOTES, 'UTF-8');?>
条</div>
                            <div class="dm-page dm-page-large dm-page-right">
                                <?php echo $_smarty_tpl->tpl_vars['info']->value['page_html'];?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../public/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</div>
<!-- container end -->



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
    seajs.use('page/trade/order_list');
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
?>