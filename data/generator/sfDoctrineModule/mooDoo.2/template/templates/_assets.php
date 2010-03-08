<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?> 
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first') ?] 
<?php elseif(!isset($this->params['css'])): ?> 

[?php use_javascript('<?php echo '/mooDoo.2/js/mootools-1.2.4-core-yc.js' ?>', 'first') ?]
[?php use_javascript('<?php echo '/mooDoo.2/js/mootools-1.2.4.4-more.js' ?>', 'first') ?]
[?php use_javascript('<?php echo '/mooDoo.2/js/admin.generator.class.js' ?>', 'first') ?]
[?php use_javascript('<?php echo '/mooDoo.2/js/admin.generator.js' ?>', 'first') ?]

[?php use_stylesheet('<?php echo '/css/mooDoo.2/generator.global.css' ?>', 'first') ?]
[?php use_stylesheet('<?php echo '/css/mooDoo.2/generator.default.css' ?>', 'first') ?]

<?php
/*
[?php use_stylesheet('<?php echo sfConfig::get('sf_admin_module_web_dir').'/css/global.css' ?>', 'first') ?]
[?php use_stylesheet('<?php echo sfConfig::get('sf_admin_module_web_dir').'/css/default.css' ?>', 'first') ?]
*/
?>
<?php endif; ?>