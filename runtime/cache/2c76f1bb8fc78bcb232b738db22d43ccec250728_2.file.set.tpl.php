<?php /* Smarty version 3.1.27, created on 2015-12-11 11:18:04
         compiled from "E:\php\zao\web\zao\template\set\set.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:26197566a406c4b6e12_65603405%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c76f1bb8fc78bcb232b738db22d43ccec250728' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\set\\set.tpl',
      1 => 1449803878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26197566a406c4b6e12_65603405',
  'variables' => 
  array (
    'user_info' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566a406c566ac3_86969263',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566a406c566ac3_86969263')) {
function content_566a406c566ac3_86969263 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '26197566a406c4b6e12_65603405';
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
<style>
    .ipt{width:80px;height: 25px;padding: 2px 4px;font-size: 14px;color: #555;background-color: #fff;text-align: center;;border: 1px solid #ccc;border-radius: 4px;}

</style>
<!-- container start -->
<div class="container">
    <div class="main">
        <div class="main-inner">
            <div class="main-container">
                <div class="dm-page-head">
                    <h2 class="title">设置Banner信息</h2>
                </div>
                <div class="table-wrap">
                    <table class="dm-table-large dm-table table table-striped" id="banner_table">
                        <thead>
                        <tr>
                            <th>Banner图片</th> <th>跳转URL</th> <th>Banner标题</th>
                        </tr>
                        </thead>
                        <tbody class="tbody">
                        <?php
$_from = $_smarty_tpl->tpl_vars['user_info']->value['list'];
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
                                <td>
                                    <a class="js_piclib_upload"><img class="js_banner_img" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['banner_img'], ENT_QUOTES, 'UTF-8');?>
" height="58" width="58" title="点击上传图片"></a>
                                </td>
                                <td>
                                    <input type="text" class="js_banner_url ipt" style='width:200px' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['banner_url'], ENT_QUOTES, 'UTF-8');?>
"/>
                                </td>
                                <td>
                                    <input type="text" class="js_banner_title ipt" style='width:200px' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['banner_title'], ENT_QUOTES, 'UTF-8');?>
"/>
                                </td>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                        </tbody>
                    </table>
                    <div>
                        <a class="btn-small btn-orange btn js-activity-create" id="js-add" style="margin-left: 10px;">添加</a>
                        <a class="btn-small btn-orange btn js-activity-create" id="js-delete" style="margin-left: 10px;">删除</a>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-operate vercenter-wrap">
                    <div style="width:40%;margin:auto;">
                        <a class="btn-small btn-orange btn js-activity-create" id="js-save" style="margin-left: 10px;">保存</a>
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
    seajs.use('page/set/set');
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
?>