<?php /* Smarty version 3.1.27, created on 2016-01-16 12:10:26
         compiled from "E:\php\zao\web\zao\template\trade\benefit_outlays.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:193495699c2b28fb905_89924514%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f9e8166ec9b5bb893b0d240dd4747f8dbd04f72' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\trade\\benefit_outlays.tpl',
      1 => 1452917414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193495699c2b28fb905_89924514',
  'variables' => 
  array (
    'info_list' => 0,
    'info' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5699c2b2a6ac54_43735242',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5699c2b2a6ac54_43735242')) {
function content_5699c2b2a6ac54_43735242 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '193495699c2b28fb905_89924514';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telphone=no, email=no" />
    <link rel="dns-prefetch" href="//damaiapp.com">
    <?php echo $_smarty_tpl->getSubTemplate ("public/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</head>

<body>
<!-- header start -->
<?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!-- header end -->

<!-- container start -->
<div class="container">
    <div class="main">
        <div class="main-inner">
            <div class="main-container">
                <div class="dm-page-head">
                    <h2 class="title">提现记录</h2>
                    <div class="right-item vercenter-wrap">
                          <span class="dm-search-item vercenter">
                              <span class="dm-input">
                                <input class="form-control" type="text" name="keyword" placeholder="请输入用户名" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info_list']->value['keyword'], ENT_QUOTES, 'UTF-8');?>
">
                              </span>
                              <button class="btn-orange btn" id="search">搜索</button>
                          </span>
                    </div>
                </div>
                <div class="table-wrap">
                    <table class="dm-table-large dm-table table table-striped">
                        <thead>
                        <tr>
                            <th>用户昵称</th> <th>姓名</th> <th>账号</th> <th>打款方式</th> <th>用户余额</th> <th>结算金额</th> <th>申请时间</th> <th>是否完成</th>
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
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['acount'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['item']->value['pattern'] == 1) {?>支付宝<?php } else { ?>微信<?php }?></td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['purse'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['money'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars(date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item']->value['ct']), ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['item']->value['is_del'] == 0) {?>
                                    <a data-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8');?>
 class="js-btn-payment-a">待支出</a>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['is_del'] == 1) {?>
                                    已经支付
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
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
    <?php echo $_smarty_tpl->getSubTemplate ("public/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</div>
<!-- container end -->

<?php echo $_smarty_tpl->getSubTemplate ("public/modalwindow.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


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