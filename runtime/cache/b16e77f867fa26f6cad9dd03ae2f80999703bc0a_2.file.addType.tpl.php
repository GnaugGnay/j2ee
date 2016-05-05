<?php /* Smarty version 3.1.27, created on 2015-12-10 15:31:48
         compiled from "E:\php\zao\web\zao\template\goods\addType.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2711956692a648bd210_77239970%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b16e77f867fa26f6cad9dd03ae2f80999703bc0a' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\goods\\addType.tpl',
      1 => 1449732707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2711956692a648bd210_77239970',
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56692a649e9ee7_23465049',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56692a649e9ee7_23465049')) {
function content_56692a649e9ee7_23465049 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2711956692a648bd210_77239970';
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

        <link rel="stylesheet" href="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/css/select2.min.css" />
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
                    <div class="dm-page-head">
                        <div class="dm-nav">
                            <ul class="dm-nav-inner">
                                <li>
                                    <a href="?ct=index&ac=typeList">类型列表</a>
                                </li>
                                <li>
                                    <a class="current">添加类型</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="article-edit">
                        <form  class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label">类型名字：</label>
                                <div class="control-cont">
                                    <div class="dm-input dib">
                                        <?php if ($_smarty_tpl->tpl_vars['info']->value['cid'] == 1) {?>
                                        <input disabled="false" type="text" data-category="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cid'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cat_name'], ENT_QUOTES, 'UTF-8');?>
"  class="ipt-width-long form-control js_type_name"
                                           style="width: 180px;margin-left: -7px;"/>
                                        <?php } else { ?>
                                        <input type="text" data-category="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cid'], ENT_QUOTES, 'UTF-8');?>
" placeholder="输入类型名字，方便辨识" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cat_name'], ENT_QUOTES, 'UTF-8');?>
" class="ipt-width-long form-control js_type_name"
                                               style="width: 180px;margin-left: -7px;"/>
                                        <?php }?>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['info']->value['cid'] == 1) {?>
                                    <label id="js-change-discount-lab"> （不可修改）</label>
                                    <?php }?>

                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label" style="padding-top: 0px;">类型分类：</label>
                                <select>
                                    <option data-type="discount">手机壳</option>
                                </select>
                                <label>（提示：目前只有手机壳）</label>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">属性一名字：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="输入第一属性名字，如手机：型号" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cat_one_name'], ENT_QUOTES, 'UTF-8');?>
" class="ipt-width-long form-control js_type_one_name"
                                               style="width: 270px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">属性一内容：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="输入内容,','分隔，如：iphone4,iphone5" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cat_one'], ENT_QUOTES, 'UTF-8');?>
" class="ipt-width-long form-control js_type_one_content"
                                               style="width: 270px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">属性二名字：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="输入第一属性名字，如手机：材质" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cat_two_name'], ENT_QUOTES, 'UTF-8');?>
" class="ipt-width-long form-control js_type_two_name"
                                               style="width: 270px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">属性二内容：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="输入内容,','分隔，如：PLC,塑料,玻璃" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['info']->value['cat_two'], ENT_QUOTES, 'UTF-8');?>
" class="ipt-width-long form-control js_type_two_content"
                                               style="width: 270px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                        </form>
                        </br>

                        <div class="form-operate vercenter-wrap">
                            <div style="width:40%;margin:auto;">
                                <a class="btn-small btn-orange btn js-type-create" id="sms" style="margin-left: 10px;">提交</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("../public/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </div>
    <!-- end-->
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
        seajs.use('page/goods/addType');
    <?php echo '</script'; ?>
>

</body>

</html><?php }
}
?>