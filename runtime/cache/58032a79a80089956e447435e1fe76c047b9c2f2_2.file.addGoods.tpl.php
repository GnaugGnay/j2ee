<?php /* Smarty version 3.1.27, created on 2016-01-06 09:57:56
         compiled from "E:\php\zao\web\zao\template\goods\addGoods.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28996568c74a48ae7d1_04905928%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58032a79a80089956e447435e1fe76c047b9c2f2' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\goods\\addGoods.tpl',
      1 => 1451989693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28996568c74a48ae7d1_04905928',
  'variables' => 
  array (
    'goods' => 0,
    'info_list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_568c74a4a507b0_70473391',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_568c74a4a507b0_70473391')) {
function content_568c74a4a507b0_70473391 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28996568c74a48ae7d1_04905928';
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
                        <h2 class="title">发布商品</h2>
                    </div>
                    <div class="article-edit">
                        <form  class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label">商品名：</label>
                                <div class="control-cont">
                                    <div class="dm-input dib">
                                        <input type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['name'], ENT_QUOTES, 'UTF-8');?>
" data-gid="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['gid'], ENT_QUOTES, 'UTF-8');?>
" placeholder="请输入商品名字" class="ipt-width-long form-control js_goods_name"
                                               style="width: 180px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label" style="padding-top: 0px;">商品类型：</label>
                                <select>
                                    <option data-type="discount">手机壳</option>
                                </select>
                                <label>（提示：目前只有手机壳）</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="js-" style="padding-top: 0px;">购买属性：</label>
                                <select class="js-select-category">
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
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['cat_type'] == 1) {?>
                                            <option data-type="discount" data-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cid'], ENT_QUOTES, 'UTF-8');?>
><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['cat_name'], ENT_QUOTES, 'UTF-8');?>
</option>
                                        <?php }?>
                                    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="js-" style="padding-top: 0px;">置顶首页：</label>
                                <select class="js-select-ishome">
                                    <?php if ($_smarty_tpl->tpl_vars['goods']->value['ishome'] == "1") {?>
                                        <option data-type="1">在首页</option>
                                        <option data-type="0">不放在首页</option>
                                    <?php } else { ?>
                                        <option data-type="0">不在首页</option>
                                        <option data-type="1">放在首页</option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">商品定价：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['price'], ENT_QUOTES, 'UTF-8');?>
" placeholder="120" class="ipt-width-long form-control js_goods_price"
                                               style="width: 80px;margin-left: -7px;"/>
                                    </div>
                                    <label id="js-change-discount-lab"> 元</label>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">已销售量：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['purchased_count'], ENT_QUOTES, 'UTF-8');?>
" placeholder="240" class="ipt-width-long form-control js_goods_purchased"
                                               style="width: 80px;margin-left: -7px;"/>
                                    </div>
                                    <label id="js-change-discount-lab"> 个</label>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">商品总数：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['number'], ENT_QUOTES, 'UTF-8');?>
" placeholder="9999" class="ipt-width-long form-control js_goods_number"
                                               style="width: 80px;margin-left: -7px;"/>
                                    </div>
                                    <label id="js-change-discount-lab"> 个</label>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">商品描述：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="这里输入商品描述120个字以内..." class="ipt-width-long form-control js_goods_detail"
                                               style="width: 220px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">商品标签：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['tag'], ENT_QUOTES, 'UTF-8');?>
" placeholder="多个标签用英文的“,”分开..." id="js-discount-value" class="ipt-width-long form-control js_tag_value"
                                               style="width: 220px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">商品图片：</label>
                                <a class="js_piclib_upload"><img id="goodsImage" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goods']->value['img'], ENT_QUOTES, 'UTF-8');?>
" height="98" width="102" title="点击上传图片"></a>
                            </div>
                            <hr/>
                        </form>
                        </br>

                        <div class="form-operate vercenter-wrap">
                            <div style="width:40%;margin:auto;">
                                <a class="btn-small btn-orange btn js-goods-create" id="sms" style="margin-left: 10px;">完成</a>
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
        seajs.use('page/goods/addGoods');
    <?php echo '</script'; ?>
>

</body>

</html><?php }
}
?>