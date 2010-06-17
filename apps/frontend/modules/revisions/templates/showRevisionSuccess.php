<?php
use_stylesheet('frontend/items.css');
?>

<?php use_helper('I18N', 'Date') ?>

<?php slot('sidebar') ?>
  <nav>
    <h2><?php echo __('OPTIONS'); ?></h2>
    <ul>
      <li><?php echo link_to(__('Show revisions'), 'procedures/show?procedure_id='.$procedure) ?></li>
     <?php if(!($lastRevisionState==4)): ?>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$procedure) ?></li>
     <?php endif; ?>

      
    </ul>
  </nav>

  <?php include_partial('procedures/procedure', array('procedure' => $revision->getProcedure())) ?>
  <?php $state = $revision->getRevisionStateId() ?>
  <?php if($state == 7) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Esta es una revisión de estado 'Corregido'. Usted debe <?php echo link_to('controlar ', 'revisions/showRevision?id='.$revision->get('id')) ?>los distintos ítems o requisitos del trámite para poder continuar con el proceso.</p>
  <?php if(!($lastRevisionState == 4)): ?>
    <p>Muy posiblemente <?php echo link_to('deba crear', 'revisions/new?procedure_id='.$revision->getProcedureId()) ?> una nueva revisión en respuesta con las correcciones notadas.</p>
  <?php endif; ?>

  </div>
  <?php elseif($state == 8) : ?>
  <div class="tip">
    <h2>Aviso</h2>
    <p>Esta es una revisión se encuentra en esta de 'Proceso'; lo cual implica que aún no se ha terminado su proceso de visado.</p>
  </div>
  <?php endif; ?>
<?php end_slot(); ?>

  <?php if($state == 8) : ?>
  <div class="info">
    <p><strong>Aviso</strong></p>
    <p>Esta es una revisión se encuentra en esta de 'Proceso'; lo cual implica que aún no se ha terminado de controlar en su totalidad.</p>
  </div>
  <?php endif; ?>
<div class="sf_admin_list" id="items-container">
  <section class="">

    <h6><?php echo __('Items List'); ?></h6>

    <input type="hidden" name="id" value="<?php echo $revision->get('id') ?>" />
    <?php foreach ($rev_itemsGroup as $group) : ?>
      <table class="orange">
    
      <thead>
        <tr>
          <th class="title" colspan="3"><?php echo $group[0]->getItem()->getGroup() ?></th>
        </tr>
      </thead>


      <tfoot>
        <tr>
          <th colspan="3">
            | <span class="ok"> ok: <?php echo ($revision->getItemsGroupOK($group[0]->getItem()->getGroupId()) ? $revision->getItemsGroupOK($group[0]->getItem()->getGroupId())->count : 0) ?></span>
            | <span class="error">error: <?php echo ($revision->getItemsGroupError($group[0]->getItem()->getGroupId()) ? $revision->getItemsGroupError($group[0]->getItem()->getGroupId())->count : 0) ?></span>
            | <span class="nc">s/c: <?php echo ($revision->getItemsGroupSC($group[0]->getItem()->getGroupId()) ? $revision->getItemsGroupSC($group[0]->getItem()->getGroupId())->count : 0) ?></span>
            | total: <?php echo $group->count() ?> |</th>
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
            <?php //if($msg_count > 0) : ?>
            <?php echo link_to($msg_count, 'revisions/item?id='.$rev_item->get('id'), array('class'=>'messages','title'=>__('Ver/Agregar mensajes al ítem'))) ?>
            <?php //else : ?>
            <?php //echo $msg_count ?>
            <?php //endif; ?>
          </td>
        
          <td class="<?php echo $state ?>"><?php echo $rev_item->getStateComplete() ?></td>
        </tr>
          <?php endforeach; ?>
      </tbody>
  
      </table>
    <?php endforeach; ?>
  </section>
</div>