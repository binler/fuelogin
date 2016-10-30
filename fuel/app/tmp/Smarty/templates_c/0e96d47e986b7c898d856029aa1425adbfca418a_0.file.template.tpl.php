<?php
/* Smarty version 3.1.30, created on 2016-10-30 23:10:54
  from "D:\laragon\www\fuelogin\fuel\app\views\template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58161b8e595c53_59371846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e96d47e986b7c898d856029aa1425adbfca418a' => 
    array (
      0 => 'D:\\laragon\\www\\fuelogin\\fuel\\app\\views\\template.tpl',
      1 => 1477843769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58161b8e595c53_59371846 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['asset_css'][0][0]->asset_css(array('refs'=>"bootstrap.css"),$_smarty_tpl);?>

	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">

		<div class="col-md-12">
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</div>
	</div>
</body>
</html>
<?php }
}
