<?php use_helper('I18N', 'Date') ?>
<?php
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
use_stylesheet('backend/procedure.css');
?>

<?php
use_stylesheet('frontend/item.css');
?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>

<?php $state = $revision->getRevisionStateId(); ?>
<div class="sf_admin_list" id="items-container">

  <h1><?php echo __('Revision Observations') ?></h1>
   <table>
      <thead>
        <tr class="title">
          <th class="title"><?php echo __('Revision') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th >&nbsp;</th>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td>
            <div class="blk-revision">
              <h2 class="<?php echo $revision->getBlock() ? 'blocked' : 'unlocked' ?>"><?php echo $revision->getNumber() ?></h2>
              <h3><?php echo $revision->getCreator() ?></h3>
              <p>
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

              </div>
              <div class="description"><?php echo ($revision->getRawValue()->getDescription() != '' ? $revision->getRawValue()->getDescription() : '<p>Sin comentarios.</p>') ?></div>
            </div>
          </td>
        </tr>
        <?php foreach ($revision->getComunication() as $msg) : ?>
        <tr>
          <td>
            <strong><?php echo $msg ?></strong> | <?php echo $msg->getAuthor() ?> | <?php echo format_date($msg->getCreatedAt(), 'd') ?><br />
              <?php echo $msg->getRawValue()->getMessage() ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br />
    
    <form id="msg-form" action="<?php echo url_for('revisions/revisionComment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <table>
        <caption><?php echo __('Add Observation') ?></caption>
        <?php echo $form ?>
        <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
        <tfoot>
        <tr>
          <td colspan="2"><input type="submit" value="<?php echo __('Save'); ?>" /></td>
        </tr>
        </tfoot>
      </table>
    </form>
 <?php slot('sidebar') ?>
  <nav>
        <h2><?php echo __('Options'); ?></h2>
        <ul>
          <?php if($state == 5 && !$revision->getBlock()) : ?>
          <li><?php echo link_to('Crear revisión de control', 'revisions/createControlRevision?revision_id='.$revision->getId()) ?></li>
          <?php elseif($state == 8) : ?>
          <li><?php echo link_to('Controlar revisión', 'revisions/control?id='.$revision->getId()) ?></li>
          <?php endif; ?>
          <li><?php echo link_to('ir a trámite', 'procedures/show?id='.$revision->get('procedure_id')) ?></li>
          <li><?php echo link_to('Ver todos los trámites', 'procedures/index') ?></li>
        </ul>
      </nav>
    <?php include_partial('revisions/revision', array('revision' => $revision)) ?>
    <?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
  <?php end_slot(); ?>
</div>