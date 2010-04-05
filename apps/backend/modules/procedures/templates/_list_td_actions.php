<td class="object_actions">
  <div class="object_actions_container">
    <span class="label_action"><?php echo __('actions'); ?></span>
    <ul>

      <li class="sf_admin_action_detail">
        <?php echo link_to(__('Detail', array(), 'messages'), 'procedures/show?id='.$procedure->getId(), array()) ?>
      </li>
      <?php echo $helper->linkToDelete($procedure, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
      <?php echo $helper->linkToEdit($procedure, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    </ul>
  </div>
</td>
