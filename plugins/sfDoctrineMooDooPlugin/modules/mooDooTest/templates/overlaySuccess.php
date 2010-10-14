<?php use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.edit.css') ?>

<?php use_javascript('/sfDoctrineMooDooPlugin/js/vendor/mootools-core.js', 'first') ?>
<?php use_javascript('/sfDoctrineMooDooPlugin/js/vendor/mootools-more.js', 'first') ?>

<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/OverlayElement.js', 'first') ?>
<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/Calendar.js', 'first') ?>
<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/Tip.js', 'first') ?>
<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/Tip.Calendar.js', 'first') ?>

<?php use_javascript('/sfDoctrineMooDooPlugin/js/_test/overlay.js') ?>


<a id="btn-overlay" href="#">Hey!</a>
<div id="msg">
  <div>See you later !</div>
</div>
