<?php use_helper('I18N', 'Date') ?>
  <table>
    <caption>
          <?php echo __('Revision Detail'); ?>
    </caption>
    <tbody>
      <tr>
        <th><?php echo __('Revision number'); ?></th>
        <td><?php echo $revision->getNumber() ?></td>
      </tr>
      <tr>
        <th><?php echo __('Parent revision'); ?></th>
        <td><?php echo $revision->getParent()->getNumber() ?></td>
      </tr>
      <tr>
        <th><?php echo __('Created at'); ?></th>
        <td><?php echo format_date($revision->getCreatedAt(), 'f') ?></td>
      </tr>
      <tr>
        <th><?php echo __('User'); ?></th>
        <td><?php echo $revision->getCreator() ?></td>
      </tr>
    </tbody>
  </table>
