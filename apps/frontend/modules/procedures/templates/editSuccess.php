<?php use_helper('I18N') ?>
<?php include_partial('form', array('form' => $form)) ?>
<?php slot('sidebar') ?>
<nav>
  <h2><?php echo __('OPTIONS') ?></h2>
  <ul>
    <li><?php echo link_to(__('Add new procedure'), 'procedures/new') ?></li>
    <li><?php echo link_to(__('Procedures List'), 'procedures/index') ?></li>

    <li><?php echo link_to(__('Procedure detail'), 'procedures/show?procedure_id='.$procedureId);  ?></li>
    <li><?php echo link_to(__('Add responsible'), 'userProcedure/index?procedure_id='.$procedureId);  ?></li>
  </ul>
</nav>
<?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
<?php end_slot(); ?>