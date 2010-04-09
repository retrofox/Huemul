<?php use_helper('I18N') ?>
<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS') ?></h2></li>
      <li><?php echo link_to(__('Add new procedure'), 'procedures/new') ?></li>
      <li><?php echo link_to(__('Procedures List'), 'procedures/index') ?></li>
    </ul>
  </nav>
</section>
<?php end_slot(); ?>

<h1><?php echo __('Edit Procedure'); ?></h1>


<?php include_partial('form', array('form' => $form)) ?>
