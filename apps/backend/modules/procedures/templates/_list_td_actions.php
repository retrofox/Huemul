<td class="object_actions">
  <div class="object_actions_container">
    <span class="label_action"><?php echo __('actions'); ?></span>
    <ul>

      <?php if ($procedure->getLastRevision()->getRevisionStateId() == 5) : ?>
      <li class="sf_admin_action_revisions">
        <?php echo link_to(__('Create control revision', array(), 'messages'), 'revisions/createControlRevision?revision_id='.$procedure->getLastRevision()->getId(), array()) ?>
      </li>
      <?php endif; ?>

      <li class="sf_admin_action_revisions">
        <?php echo link_to(__('Revisions', array(), 'messages'), 'procedures/List_revisions?id='.$procedure->getId(), array()) ?>
      </li>

      <?php echo $helper->linkToDelete($procedure, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
      <?php echo $helper->linkToEdit($procedure, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    </ul>
  </div>
</td>
