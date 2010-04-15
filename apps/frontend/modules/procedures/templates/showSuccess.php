<?php use_helper('I18N', 'Date') ?>

<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS'); ?></h2></li>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$procedure->get('id')) ?></li>
    </ul>
  </nav>


  <?php $state = $procedure->getLastRevision()->get('revision_state_id') ?>
  <?php if($state == 1) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>El estado de su revisión actual es <em><?php echo $procedure->getLastRevision()->getState() ?></em>. Es necesario <?php echo link_to('crear', 'revisions/new?procedure_id='.$procedure->get('id')) ?> una nueva revisión para finalizar esta primer etapa y así notificar finalmente este trámite al departamente de Obras Privadas.</p>
  </div>
  <?php elseif($state == 5) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>El trámite ya ha sido informado. Debe esperar a que este sea controlado por personal resposable.</p>
  </div>

  <?php elseif($state == 7) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Existe una revisión de estado 'Corregido'. Usted debe <?php echo link_to('controlar ', 'revisions/showRevision?id='.$procedure->getLastRevision()->get('id')) ?>los distintos ítems o requisitos del trámite para poder continuar con el proceso.<br />Muy posiblemente <?php echo link_to('deba crear', 'revisions/new?procedure_id='.$procedure->get('id')) ?> una nueva revisión en respuesta con las correcciones notadas.</p>
  </div>

  <?php elseif($state == 8) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Una revisión previamente enviada por usted ha comenzado a ser procesada por parte del personal responsable municipal.<br />
      Se ha creado una nueva revisión de estado <em>'En Proceso'</em> que en breve será terminará de controlar.</p>
  </div>

  <?php endif; ?>
</section>

<?php end_slot(); ?>

<div class="head">
  <h1><?php echo __('Revisions List'); ?></h1>
  <p>Durante el proceso del trámite se irán creando 'revisiones'; tales son etapas necesarias que se deben ir completando hasta finalizarlo.</p>
</div>

<table class="orange">
  <caption><?php echo __('Revisions List'); ?></caption>
  <thead>
    <tr>
      <th><?php echo __('Number'); ?></th>
      <th><?php echo __('State'); ?></th>
      <th><?php echo __('Created at'); ?></th>
      <th><?php echo __('Attach'); ?></th>
      <th><?php echo __('Action'); ?></th>
      <th><?php echo __('Messages'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($procedure->getRevisions() as $revision): ?>
    <tr>
      <td><?php echo $revision->get('number') ?></td>
      <td class="state_<?php echo (!is_null($revision->getRevisionStateId()) ? $revision->getRevisionStateId() : 'empty')?>"><?php include_partial('procedures/state', array('revision' => $revision)) ?></td>
      <td><?php echo format_date($revision->get('created_at'), 'f') ?></td>
      <td>
        <?php if ($revision->getFile() != null) : ?>
        <a href="/uploads/revisions/<?php echo $revision->getFile() ?>" title="view file"><?php echo __('Download'); ?></a>
        <?php else :  ?>
        &mdash;
        <?php endif; ?>
      </td>

      <td>
          <?php if($revision->getRevisionStateId() == 7 || $revision->getRevisionStateId() == 8) : ?>
            <?php echo link_to(__('show'), 'revisions/showRevision?id='.$revision->get('id')) ?>
          <?php else : ?>
        &mdash;
          <?php endif; ?>
      </td>
      <td>
        <?php echo link_to($revision->getComunication()->count(), 'revisions/messages?id='.$revision->get('id')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>