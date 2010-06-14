<?php use_helper('I18N', 'Date') ?>
<?php
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
use_stylesheet('backend/procedure.css');
?>
<div class="sf_admin_list" id="items-container">
  <h1><?php echo __('Procedure Revision List') ?></h1>
  <table>
    <thead>
      <tr class="title">
        <th class="title"><?php echo __('Revisions') ?></th>
      </tr>
    </thead>

    <tfoot>
      <tr>
        <th >&nbsp;</th>
      </tr>
    </tfoot>

    <tbody>
      <?php foreach ($procedure->getRevisions() as $revision) : $state = $revision->getRevisionStateId(); ?>
      <tr>
        <td>
          <div class="blk-revision">
            <h2 class="<?php echo $revision->getBlock() ? 'blocked' : 'unlocked' ?>"><?php echo $revision->getNumber() ?></h2>
            <h3><?php echo $revision->getCreator() ?></h3>
            <p class="info">
              <span class="date"><?php echo format_date($revision->getCreatedAt(), 'd') ?></span> |
              <span class="block"><?php echo __($revision->getBlock() ? 'blocked' : 'unlocked' )?></span>
            </p>

              <?php if($revision->getGroups()->count() > 0) : ?>
            <table class="items_control">
              <tbody>
                <tr>
                  <th colspan="4">Control de items</th>

                </tr>
                <tr>
                  <th>Grupo</th>
                  <th>ok</th>
                  <th>er</th>
                  <th>sc</th>
                </tr>
                    <?php foreach ($revision->getGroups() as $itemGroup) : ?>
                <tr>
                  <th><?php echo $itemGroup->getGroup()->getNameAcronym() ?></th>
                  <td class="ok"><?php echo ($revision->getItemsGroupOK($itemGroup->get('group_id')) ? $revision->getItemsGroupOK($itemGroup->get('group_id'))->count : 0 )?></td>
                  <td class="error"><?php echo ($revision->getItemsGroupError($itemGroup->get('group_id')) ? $revision->getItemsGroupError($itemGroup->get('group_id'))->count : 0 )?></td>
                  <td class="nc"><?php echo ($revision->getItemsGroupSC($itemGroup->get('group_id')) ? $revision->getItemsGroupSC($itemGroup->get('group_id'))->count : 0 )?></td>
                </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
              <?php endif; ?>

            <div class="sidebar-right">
              <div class="state_<?php echo $revision->getRevisionStateId() ?>"><?php echo $revision->getState() ?></div>
                <?php //if($procedure->getLastRevision()->get('id') == $revision->get('id')) : ?>
              <div class="actions">
                <ul>
                    <?php if ($revision->getFile() != null) : ?>
                  <li><a href="/uploads/revisions/<?php echo $revision->getFile() ?>" title="view file"><?php echo __('Download'); ?></a></li>
                    <?php endif; ?>

                    <?php if($state == 5) : ?>
                  <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?></li>

                    <?php elseif($state == 4) : ?>
                  <li><?php // echo link_to('Generar documentación', 'revisions/generateDocumentation?id='.$revision->getId()) ?>
                        <?php if($procedure->getFormuId() == 2) : ?>
                          <?php echo link_to(__('Download documentation'), 'procedures/permisoDeConstruccion?id='.$procedure->get('id')) ?>

                        <?php else: ?>
                          <?php echo link_to(__('Download documentation'), 'procedures/constancia?id='.$procedure->get('id')) ?>

                        <?php endif; ?>
                  </li>

                    <?php elseif($state == 8) : ?>
                  <li><?php echo link_to('Controlar', 'revisions/control?id='.$revision->getId()) ?></li>

                    <?php elseif($state == 7) : ?>
                  <li><?php echo link_to(__('View'), 'revisions/control?id='.$revision->getId()) ?></li>

                      <?php if($sf_user->getGuardUser()->hasPermission('Responsable de cierre') && $revision->isLastRevision()) : ?>
                  <li><?php echo link_to('Finalizar Trámite', 'revisions/complete?id='.$revision->get('id')) ?></li>
                      <?php endif; ?>

                    <?php endif; ?>
                  <li><?php echo link_to('Observar (<strong>'.$revision->getComunication()->count().'</strong>)', 'revisions/observe?id='.$revision->getId()) ?></li>

                </ul>
              </div>
                <?php //endif; ?>
            </div>
            <div class="description"><?php echo ($revision->getRawValue()->getDescription() != '' ? $revision->getRawValue()->getDescription() : '<p>Sin descripción.</p>') ?></div>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php slot('sidebar') ?>

<?php $state = $procedure->getLastRevision()->getRevisionStateId() ?>

<nav>
  <h2><?php echo __('Options'); ?></h2>
  <ul>
    <li><?php echo link_to('Ver todos los trámites', 'procedures/index') ?></li>
    <?php if($state == 5) : ?>
    <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?></li>
    <?php elseif($state == 8) : ?>
    <li><?php
        $revControl= $procedure->getLastRevision()->getId();
        echo link_to('Controlar revisión', 'revisions/control?id='.$revControl) ?></li>
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

    <?php if($state == 7) : ?>
    <?php if($sf_user->getGuardUser()->hasPermission('Responsable de cierre')) : ?>
    <li><?php echo link_to('Finalizar Trámite', 'revisions/complete?id='.$revision->get('id')) ?></li>
    <?php endif; ?>
    <?php endif; ?>
  </ul>
</nav>
<?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>


<div class="tip">
  <h2><?php echo __('Suggestions'); ?></h2>
  <?php if($state == 5) : ?>
  <p>El trámite actual cuenta con una revisión que requiere ser controlada. Es necesario <?php echo link_to('crear', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?> una revisión de control.</p>
  <?php elseif($state == 8) : ?>
  <p>El usuario <?php echo $revision->getCreator() ?> ha creado una revisión de control que todavía no ha sido cerrada. Es conventiente trabajar en la misma antes de realizar alguna otra acción.</p>
  <?php endif; ?>
</div>

<?php end_slot(); ?>
