<?php use_helper('I18N') ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>
<?php $state = $procedure->getLastRevision()->get('revision_state_id') ?>

<?php slot('sidebar') ?>
  <nav>
    <h2><?php echo __('OPTIONS'); ?></h2>
    <ul>
      <li><?php echo link_to(__('All revisions'), 'procedures/show?procedure_id='.$procedure->get('id')) ?></li>
      <?php if($state != 4) : ?>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$procedure->get('id')) ?></li>
      <?php endif; ?>
    </ul>
  </nav>


  <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
  <?php $state = $procedure->getLastRevision()->get('revision_state_id') ?>

  <?php if($state == 1) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>El estado de su revisión actual es <em><?php echo $procedure->getLastRevision()->getState() ?></em>. Es necesario <?php echo link_to('crear', 'revisions/new?procedure_id='.$procedure->get('id')) ?> una nueva revisión para finalizar esta primer etapa y así notificar finalmente este trámite al departamente de Obras Privadas.</p>
  </div>
  <?php elseif($state == 4) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Este trámite ya ha sido autorizado. Puede descargar la documentación necesaria en esta sección.</p>
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
<?php end_slot(); ?>

<div class="head">

  <?php if($state!=4) :?>

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
<?php else : ?>
<div class="head">
  <h1>Trámite finalizado</h1>
  <p>Este trámite ya ha sido autorizado.
</div>
<?php endif; ?>



<p class="note">
Usted debe crear una revisión cuando necesite enviar cambios en el proceso del trámite. Generalmente por cada revisión creada se suele adjuntar un archivo que contenga un plano, documento, etc.<br />
Los tipos de archivos que usted puede adjuntar son imágenes (<strong>.png, .jpg y .gif</strong>), documentos <strong>.pdf</strong> y finalmente cualquier tipo de archivo comprimido <strong>.zip</strong> o <strong>.rar</strong>.<br />
Para la mayoría de los trámites se sugiere adjuntar planos en formato <strong>.dwf</strong> comprimidos.
</p>