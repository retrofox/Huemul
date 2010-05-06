<?php use_helper('I18N', 'Date') ?>
<?php if ($procedures->count() > 0) : ?>



<table class="orange">
  <caption><?php echo __('Procedures List'); ?></caption>
  
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
      <th scope="row"><?php echo $procedure->getCadastralData() ?></th >
      <td><?php echo $procedure->getFormu() ?></td>
      <td><?php echo __($procedure->getDossier()) ?></td>
      <td class="state_<?php echo $procedure->getLastRevision()->getRevisionStateId() ?>"><?php include_partial('procedures/state', array('revision' => $procedure->getLastRevision())) ?></td>
      <td><?php echo format_date($procedure->getCreatedAt(), 'f') ?></td>
      <td>
        <?php echo link_to(__('Detail'), 'procedures/show?procedure_id='.$procedure->get('id'), array('class'=>'revisiones', 'title'=>__('Ver/Agregar revisiones del trámite'))) ?> |
        <?php echo link_to(__('Edit'), 'procedures/edit?id='.$procedure->get('id'), array('class'=>'edit', 'title'=>__('Editar información del trámite'))) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<p class="note" >Aquí se muestran todos los trámites asociados a su cuenta.</p>
<?php else: ?>
<p class="note" >No hay trámites creados.</p>
<?php endif; ?>
