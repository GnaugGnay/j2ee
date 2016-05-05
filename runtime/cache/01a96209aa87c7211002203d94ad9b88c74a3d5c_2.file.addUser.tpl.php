<?php /* Smarty version 3.1.27, created on 2015-12-31 14:21:37
         compiled from "E:\php\zao\web\zao\template\user\addUser.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:91845684c971c87484_29447309%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01a96209aa87c7211002203d94ad9b88c74a3d5c' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\user\\addUser.tpl',
      1 => 1451542208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91845684c971c87484_29447309',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5684c972163c73_48981710',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5684c972163c73_48981710')) {
function content_5684c972163c73_48981710 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '91845684c971c87484_29447309';
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
                        <h2 class="title">添加用户</h2>
                    </div>
                    <div class="article-edit">
                        <form  class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label">用户名：</label>
                                <div class="control-cont">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="请输入用户昵称" class="ipt-width-long form-control js_user_name"
                                               style="width: 180px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" style="padding-top: 0px;">性别：</label>
                                <select class="js_select_sex">
                                    <option data-type="discount">男</option>
                                    <option data-type="discount">女</option>
                                </select>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">用户手机：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="请输入用户手机" class="ipt-width-long form-control js_user_phone"
                                               style="width: 180px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">用户密码：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="请输入用户密码" class="ipt-width-long form-control js_user_psw"
                                               style="width: 180px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">自我描述：</label>
                                <div class="control-cont" data-flag="title_error_info">
                                    <div class="dm-input dib">
                                        <input type="text" placeholder="这里输入自我描述120个字以内..." class="ipt-width-long form-control js_user_detail"
                                               style="width: 220px;margin-left: -7px;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group js-discount" id="js-div-discount">
                                <label class="control-label">头像图片：</label>
                                <a class="js_piclib_upload"><img id="userImage" src="" height="49" width="51" title="点击上传头像"></a>
                            </div>
                            <hr/>
                        </form>
                        </br>

                        <div class="form-operate vercenter-wrap">
                            <div style="width:40%;margin:auto;">
                                <a class="btn-small btn-orange btn js-user-create" id="sms" style="margin-left: 10px;">添加用户</a>
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
        seajs.use('page/user/addUser');
    <?php echo '</script'; ?>
>

</body>

</html><?php }
}
?>