<?php /* Smarty version 3.1.27, created on 2016-01-06 09:39:34
         compiled from "E:\php\zao\web\zao\template\public\modalwindow.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16333568c7056a8a7a9_01894940%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e80738b04f8a8c9c20494b5089be7cae0082f7' => 
    array (
      0 => 'E:\\php\\zao\\web\\zao\\template\\public\\modalwindow.tpl',
      1 => 1449548868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16333568c7056a8a7a9_01894940',
  'variables' => 
  array (
    'info_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_568c7056affab0_74095629',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_568c7056affab0_74095629')) {
function content_568c7056affab0_74095629 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16333568c7056a8a7a9_01894940';
?>
<!--modal trading message-->
<div class="dm-modal modal fade in" id="modal_message" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul class="nav nav-tabs">
                    <li><h4>详情查看</h4></li>
                </ul>
            </div>
            <div class="modal-body">
                <div style="height:200px; overflow-x:hidden; overflow-y:auto;">
                    <table class="table">
                        <h4 align="center">正在加载...</h4>
                    </table>
                </div>
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
</div>
<?php }
}
?>