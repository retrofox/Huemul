<?php if(!is_null($revision->getRevisionStateId())) : ?>
<?php $state = $revision->getRevisionStateId(); ?>
  <?php echo link_to($revision->getState(), 'revisions/control?id='.$revision->get('id'), array('class' => 'state_'.$revision->getRevisionStateId())); ?>
<?php endif; ?>