<?php
/* Smarty version 4.2.0, created on 2022-08-07 07:19:00
  from '/var/www/app/Views/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_62efadb4a41f68_41140136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79ef8bed6e43754b2e4eca50ec14192847a51fef' => 
    array (
      0 => '/var/www/app/Views/home.tpl',
      1 => 1659871351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62efadb4a41f68_41140136 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '204823734762efadb49e0d61_57641453';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('page_title'=>((string)$_smarty_tpl->tpl_vars['c']->value['page_title'])), 0, false);
echo $_smarty_tpl->tpl_vars['c']->value['data'];?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
