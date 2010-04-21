<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('frontend/item.css'); ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>



<?php slot('sidebar') ?>
<section class="menu_sidebar">
  
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS'); ?></h2></li>
      <li><?php echo link_to(__('Show revision items'), 'revisions/showRevision?id='.$revItem->getRevisionId()) ?></li>
      <li><?php echo link_to(__('Show revisions'), 'procedures/show?procedure_id='.$revItem->getRevision()->getProcedureId()) ?></li>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$revItem->getRevision()->getProcedureId()) ?></li>
    </ul>
  </nav>
  <?php include_partial('procedures/procedure', array('procedure' => $revItem->getRevision()->getProcedure())) ?>
</section>

<?php end_slot(); ?>

<div class="sf_admin_list" id="item">

    <table class="orange">
      <caption><?php echo __('Items detail'); ?>: <?php echo $revItem->getItem() ?></caption>

      <tbody> 
        <tr>
          <th><?php echo __('State') ?></th>
          <td class="<?php echo $revItem->getState() ?>"><?php echo $revItem->getStateComplete() ?></td>
          <th><?php echo __('Description') ?></th>
        </tr>
        <tr>
          <th><?php echo __('Revision') ?></th>
          <td>
            <?php echo link_to($revItem->getRevision()->getNumber(), 'revisions/showRevision?id='.$revItem->getRevisionId()) ?>
          </td>
          <td rowspan="3"><?php echo $revItem->getItem()->getDescription() ?></td>
        </tr>
        <tr>
          <th><?php echo __('Procedure') ?></th>
          <td>
            <?php echo link_to($revItem->getRevision()->getProcedure(), 'procedures/show?procedure_id='.$revItem->getRevision()->getProcedureId()) ?>
          </td>
        </tr>

        <tr>
          <th><?php echo __('Controller') ?></th>
          <td>
            <?php echo $revItem->getUserController() ?>
          </td>
        </tr>

      </tbody>
    </table>
    
    <?php $count_msg = $revItem->getComunication()->count() ?>
   

    <table class="orange">
      <caption><?php echo __('Messages') ?></caption>
      <tbody class="comments">
        <?php if($count_msg > 0 ) : ?>
          <?php foreach ($revItem->getComunication() as $msg) : ?>

        <tr><th colspan="2">Asunto</th><td class="asunto"> <?php echo $msg ?></td></tr>

         <tr><th>Autor</th><td > <?php echo $msg->getAuthor() ?></td><td rowspan="2"><?php echo $msg->getRawValue()->getMessage() ?></td>  </tr>
         <tr><th>Fecha</th><td > <?php echo format_date($msg->getCreatedAt(), 'd') ?></td>

        </tr>
        
          <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td colspan="2"><?php echo __('No messages') ?></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  <form id="msg-form" action="<?php echo url_for('revisions/comment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php echo $form->renderHiddenFields() ?>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table class="orange">
      <caption><?php echo __('Add message') ?></caption>
      <tbody>
      <tr><th><?php echo $form['subject']->renderlabel() ?></th><td><?php echo $form['subject']->renderError() ?>
            <?php echo $form['subject'] ?></td></tr>


      <tr><th><?php echo $form['message']->renderlabel() ?></th><td>
            <?php echo $form['message']->renderError() ?>
            <?php echo $form['message'] ?></td></tr>
      </tbody>
      <tfoot>
        <tr><td colspan="2"> <input type="submit" value="<?php echo __('Send'); ?>" /></td></tr>
      </tfoot>
      </table>
    </form>
</div>