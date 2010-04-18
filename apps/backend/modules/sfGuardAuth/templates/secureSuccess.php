<?php use_helper('I18N') ?>

<p><?php echo __("You don't have the required permission to access this page.") ?></p>
<p>Intente <?php echo link_to('ingresar', 'sfGuardAuth/signout') ?> con un usuario con provilegios</p>
