<?php use_helper('I18N') ?>
<?php
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
use_stylesheet('backend/procedure.css');
?>
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

<div class="sf_admin_list">
  <div class="placelholder"></div>
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('userProcedure/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="5">
            <div class="pagination-details">
              <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $user_procedures->count()), $user_procedures->count(), 'sf_admin') ?>

            </div>
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($user_procedures as $i => $user_procedure): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('userProcedure/list_td_batch_actions', array('user_procedure' => $user_procedure, 'helper' => $helper)) ?>
            <?php include_partial('userProcedure/list_td_tabular', array('user_procedure' => $user_procedure)) ?>
            <?php include_partial('userProcedure/list_td_actions', array('user_procedure' => $user_procedure, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>


<?php include_partial('form', array('form' => $form)) ?>
