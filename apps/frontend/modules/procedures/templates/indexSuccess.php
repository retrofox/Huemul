<?php use_helper('I18N', 'Date') ?>

<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS') ?></h2></li>
      <li><?php echo link_to(__('Add new procedure'), 'procedures/new') ?></li>
      <li><?php echo link_to(__('Procedures List'), 'procedures/index') ?></li>
    </ul>
  </nav>
</section>
<?php end_slot(); ?>


<?php if ($procedures->count() > 0) : ?>

<div class="head">
  <h1><?php echo __('Procedures List'); ?></h1>
  <p>A continuación se muestran todos los trámites de su cuenta.</p>
</div>

<table class="orange">
  <thead>
    <tr>
      <th><?php echo __('Cadastral data'); ?></th>
      <th><?php echo __('Type'); ?></th>
      <th><?php echo __('Dossier'); ?></th>
      <th><?php echo __('State'); ?></th>
      <th><?php echo __('Date'); ?></th>
      <th><?php echo __('Actions'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($procedures as $procedure): ?>
    <tr>
      <td><?php echo $procedure->getCadastralData() ?></td>
      <td><?php echo $procedure->getFormu() ?></td>
      <td><?php echo __($procedure->getDossier()) ?></td>
      <td class="state_<?php echo $procedure->getLastRevision()->getRevisionStateId() ?>"><?php include_partial('procedures/state', array('revision' => $procedure->getLastRevision())) ?></td>
      <td><?php echo format_date($procedure->getCreatedAt(), 'f') ?></td>
      <td>
        <?php echo link_to(__('Revisions'), 'procedures/show?procedure_id='.$procedure->get('id')) ?> | 
        <?php echo link_to(__('Edit'), 'procedures/edit?id='.$procedure->get('id')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>No hay trámites creados.</p>
<?php endif; ?>
