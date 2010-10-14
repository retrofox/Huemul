<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?> 
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first') ?] 
<?php elseif(!isset($this->params['css'])): ?> 

[?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/mootools-core.js', 'first') ?]
[?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/mootools-more.js', 'first') ?]

<?php
/*
[?php use_stylesheet('<?php echo sfConfig::get('sf_admin_module_web_dir').'/css/global.css' ?>', 'first') ?]
[?php use_stylesheet('<?php echo sfConfig::get('sf_admin_module_web_dir').'/css/default.css' ?>', 'first') ?]
*/
?>
<?php endif; ?>