<?php use_helper('I18N') ?>
<?php
use_stylesheet('mooDoo.2/generator.global.css');
use_stylesheet('mooDoo.2/generator.default.css');
use_stylesheet('mooDoo.2/generator.list.css');
use_stylesheet('backend/items.css');
?>

<h1><?php echo __('Items List'); ?></h1>

<div class="sf_admin_list" id="items-container">
  <form action="<?php echo url_for('revisions/control') ?>" method="post">
    <section class="col-left">

      <input type="hidden" name="id" value="<?php echo $revision->get('id') ?>" />

      <?php foreach ($rev_itemsGroup as $group) : ?>
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
            <th colspan="4"><?php echo count($group).' itmes' ?></th>
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
            <td><input <?php if($revision->getBlock()) echo 'disabled' ?> <?php if($state == 'ok') echo 'checked' ?> class="opt-ok" type="radio" name="items[<?php echo $item->get('id') ?>]" value="ok" /></td>
            <td><input <?php if($revision->getBlock()) echo 'disabled' ?> <?php if($state == 'error') echo 'checked' ?> class="opt-error" type="radio" name="items[<?php echo $item->get('id') ?>]" value="error"/></td>
            <td><input <?php if($revision->getBlock()) echo 'disabled' ?> <?php if($state == 'nc') echo 'checked' ?> class="opt-nc" type="radio" name="items[<?php echo $item->get('id') ?>]" value="nc"/></td>
          </tr>
            <?php endforeach; ?>
        </tbody>
      </table>

      <?php endforeach; ?>



    </section>

    <section class="col-right">
      <div class="board">
        <section>
          <p><?php echo __('Revision number') ?>: <strong><?php echo $revision->getNumber() ?></strong></p>
          <p><?php echo __('Parent revision') ?>: <strong><?php echo $revision->getParentId() ?></strong></p>
        </section>
        <section class="options">
          <h1><?php echo __('Options'); ?></h1>

          <ul>
            <li><?php echo link_to(__('go to revisions'), 'revisions/index?revision_filters[procedure_id]='.$revision->getProcedureId()) ?></li>
            <li><?php echo link_to(__('go to procedure'), 'procedures/show?id='.$revision->getProcedureId()) ?></li>
            <?php if(!$revision->getBlock()) : ?>
            <li><?php echo link_to(__('Close revision'), 'revisions/close?id='.$revision->get('id')) ?></li>
            <?php endif; ?>
          </ul>
        </section>


        <?php if($revision->getBlock()) : ?>
            <p class="closed"><?php echo __('Revision is blocked') ?></p>
          <?php else : ?>
          <input type="submit" value="<?php echo __('Save') ?>" />
          <?php endif; ?>
          
      </div>



          


          
    </section>
  </form>
</div>