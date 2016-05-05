<?php /* Smarty version 3.1.27, created on 2016-01-03 16:38:51
         compiled from "E:\php\zao\web\zao\template\login\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:134695688de1bf0a919_58465224%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6576444ed2bfeff3e6523774a46d9faccdae9afa' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\login\\index.tpl',
      1 => 1451810327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134695688de1bf0a919_58465224',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5688de1c47b833_66590874',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5688de1c47b833_66590874')) {
function content_5688de1c47b833_66590874 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134695688de1bf0a919_58465224';
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
  <title>造</title>
  <meta content="" name="keywords" />
  <meta content="" name="description" />
  <link rel="stylesheet" href="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/css/common.css">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/css/reglogin.css" />
  <!--[if lt IE 9]>
  <?php echo '<script'; ?>
 src="<?php echo htmlspecialchars(@constant('SYS_ZAO_STATIC_URL'), ENT_QUOTES, 'UTF-8');?>
/js/lib/html5shiv.min.js"><?php echo '</script'; ?>
>
  <![endif]-->
</head>

<body>
<!-- header start -->
<header class="header">
  <div class="header-inner inner">
    <h1 class="header-logo">
      <a href="/" class="logo" title="造"><span class="hidetxt">造</span></a>
    </h1>
  </div>
</header>
<!-- header end -->

<!-- container start -->
<div class="container">
  <div class="main">
    <div class="main-header">
      <h3 class="title">用户登录</h3>
    </div>
    <div class="main-body reglogin-body">
      <div class="login-form">
        <form class="form-horizontal" action="?ct=login&ac=login" method="post">
          <div class="form-group">
            <label class="control-label">用户名：</label>
            <div class="control-cont">
              <div class="dm-input dib"><input type="text" name="name" class="form-control ipt-width-long" maxlength="11" /></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">密码：</label>
            <div class="control-cont">
              <div class="dm-input dib"><input type="password" name="password" class="form-control ipt-width-long" /></div>
              <div class="msg-box dib">
                <?php if ($_smarty_tpl->tpl_vars['error']->value != '') {?><p class="error"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-top:20px;">
            <div class="control-cont">
              <button class="btn-orange btn-large btn" type="submit">登录</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- container end -->

</body>
</html><?php }
}
?>