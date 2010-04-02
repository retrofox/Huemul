<?php use_helper('I18N') ?>

<?php slot('sidebar') ?>
<section>
  <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
</section>

<section class="menu_sidebar">
  <nav>
    <ul>
      <li><?php echo link_to(__('Back to procedure'), 'procedures/show?procedure_id='.$procedure) ?></li>
    </ul>
  </nav>
</section>

<?php end_slot(); ?>

<?php include_partial('form', array('form' => $form, 'procedure' => $procedure)) ?>
