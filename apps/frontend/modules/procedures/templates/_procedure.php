<?php use_helper('I18N') ?>
<section>
  <table class="orange">
    <thead>
      <tr>
        <th colspan="2">
          <?php echo __('Procedure Detail'); ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo __('Form type'); ?></td>
        <td><?php echo $procedure->getFormu() ?></td>
      </tr>

      <tr>
        <td><?php echo __('Dossier'); ?></td>
        <td><?php echo $procedure->getDossier() ?></td>
      </tr>

      <tr>
        <td><?php echo __('Current state'); ?></td>
        <td class="state_<?php echo $procedure->getLastRevision()->getRevisionStateId() ?>"><?php echo $procedure->getLastRevision()->getState() ?></td>
      </tr>

      <tr>
        <td><?php echo __('Created at'); ?></td>
        <td><?php echo $procedure->getCreatedAt() ?></td>
      </tr>

    </tbody>
  </table>
</section>