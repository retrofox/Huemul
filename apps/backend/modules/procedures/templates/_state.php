<?php if($procedure->getLastRevision()) : ?>
<?php $state = $procedure->getLastRevision()->getRevisionStateId(); ?>
  <div class="state_<?php echo $state ?>">
  <?php if($state == 7) : ?>
      <?php echo link_to($procedure->getLastRevision()->getState(), 'revisions/control?id='.$procedure->getLastRevision()->get('id')); ?>
  <?php else : ?>
      <?php echo $procedure->getLastRevision()->getState(); ?>
  <?php endif; ?>
  </div>
<?php endif; ?>