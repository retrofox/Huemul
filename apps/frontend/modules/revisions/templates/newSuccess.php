<?php use_helper('I18N') ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>

<?php slot('sidebar') ?>
<section class="menu_sidebar">
  <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>

  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS'); ?></h2></li>
      <li><?php echo link_to(__('All revisions'), 'procedures/show?procedure_id='.$procedure->get('id')) ?></li>
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
    <p>Es correcto que usted agregue una nueva revisión al trámite para poder continuar con el proceso; ya que el estado de la revisión anterior es 'Corregido'.</p>
  </div>

  <?php elseif($state == 8) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Cuidado. Actualmente este trámite cuenta con una revisión que está siendo procesada por personal municipal.</p>
  </div>


  <?php endif; ?>
</section>

<?php end_slot(); ?>

<div class="head">
  <h1><?php echo __('Add new revision'); ?></h1>
  <p>
    Usted debe crear una revisión cuando necesite enviar cambios en el proceso del trámite. Generalmente por cada revisión creada se suele adjuntar un archivo que contenga un plano, documento, etc.
  </p>
  <?php if($state == 1) : ?>
  <div class="info">
    <p>El estado de su revisión actual es <em><?php echo $procedure->getLastRevision()->getState() ?></em>. Es necesario <?php echo link_to('crear', 'revisions/new?procedure_id='.$procedure->get('id')) ?> una nueva revisión para finalizar esta primer etapa y así notificar finalmente este trámite al departamente de Obras Privadas.</p>
  </div>
  <?php elseif($state == 5) : ?>
  <div class="info"> 
    <p>El trámite ya ha sido informado. Debe esperar a que este sea controlado por personal resposable. De todas formas usted puede crear una nueva revisión de control si lo cree necesario.</p>
  </div>

  <?php elseif($state == 8) : ?>
  <div class="info">
    <p>Cuidado. Actualmente dentro de este trámite se cuenta con una revisión que está siendo procesada por personal responsable. De todas formas usted puede crear una nueva revisión de control si lo cree necesario.</p>
  </div>

  <?php endif; ?>

</div>


<?php include_partial('form', array('form' => $form, 'procedure' => $procedure)) ?>
