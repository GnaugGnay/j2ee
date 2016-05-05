<?php /* Smarty version 3.1.27, created on 2016-01-05 10:25:43
         compiled from "E:\php\zao\web\zao\template\user\commentList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:29834568b29a759ea95_30579622%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5f21a1179a0f74fd802aa9a6f764c6929012e5d' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\user\\commentList.tpl',
      1 => 1451543365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29834568b29a759ea95_30579622',
  'variables' => 
  array (
    'info_list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_568b29a7715af6_88788495',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_568b29a7715af6_88788495')) {
function content_568b29a7715af6_88788495 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\php\\zao\\lib\\library\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '29834568b29a759ea95_30579622';
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
                        <h2 class="title">评论列表</h2>
                    </div>
                    <table class="dm-table table">
                        <thead>
                            <tr>
                                <th>评论人</th>
                                <th>评论商品</th>
                                <th>商品图片</th>
                                <th>评论内容</th>
                                <th>评论时间</th>
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
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nickname'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['img'], ENT_QUOTES, 'UTF-8');?>
" height="54" width="54" alt="商品缩略图"></td>
                                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['content'], ENT_QUOTES, 'UTF-8');?>
</td>
                                <td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ct'],"%Y-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8');?>
</td>
                                <td style="padding-right:20px;">
                                    <a data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['comment_id'], ENT_QUOTES, 'UTF-8');?>
" class="js_comment_delete">移除</a>
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
    seajs.use('page/user/commentList');
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>