<?php use_helper('I18N') ?>

<h3><?php echo __("You don't have the required permission to access this page.") ?></h3>
<p>Intente <?php echo link_to('ingresar', 'sfGuardAuth/signout') ?> con un usuario con los privilegios necesarios.</p>
