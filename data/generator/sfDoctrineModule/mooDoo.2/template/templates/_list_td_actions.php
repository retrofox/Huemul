<td class="object_actions">
  <div class="object_actions_container">
    <span class="label_action">[?php echo __('actions'); ?]</span>
    <ul>
      <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
        <?php if ('_delete' == $name): ?>
          <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

        <?php elseif ('_edit' == $name): ?>
          <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

        <?php else: ?>
      <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
            <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>

      </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</td>
