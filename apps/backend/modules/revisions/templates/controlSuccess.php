<?php use_helper('I18N') ?>
<?php
/*use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.global.css');
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.default.css');*/
use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
use_stylesheet('backend/items.css');
?>
<div class="sf_admin_list" id="items-container">
  <h1><?php echo __('Items List'); ?></h1>
  <form action="<?php echo url_for('revisions/control') ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $revision->get('id') ?>" />
      <?php foreach ($rev_itemsGroup as $group) : ?>
        <?php $grupo = $group[0]->getItem()->getGroup()->getName(); ?>
      <table>
        <thead>
          <tr>
            <th class="title" colspan="5"><?php echo $group[0]->getItem()->getGroup() ?></th>
          </tr>

          <tr>
            <th></th>
            <th>M</th>
            <th><?php echo __('Ok') ?></th>
            <th><?php echo __('Er') ?></th>
            <th><?php echo __('nc') ?></th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th colspan="4">
              | <span class="ok"> ok: <?php echo ($revision->getItemsGroupOK($group[0]->getItem()->getGroupId()) ? $revision->getItemsGroupOK($group[0]->getItem()->getGroupId())->count : 0) ?></span>
              | <span class="error">error: <?php echo ($revision->getItemsGroupError($group[0]->getItem()->getGroupId()) ? $revision->getItemsGroupError($group[0]->getItem()->getGroupId())->count : 0) ?></span>
              | <span class="nc">s/c: <?php echo ($revision->getItemsGroupSC($group[0]->getItem()->getGroupId()) ? $revision->getItemsGroupSC($group[0]->getItem()->getGroupId())->count : 0) ?></span>
              | total: <?php echo $group->count() ?> |</th>
          </tr>
        </tfoot>
        <tbody>
            <?php foreach ($group as $rev_item) : ?>

              <?php $count_msg = $rev_item->getComunication()->count() ?>

              <?php $state = $rev_item->getState() ?>
              <?php $item =  $rev_item->getItem() ?>
          <tr>
            <td><?php echo $item ?></td>
            <td><strong><?php echo link_to($count_msg, 'revisions/item?id='.$rev_item->getId()) ?></strong></td>

                <?php if($sf_user->getGuardUser()->hasGroup($grupo)) : ?>
            <td><input <?php if($revision->getBlock()) echo 'disabled' ?> <?php if($state == 'ok') echo 'checked' ?> class="opt-ok" type="radio" name="items[<?php echo $item->get('id') ?>]" value="ok" /></td>
            <td><input <?php if($revision->getBlock()) echo 'disabled' ?> <?php if($state == 'error') echo 'checked' ?> class="opt-error" type="radio" name="items[<?php echo $item->get('id') ?>]" value="error"/></td>
            <td><input <?php if($revision->getBlock()) echo 'disabled' ?> <?php if($state == 'nc') echo 'checked' ?> class="opt-nc" type="radio" name="items[<?php echo $item->get('id') ?>]" value="nc"/></td>
                <?php else: ?>
            <td><?php if($state == 'ok') echo '*' ?></td>
            <td><?php if($state == 'error') echo '*' ?></td>
            <td><?php if($state == 'nc') echo '*' ?></td>
                <?php endif; ?>
          </tr>
            <?php endforeach; ?>
        </tbody>


      </table>
      
      <?php endforeach; ?>
      
      <?php if(!$revision->getBlock()) : ?>
      <div class="right"><input type="submit" value="<?php echo __('Save') ?>" class="right" /></div> 
      <?php endif; ?>

      <?php slot('sidebar') ?>
       

        <nav>
          <h2><?php echo __('Options'); ?></h2>

          <ul>
            <li><?php echo link_to(__('go to procedure'), 'procedures/show?id='.$revision->getProcedureId()) ?></li>
            

            <?php if(!$revision->getBlock()) : ?>
            <li><?php echo link_to(__('Close revision'), 'revisions/close?id='.$revision->get('id')) ?></li>
            <?php else : ?>
              <?php if($revision->getRevisionStateId() == 7) : ?>
                <?php if($sf_user->getGuardUser()->hasPermission('Responsable de cierre') && $revision->isLastRevision()) : ?>
            <li><?php echo link_to('Finalizar Trámite', 'revisions/complete?id='.$revision->get('id')) ?></li>
                <?php endif; ?>

              <?php endif; ?>
            <?php endif; ?>
          </ul>
        </nav>

  <?php include_partial('revisions/revision', array('revision' => $revision)) ?>
  <?php include_partial('procedures/procedure', array('procedure' => $revision->getProcedure())) ?>
      
        <?php if($revision->getBlock()) : ?>
      <div class="tip">
        <h2 class="closed"><?php echo __('Revision is blocked') ?></h2>
        <p>Esta revisión ha sido bloqueada e informada al responsable del trámite. Usted puede crear una nueva revisión de control si lo cree necesario; por ejemplo, si hay ítems que todavía no hayan sido controlados.</p>
</div>
 <?php endif; ?>
      
    <?php end_slot(); ?>
  </form>
</div>
