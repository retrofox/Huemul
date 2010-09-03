<?php use_helper('I18N', 'Date') ?>
<?php include_partial('procedures/assets') ?>
<?php include_partial('procedures/assets.edit') ?>
<?php
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
use_stylesheet('backend/procedure.css');
?>
<div id="sf_admin_container" class="admin_edit">
  <h1><?php echo __('Edit Procedures', array(), 'messages') ?></h1>

  <?php include_partial('procedures/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('procedures/form_header', array('procedure' => $procedure, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('procedures/form', array('procedure' => $procedure, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('procedures/form_footer', array('procedure' => $procedure, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
<?php slot('sidebar') ?>

    <?php $lastRev = $procedure->getLastRevision() ?>
    <?php $state = $lastRev->getRevisionStateId() ?>
    <?php $block = $lastRev->getBlock() ?>
    <?php $lastControlRev = $procedure->getLastControlRevision() ?>

    <?php include_partial('procedures/tip', array('procedure' => $procedure)) ?>
    <nav>
      <h2><?php echo __('Options'); ?></h2>
      <ul>
        <li><?php echo link_to('Ver todos los trámites', 'procedures/index') ?></li>
        <?php if($state == 5 && !$block) : ?>
        <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$lastRev->getId()) ?></li>
        <?php elseif($state == 8 || ($state == 5 && $block)) : ?>
        <li><?php
            $revControl= $procedure->getLastRevision()->getId();
            echo link_to('Controlar revisión', 'revisions/control?id='.$lastControlRev->getId()) ?></li>
        <?php endif; ?>

        <?php if($state == 4) : ?>
        <li>
            <?php if($procedure->getFormuId() == 2) : ?>
              <?php echo link_to(__('Download documentation'), 'procedures/permisoDeConstruccion?id='.$procedure->get('id')) ?>
            <?php else: ?>
              <?php echo link_to(__('Download documentation'), 'procedures/constancia?id='.$procedure->get('id')) ?>
            <?php endif; ?>
        </li>
        <?php endif; ?>

        
        <li>
          <?php echo link_to(__('Edit procedure', array()), 'procedures/edit?id='.$procedure->getId(), array()) ?>
        </li>
        <li>
          <?php echo link_to(__('Procedure responsibles', array()), 'userProcedure/index?procedure_id='.$procedure->getId(), array()) ?>
        </li>

      </ul>
    </nav>
    <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>

<?php end_slot(); ?>
