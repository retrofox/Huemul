<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('frontend/item.css'); ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>



<?php slot('sidebar') ?>
<hr />

<section class="menu_sidebar">
  <?php include_partial('procedures/procedure', array('procedure' => $revItem->getRevision()->getProcedure())) ?>
  <nav>
    <ul>
      <li><h2><?php echo __('OPTIONS'); ?></h2></li>
      <li><?php echo link_to(__('Show revision'), 'revisions/showRevision?id='.$revItem->getRevisionId()) ?></li>
      <li><?php echo link_to(__('Show revisions'), 'procedures/show?procedure_id='.$revItem->getRevision()->getProcedureId()) ?></li>
      <li><?php echo link_to(__('Add new revision'), 'revisions/new?procedure_id='.$revItem->getRevision()->getProcedureId()) ?></li>
    </ul>
  </nav>
</section>

<?php end_slot(); ?>

<div class="sf_admin_list" id="item">

  <section class="col-left">

    <table class="orange">
      <thead>
        <tr>
          <th class="title" colspan="2"><?php echo __('Items detail'); ?></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo __('State') ?></td>
          <td class="<?php echo $revItem->getState() ?>"><?php echo $revItem->getStateComplete() ?></td>
        </tr>
        <tr>
          <td><?php echo __('Revision') ?></td>
          <td>
            <?php echo link_to($revItem->getRevision()->getNumber(), 'revisions/showRevision?id='.$revItem->getRevisionId()) ?>
          </td>
        </tr>
        <tr>
          <td><?php echo __('Procedure') ?></td><td>
            <?php echo link_to($revItem->getRevision()->getProcedure(), 'procedures/show?procedure_id='.$revItem->getRevision()->getProcedureId()) ?>
          </td>
        </tr>

      </tbody>
    </table>
  </section>

  <section class="col-right">
    <?php $count_msg = $revItem->getComunication()->count() ?>

    <table class="orange">
      <thead>
        <tr>
          <th class="title"><?php echo $revItem->getItem() ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $revItem->getItem()->getDescription() ?></td>
        </tr>
      </tbody>
    </table>

    <table class="orange">
      <thead>
        <tr>
          <th colspan="2"><?php echo __('Messages') ?></th>
        </tr>
      </thead>

      <?php if($count_msg>0) : ?>
      <tfoot>
        <tr>
          <th colspan="2"><?php echo $count_msg ?> <?php echo __('Messages') ?></th>
        </tr>
      </tfoot>
      <?php endif; ?>

      <tbody class="comments">
        <?php if($count_msg > 0 ) : ?>
          <?php foreach ($revItem->getComunication() as $msg) : ?>
        <tr>
          <td>
            <h3><?php echo $msg ?></h3>&nbsp;<h4> por <?php echo $msg->getAuthor() ?></h4>
            <p class="comment-date"><?php echo format_date($msg->getCreatedAt(), 'f') ?></p>
            <div class="comment"><?php echo $msg->getRawValue()->getMessage() ?></div>
          </td>
        </tr>
          <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td colspan="2"><?php echo __('No messages') ?></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>

  <form id="msg-form" action="<?php echo url_for('revisions/comment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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