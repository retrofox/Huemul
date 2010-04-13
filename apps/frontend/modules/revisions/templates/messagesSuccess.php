<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('frontend/item.css'); ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>



<?php slot('sidebar') ?>
<hr />

<section class="menu_sidebar">
  <?php include_partial('procedures/procedure', array('procedure' => $revision->getProcedure())) ?>
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS'); ?></h2></li>
      <li><?php echo link_to(__('Show revisions'), 'procedures/show?procedure_id='.$revision->getProcedureId()) ?></li>
    </ul>
  </nav>
</section>

<?php end_slot(); ?>

<div class="sf_admin_list" id="item">

    <table class="orange">
      <thead>
        <tr>
          <th class="title" colspan="2"><?php echo __('Messages'); ?></th>
        </tr>
      </thead>

      <tbody>
        <?php if($revision->getComunication()->count() > 0) : ?>
        <?php foreach ($revision->getComunication() as $msg) : ?>
        <tr>
          <td>
            <strong><?php echo $msg ?></strong> |
            <?php echo $msg->getAuthor() ?> |
            <?php echo format_date($msg->getCreatedAt(), 'd') ?>
            <br />
            <?php echo $msg->getRawValue()->getMessage() ?>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td>No hay mensajes para esta revisión.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>


  <form id="msg-form" action="<?php echo url_for('revisions/revisionComment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php echo $form->renderHiddenFields() ?>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <section id="form-msg">
      <h2><?php echo __('Add message') ?></h2>
      <section class="msg-container">

        <div>
          <h3>Asunto</h3>
          <?php echo $form['subject']->renderError() ?>
          <?php echo $form['subject'] ?>
        </div>

        <div>
          <h3>Mensaje</h3>
          <?php echo $form['message']->renderError() ?>
          <?php echo $form['message'] ?>
        </div>

        <br />
        <input type="submit" value="<?php echo __('Save'); ?>" />
      </section>

    </section>

  </form>
</div>