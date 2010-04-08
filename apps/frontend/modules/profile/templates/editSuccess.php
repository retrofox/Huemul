<?php use_helper('I18N') ?>
<?php use_stylesheet('simple_form') ?>

<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS') ?></h2></li>
      <li><?php echo link_to(__('Edit account'), 'users/edit') ?></li>
    </ul>
  </nav>
</section>
<?php end_slot(); ?>

<h1>Edición de Perfil</h1>

<?php include_partial('form', array('form' => $form)) ?>
