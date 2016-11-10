<?php
/* Smarty version 3.1.30, created on 2016-11-11 00:41:00
  from "D:\laragon\www\fuelogin\fuel\app\views\admin\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5824b12cb37e43_77046485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '494efdbb10538b4695678a0a45f97f67027fd4af' => 
    array (
      0 => 'D:\\laragon\\www\\fuelogin\\fuel\\app\\views\\admin\\login.tpl',
      1 => 1478799653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5824b12cb37e43_77046485 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['maintenance']->value != 1) {?>
	<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['form'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['form'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('attrs'=>array('method'=>'post','action'=>'')));
$_block_repeat1=true;
echo $_block_plugin1->form(array('attrs'=>array('method'=>'post','action'=>'')), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_label'][0][0]->form_label(array('text'=>'Login id','id'=>'login_id'),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_input'][0][0]->form_input(array('field'=>'login_id','value'=>'','attrs'=>array('autofocus')),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_label'][0][0]->form_label(array('text'=>'Password','id'=>'password'),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_password'][0][0]->form_password(array('field'=>'password','value'=>''),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_submit'][0][0]->form_submit(array('field'=>'btn-submit','value'=>'Submit'),$_smarty_tpl);?>

	<?php $_block_repeat1=false;
echo $_block_plugin1->form(array('attrs'=>array('method'=>'post','action'=>'')), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

<?php }?>
<p><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</p><?php }
}
