<?php
use_stylesheet('frontend/items.css');
?>

<?php use_helper('I18N', 'Date') ?>

<?php slot('sidebar') ?>

<hr />

<section class="menu_sidebar">
  <?php include_partial('procedures/procedure', array('procedure' => $revision->getProcedure())) ?>
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS'); ?></h2></li>
      <li><?php echo link_to(__('Show revisions'), 'procedures/show?procedure_id='.$revision->getProcedureId()) ?></li>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$revision->getProcedureId()) ?></li>
    </ul>
  </nav>

  <?php $state = $revision->getRevisionStateId() ?>
  <?php if($state == 7) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Esta es una revisión de estado 'Corregido'. Usted debe <?php echo link_to('controlar ', 'revisions/showRevision?id='.$revision->get('id')) ?>los distintos ítems o requisitos del trámite para poder continuar con el proceso.<br />Muy posiblemente <?php echo link_to('deba crear', 'revisions/new?procedure_id='.$revision->getProcedureId()) ?> una nueva revisión en respuesta con las correcciones notadas.</p>
  </div>
  <?php endif; ?>

</section>

<?php end_slot(); ?>

<h1><?php echo __('Items List'); ?></h1>

<div class="sf_admin_list" id="items-container">

  <section class="">

    <input type="hidden" name="id" value="<?php echo $revision->get('id') ?>" />
    <?php foreach ($rev_itemsGroup as $group) : ?>
    <table class="orange">
      <thead>
        <tr>
          <th class="title" colspan="4"><?php echo $group[0]->getItem()->getGroup() ?></th>
        </tr>
      </thead>

      <tfoot>
        <tr>
          <th colspan="4"><?php echo count($group).' itmes' ?></th>
        </tr>
      </tfoot>
      <tbody>
          <?php foreach ($group as $rev_item) : ?>
            <?php $state = $rev_item->getState() ?>
            <?php $item =  $rev_item->getItem() ?>
        <tr>
          <td><?php echo $item ?></td>
          <?php $msg_count = count($rev_item->getComunication()) ?>
          <td <?php if($msg_count > 0) echo 'class="comment"' ?>>
            <?php if($msg_count > 0) : ?>
            <?php echo link_to($msg_count, 'revisions/item?id='.$rev_item->get('id')) ?>
            <?php else : ?>
            <?php echo $msg_count ?>
            <?php endif; ?>
          </td>
          <td>
            <?php echo link_to('&nbsp;', 'revisions/item?id='.$rev_item->get('id'), array('class' => 'comment')) ?>
          </td>
          <td class="<?php echo $state ?>"><?php echo $rev_item->getStateComplete() ?></td>
        </tr>
          <?php endforeach; ?>
      </tbody>
    </table>

    <?php endforeach; ?>
  </section>
</div>