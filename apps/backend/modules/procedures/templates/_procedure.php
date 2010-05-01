<?php use_helper('I18N', 'Date') ?>
  <table>
    <caption>
          <?php echo __('Procedure Detail'); ?>
    </caption>
    <tbody>
      <tr>
        <th><?php echo __('Procedure number'); ?></th>
        <td><?php echo $procedure ?></td>
      </tr>
      <tr>
        <th><?php echo __('User'); ?></th>
        <td><?php echo $procedure->getCreator() ?></td>
      </tr>
      <tr>
        <th><?php echo __('Created at'); ?></th>
        <td><?php echo format_date($procedure->getCreatedAt(), 'f') ?></td>
      </tr>
      <tr>
        <th><?php echo __('Cadastral data'); ?></th>
        <td><?php echo $procedure->getCadastralData() ?></td>
      </tr>
      <tr>
        <th><?php echo __('Form type'); ?></th>
        <td><?php echo $procedure->getFormu() ?></td>
      </tr>
      <tr>
        <th>Cantidad total de Items</th>
        <td><?php echo $procedure->getFormu()->getItems()->count() ?></td>
      </tr>
      <?php foreach ($procedure->getItemsGroups() as $group) : ?>
      <tr>
        <td colspan="2"><?php echo $group->getGroup() ?>(<?php echo $group->count ?>)</td>
      </tr>
      <?php endforeach; ?>

      <tr>
        <th><?php echo __('Dossier'); ?></th>
        <td><?php echo __($procedure->getDossier()) ?></td>
      </tr>

      <tr>
        <th><?php echo __('Current state'); ?></th>
        <td class="stage state_<?php echo $procedure->getLastRevision()->getRevisionStateId() ?>"><?php echo $procedure->getLastRevision()->getState() ?></td>
      </tr>

      

    </tbody>
  </table>
