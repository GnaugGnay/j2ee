<?php /* Smarty version 3.1.27, created on 2015-12-10 15:14:41
         compiled from "E:\php\zao\web\zao\template\user\userList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:731566926616059a2_45278071%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c4d0b1f32b40572724cd561436db39594a6819' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\user\\userList.tpl',
      1 => 1449552722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '731566926616059a2_45278071',
  'variables' => 
  array (
    'info_list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566926618e7ed6_55638916',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566926618e7ed6_55638916')) {
function content_566926618e7ed6_55638916 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\php\\zao\\lib\\library\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '731566926616059a2_45278071';
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
                <div class="main-page">
                    <div class="dm-page-head">
                        <h2 class="title">用户列表</h2>
                        <div class="right-item vercenter-wrap">
                          <span class="dm-search-item vercenter">
                            <span class="dm-input">
                              <input class="form-control" type="text" name="keyword" placeholder="请输入用户昵称搜索" value="">
                            </span>
                            <button class="btn-orange btn" id="search">搜索</button>
                          </span>
                        </div>
                    </div>
                    <table class="dm-table table">
                        <thead>
                            <tr>
                                <th>头像昵称</th>
                                <th>手机号</th>
                                <th>简介</th>
                                <th>创建时间</th>
                                <th>上次登录</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td class="dm-col-align-left">
                                    <div class="dm-pic-and-txt">
                                        <div class="dm-thumbpic">
                                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['portrait'], ENT_QUOTES, 'UTF-8');?>
" height="54" width="54" alt="用户头像">
                                        </div>
                                        <div class="txt">
                                            <p class="txt-top"><span class="orange"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname'], ENT_QUOTES, 'UTF-8');?>
</span></p>
                                            <p class="txt-foot"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['sex'], ENT_QUOTES, 'UTF-8');?>
</p>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['phone'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['signature'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ct'],"%Y-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['last_logintime'],"%Y-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8');?>
</td>
                                <td style="padding-right:20px;">
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['is_del'] == 0) {?>
                                    <a data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['uid'], ENT_QUOTES, 'UTF-8');?>
" data-status="1" class="js_user_change_statue">活跃</a>
                                    <?php } else { ?>
                                    <a data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['uid'], ENT_QUOTES, 'UTF-8');?>
" data-status="0" style="color: darkred;" class="js_user_change_statue">已封杀</a>
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
    seajs.use('page/user/userList');
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>