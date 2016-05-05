<?php /* Smarty version 3.1.27, created on 2016-01-16 11:53:13
         compiled from "E:\php\zao\web\zao\template\trade\order_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:254715699bea946f1a7_17211620%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e65ff56cc022c10efa053ffe38482be26c181e8' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\trade\\order_list.tpl',
      1 => 1452916269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '254715699bea946f1a7_17211620',
  'variables' => 
  array (
    'order' => 0,
    'item' => 0,
    'val' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5699bea96f3ac2_94905356',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5699bea96f3ac2_94905356')) {
function content_5699bea96f3ac2_94905356 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\php\\zao\\lib\\library\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '254715699bea946f1a7_17211620';
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
                            <a href="?ct=trade" <?php if ($_GET['type'] == '') {?>class="current"<?php }?>>所有订单</a>
                        </li>
                        <li>
                            <a href="?ct=trade&type=1" <?php if ($_GET['type'] == 1) {?>class="current"<?php }?>>待付款</a>
                        </li>
                        <li>
                            <a href="?ct=trade&type=2" <?php if ($_GET['type'] == 2) {?>class="current"<?php }?>>待发货</a>
                        </li>
                        <li>
                            <a href="?ct=trade&type=3" <?php if ($_GET['type'] == 3) {?>class="current"<?php }?> >已发货</a>
                        </li>
                        <li>
                            <a href="?ct=trade&type=4" <?php if ($_GET['type'] == 4) {?>class="current"<?php }?> >已完成</a>
                        </li>
                    </ul>
                    </div>
                    <div class="right-item vercenter-wrap">
                        <span class="dm-search-item item vercenter">
                            <span class="dm-input">
                              <input class="form-control" name="keyword" type="text" placeholder="按手机号码或订单号" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['keyword'], ENT_QUOTES, 'UTF-8');?>
"/>
                            </span>
                            <button class="btn-orange btn" id="search">搜索</button>
                        </span>
                        <div class="item dib vercenter"><a class="btn" data-toggle="modal" data-target="#download">导出订单</a></div>
                    </div>
                </div>
                <div class="table-wrap">
                    <table class="dm-table-large dm-table table table-striped">
                        <thead>
                        <tr>
                            <th>商品</th>
                            <th>单价</th>
                            <th>数量</th>
                            <th>买家</th>
                            <th>交易状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['order']->value['list'];
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
                                <td class="dm-col-align-left" colspan="8" >
                                    &nbsp;&nbsp;订单号：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
；订单生成时间：<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ct'],"%Y-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8');?>

                                    &nbsp;&nbsp;应收款：<pan class="red">¥<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['money'], ENT_QUOTES, 'UTF-8');?>
</pan>(邮费：¥<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['postage'], ENT_QUOTES, 'UTF-8');?>
)
                                </td>
                            </tr>
                            <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['detail'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['val']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$foreach_val_Sav = $_smarty_tpl->tpl_vars['val'];
?>
                            <tr>
                                <td class="dm-col-align-left">
                                    <div class="dm-pic-and-txt">
                                        <div class="dm-thumbpic">
                                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['img'], ENT_QUOTES, 'UTF-8');?>
" height="54" width="54" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['price'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><a href="?ct=user&keyword=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname'], ENT_QUOTES, 'UTF-8');?>
</a> (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['phone'], ENT_QUOTES, 'UTF-8');?>
)</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['trade_state'], ENT_QUOTES, 'UTF-8');?>
</td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['val'] = $foreach_val_Sav;
}
?>
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
                            <div class="page-cnt">共<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['total'], ENT_QUOTES, 'UTF-8');?>
条，每页<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['page_num'], ENT_QUOTES, 'UTF-8');?>
条</div>
                            <div class="dm-page dm-page-large dm-page-right">
                                <?php echo $_smarty_tpl->tpl_vars['order']->value['page_html'];?>

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

<!-- 导出订单 -->
<div class="dm-modal modal fade" id="download">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul class="nav nav-tabs">
                    <li><h4>导出订单</h4></li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="tab-content">
                        <div class="form-group" style="margin: 20px auto 30px;width:230px;">
                            <label class="control-label">订单类型：</label>
                            <div class="control-cont">
                                <select name="trade_type" class="dm-select">
                                    <?php
$_from = $_smarty_tpl->tpl_vars['order']->value['type'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                </select>
                            </div>
                        </div>
                        <div class="form-footer tac">
                            <button id="download-order" class="btn-orange btn-large btn">确定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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