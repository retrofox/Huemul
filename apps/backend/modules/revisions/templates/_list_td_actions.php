<td class="object_actions">
  <div class="object_actions_container">
    <span class="label_action"><?php echo __('actions'); ?></span>
    <ul>
      <?php if($revision->getRevisionStateId() == 8) : ?>
      <li>
        <?php echo link_to(__('Control', array(), 'messages'), 'revisions/control?id='.$revision->getId(), array()) ?>
      </li>

      <?php elseif ($revision->getRevisionStateId() == 5) : ?>
      <li class="sf_admin_action_revisions">
        <?php echo link_to(__('Create control revision', array(), 'messages'), 'revisions/createControlRevision?revision_id='.$revision->getId(), array()) ?>
      </li>

      <?php elseif($revision->getRevisionStateId() == 7) : ?>
      <li>
        <?php echo link_to(__('Show', array(), 'messages'), 'revisions/control?id='.$revision->getId(), array()) ?>
      </li>
      <?php endif; ?>


      <?php echo $helper->linkToEdit($revision, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
      <?php echo $helper->linkToDelete($revision, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
      <li class="sf_admin_action_show_procedure">
        <?php echo link_to(__('Show procedure', array(), 'messages'), 'procedures/show?id='.$revision->getProcedureId(), array()) ?>
      </li>
    </ul>
  </div>
</td>
