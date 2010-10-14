<?php use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.edit.css') ?>

<?php use_javascript('/sfDoctrineMooDooPlugin/js/vendor/mootools-core.js', 'first') ?>
<?php use_javascript('/sfDoctrineMooDooPlugin/js/vendor/mootools-more.js', 'first') ?>

<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/OverlayElement.js', 'first') ?>
<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/Calendar.js', 'first') ?>
<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/Tip.js', 'first') ?>
<?php use_javascript(sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir').'/vendor/learnboost/Tip.Calendar.js', 'first') ?>


<?php use_javascript('/sfDoctrineMooDooPlugin/js/generator.edit.js') ?>


<form action="<?php echo url_for('mooDooTest/inputDate') ?>" method="post">
  <div>
    <input class="input_date" value="date"/>
    <div id="my-tip">My Tip</div>
  </div>
  <br />
  <div>
    <input type="submit" value="Submit" />
  </div>
</form>