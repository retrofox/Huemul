<?php use_helper('I18N', 'Date') ?>
<?php
  use_stylesheet('/sfDoctrineMooDooPlugin/css/generator.list.css');
  use_stylesheet('frontend/item.css');
?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>



<?php slot('sidebar') ?>
  <nav>
      <h2><?php echo __('Options'); ?></h2>

      <ul>
        <li><?php echo link_to(__('go to procedure'), 'procedures/show?id='.$revItem->getRevision()->getProcedureId()) ?></li>
        <li><?php echo link_to(__('go to revision'), 'revisions/control?id='.$revItem->getRevisionId()) ?></li>
      </ul>
  </nav>
  <table>
    <caption><?php echo __('Items detail'); ?></caption>
    <tbody>
      <tr>
        <th><?php echo __('Item') ?></th>
        <td><?php echo $revItem->getItem() ?></td>
      </tr>
      <tr>
        <th><?php echo __('State') ?></th>
        <td class="<?php echo $revItem->getState() ?>"><?php echo $revItem->getStateComplete() ?></td>
      </tr>
      <tr>
        <th><?php echo __('Controller') ?></th>
        <td>
          <?php echo $revItem->getUserController() ?>
        </td>
      </tr>
    </tbody>
  </table>
  <?php include_partial('revisions/revision', array('revision' => $revItem->getRevision())) ?>
  <?php include_partial('procedures/procedure', array('procedure' => $revItem->getRevision()->getProcedure())) ?>
<?php end_slot(); ?>
  <div class="sf_admin_list" id="item">
    <h1><?php echo __('Item Messages') ?></h1>
    <?php $count_msg = $revItem->getComunication()->count() ?>
    <table>
      <thead>
        <tr>
          <th class="title" colspan="2"><?php echo $revItem->getItem() ?></th>
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

    <br>

  <form id="msg-form" action="<?php echo url_for('revisions/comment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php echo $form->renderHiddenFields() ?>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>


    <table>
      <caption><?php echo __('Add message') ?></caption>
      <tbody>
        <tr>
          <th>Asunto</th>
          <td><?php echo $form['subject']->renderError() ?>
            <?php echo $form['subject'] ?></td>
        </tr>

        <tr>
          <th>Mensaje</th>
          <td><?php echo $form['message']->renderError() ?>
            <?php echo $form['message'] ?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr><td colspan="2"> <input type="submit" value="<?php echo __('Save'); ?>" /></td></tr>
      </tfoot>
    </table>

    </form>

  </section>

</div>