<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('frontend/item.css'); ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>



<?php slot('sidebar') ?>
  <nav>
    <h2><?php echo __('OPTIONS'); ?></h2>
    <ul>
      <li><?php echo link_to(__('Show revisions'), 'procedures/show?procedure_id='.$revision->getProcedureId()) ?></li>
    </ul>
  </nav>
  <?php include_partial('procedures/procedure', array('procedure' => $revision->getProcedure())) ?>
<?php end_slot(); ?>

<div class="sf_admin_list" id="item">

    <table class="orange">
      <caption><?php echo __('Messages'); ?></caption>

      <tbody>
        <?php if($revision->getComunication()->count() > 0) : ?>
        <?php foreach ($revision->getComunication() as $msg) : ?>
       
        <tr><th colspan="2">Asunto</th><td class="asunto"> <?php echo $msg ?></td></tr>

         <tr><th>Autor</th><td > <?php echo $msg->getAuthor() ?></td><td rowspan="2"><?php echo $msg->getRawValue()->getMessage() ?></td>  </tr>
         <tr><th>Fecha</th><td > <?php echo format_date($msg->getCreatedAt(), 'd') ?></td>
        
        </tr>
     
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <th>No hay mensajes para esta revisión.</th>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>

 

    <form id="msg-form" action="<?php echo url_for('revisions/revisionComment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <?php echo $form->renderHiddenFields() ?>
      <?php if (!$form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
      <?php endif; ?>

      <table class="orange">
      <caption><?php echo __('Add Message'); ?></caption>
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