<?php /* Smarty version 3.1.27, created on 2016-01-06 09:39:33
         compiled from "E:\php\zao\web\zao\template\public\nav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:32503568c70558de282_90118376%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c34fc524799b2cbf70077f48387ca877dedfb3' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\public\\nav.tpl',
      1 => 1452043661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32503568c70558de282_90118376',
  'variables' => 
  array (
    'nav' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_568c70559c88b6_87263148',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_568c70559c88b6_87263148')) {
function content_568c70559c88b6_87263148 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '32503568c70558de282_90118376';
if (!$_smarty_tpl->tpl_vars['nav']->value || $_smarty_tpl->tpl_vars['nav']->value == 'goods') {?>
    <aside class="aside">
        <nav class="aside-nav">
            <ul class="links-main links">
                <li>
                    <a href="?ct=index&ac=addGoods" class="btn btn-orange"><span class="link-txt">添加商品</span></a>
                </li>
            </ul>
            <h4 class="title">
                <em class="icon-box"><i class="g-icon-aside-ico2 g-icon"></i></em><span class="tit-txt">商品管理</span>
            </h4>
            <ul class="links-list links">
                <li>
                    <a href="?ct=index" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index') {?>class="current"<?php }?> href="?ct=current"><span class="link-txt">商品列表</span></a>
                </li>
                <li>
                    <a href="?ct=index&ac=typeList" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'typeList') {?>class="current"<?php }?> href="?ct=current"><span class="link-txt">类型信息</span></a>
                </li>
            </ul>
        </nav>
    </aside>

    <?php } elseif ($_smarty_tpl->tpl_vars['nav']->value == 'user') {?>
        <aside class="aside">
            <nav class="aside-nav">
                <ul class="links-main links">
                    <li>
                        <a href="?ct=user&ac=addUser" class="btn btn-orange"><span class="link-txt">添加用户</span></a>
                    </li>
                </ul>
                <h4 class="title">
                    <em class="icon-box"><i class="g-icon-aside-ico2 g-icon"></i></em><span class="tit-txt">用户管理</span>
                </h4>
                <ul class="links-list links">
                    <li>
                        <a href="?ct=user" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'user') {?>class="current"<?php }?> href="?ct=deal&ac=rankbalance"><span class="link-txt"></span>用户列表</a>
                    </li>
                    <li>
                        <a href="?ct=user&ac=comment" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'comment') {?>class="current"<?php }?> href="?ct=user&ac=comment"><span class="link-txt"></span>评论管理</a>
                    </li>
                    <li>
                        <a href="?ct=user&ac=message" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'message') {?>class="current"<?php }?> href="?ct=user&ac=message"><span class="link-txt"></span>消息管理</a>
                    </li>
                </ul>
            </nav>
        </aside>

    <?php } elseif ($_smarty_tpl->tpl_vars['nav']->value == 'trade') {?>
    <aside class="aside">
        <nav class="aside-nav">
            <ul class="links-main links">
                <li>
                    <a class="btn btn-orange"><span class="link-txt">交易管理</span></a>
                </li>
            </ul>
            <h4 class="title">
                <em class="icon-box"><i class="g-icon-aside-ico2 g-icon"></i></em><span class="tit-txt">订单管理</span>
            </h4>
            <ul class="links-list links">
                <li>
                    <a href="?ct=trade" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'order') {?>class="current"<?php }?> href="?ct=trade"><span class="link-txt"></span>订单列表</a>
                </li>
                <li>
                    <a href="?ct=trade&ac=userBenefit" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'userBenefit') {?>class="current"<?php }?> href="?ct=trade&ac=userBenefit"><span class="link-txt"></span>用戶提成</a>
                </li>
                <li>
                    <a href="?ct=trade&ac=benefitOutlays" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'benefitOutlays') {?>class="current"<?php }?> href="?ct=trade&ac=benefitOutlays"><span class="link-txt"></span>提现申请</a>
                </li>
            </ul>
        </nav>
    </aside>

    <?php } elseif ($_smarty_tpl->tpl_vars['nav']->value == 'set') {?>
        <aside class="aside">
            <nav class="aside-nav">
                <ul class="links-main links">
                    <li>
                        <a class="btn btn-orange"><span class="link-txt">Banner</span></a>
                    </li>
                </ul>
                <h4 class="title">
                    <em class="icon-box"><i class="g-icon-aside-ico2 g-icon"></i></em><span class="tit-txt">设置管理</span>
                </h4>
                <ul class="links-list links">
                    <li>
                        <a href="?ct=set" <?php if ($_smarty_tpl->tpl_vars['page']->value == 'set') {?>class="current"<?php }?> href="?ct=trade"><span class="link-txt"></span>Banner列表</a>
                    </li>
                </ul>
            </nav>
        </aside>

<?php }

}
}
?>