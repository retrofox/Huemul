<?php use_helper('I18N', 'Date') ?>

<h1><?php echo __('Procedures List'); ?></h1>

<table>
  <thead>
    <tr>
      <th><?php echo __('Form Type'); ?></th>
      <th><?php echo __('Dossier'); ?></th>
      <th><?php echo __('Current State'); ?></th>
      <th><?php echo __('Origin date'); ?></th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($procedures as $procedure): ?>
    <tr>

      <td><?php echo $procedure->getFormu() ?></td>
      <td><?php echo __($procedure->getDossier()) ?></td>
      <td><?php echo __($procedure->getCurrentRevision()->getState()) ?></td>
      <td><?php echo format_date($procedure->getCreatedAt(), 'f') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('procedures/new') ?>"><?php echo __('New') ?></a>
