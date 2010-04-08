<?php use_helper('I18N') ?>
<?php use_stylesheet('simple_form') ?>

<h1>Cuenta de Usuario</h1>

<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS') ?></h2></li>
      <li><?php echo link_to(__('Edit profile'), 'profile/edit') ?></li>
    </ul>
  </nav>
</section>
<?php end_slot(); ?>

<?php include_partial('form', array('form' => $form)) ?>
