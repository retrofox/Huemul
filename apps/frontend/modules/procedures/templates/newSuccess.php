<?php use_helper('I18N', 'Date') ?>

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

<?php include_partial('form', array('form' => $form, 'title' => 'New Procedure')) ?>