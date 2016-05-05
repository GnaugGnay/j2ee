<?php /* Smarty version 3.1.27, created on 2015-12-10 15:14:18
         compiled from "E:\php\zao\web\zao\template\public\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:134775669264a412f89_24898699%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2958a1753f279c396dcf96e5a582bb32e5a9a0e' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\public\\header.tpl',
      1 => 1449552984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134775669264a412f89_24898699',
  'variables' => 
  array (
    'noHeader' => 0,
    'nav' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5669264a480593_93581371',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5669264a480593_93581371')) {
function content_5669264a480593_93581371 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134775669264a412f89_24898699';
?>
<header class="header">
    <div class="header-inner inner">
        <h1 class="header-logo" style="margin-left: 10px;">
            <a href="" class="logo" title="造"><span class="hidetxt">造</span></a>
        </h1>
        <nav class="header-nav">
            <ul class="clearfix">
                <?php if (!$_smarty_tpl->tpl_vars['noHeader']->value) {?>
                    <li class="nbtn <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'goods') {?>current<?php }?>"><a href="?index.php">商品</a></li>
                    <li class="nbtn <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'user') {?>current<?php }?>"><a href="?ct=user">用户</a></li>
                    <li class="nbtn <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'trade') {?>current<?php }?>"><a href="?ct=trade">交易统计</a></li>
                    <li class="nbtn <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'set') {?>current<?php }?>"><a href="?ct=set">设置</a></li>
                <?php }?>
            </ul>
        </nav>
        <div class="header-right user">
            <i class="g-icon-user g-icon"></i><span class="username blue"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
</span>
            <div class="settings dm-dropdown dropdown">
                <a class="btn" href="?ct=login&ac=logout"><i class="dm-icon-signout dm-icon"></i>退出</a>
            </div>
        </div>
    </div>
</header><?php }
}
?>