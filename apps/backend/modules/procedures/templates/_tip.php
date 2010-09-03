<?php $lastRev = $procedure->getLastRevision() ?>
<?php $state = $lastRev->getRevisionStateId() ?>
<?php $block = $lastRev->getBlock() ?>
<?php $lastControlRev = $procedure->getLastControlRevision() ?>
<div class="tip">
  <h2><?php echo __('Suggestions'); ?></h2>
   <?php if($state == 5 && $block) : ?>
  <p>El trámite actual cuenta con una nueva revision que requiere ser controlada, para poder crear una revision de control sobre la misma, debe cerrar la <?php echo link_to('revisión de control', 'revisions/control?id='.$lastControlRev->getId()) ?>  anterior que permanece abierta.</p>
  <?php elseif($state == 5 && !$block) : ?>
  <p>El trámite actual cuenta con una revisión que requiere ser controlada. Es necesario <?php echo link_to('crear', 'revisions/createControlRevision?revision_id='.$lastRev->getId()) ?> una revisión de control.</p>
  <?php elseif($state == 8) : ?>
  <p>El usuario <?php echo $lastRev->getCreator() ?> ha creado una revisión de control que todavía no ha sido cerrada. Es conveniente trabajar en la misma antes de realizar alguna otra acción.</p>
  <?php endif; ?>
</div>


