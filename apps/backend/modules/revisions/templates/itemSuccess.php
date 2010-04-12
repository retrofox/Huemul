<?php use_helper('I18N', 'Date') ?>
<?php
  use_stylesheet('mooDoo.2/generator.list.css');
  use_stylesheet('frontend/item.css');
?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>


<div class="sf_admin_list" id="item">

  <section class="col-left">

    <table>
      <thead>
        <tr>
          <th class="title" colspan="2"><?php echo __('Items detail'); ?></th>
        </tr>
      </thead>

      <tfoot>
        <tr>
          <th colspan="2">&nbsp;</th>
        </tr>
      </tfoot>

      <tbody>
        <tr>
          <td><?php echo __('State') ?></td>
          <td class="<?php echo $revItem->getState() ?>"><?php echo $revItem->getStateComplete() ?></td>
        </tr>
        <tr>
          <td><?php echo __('Revision') ?></td>
          <td>
            <strong><?php echo link_to($revItem->getRevision()->getNumber().' ('.__('go to revision').')', 'revisions/control?id='.$revItem->getRevisionId()) ?></strong>
          </td>
        </tr>
        <tr>
          <td><?php echo __('Procedure number') ?></td><td>
            <?php echo $revItem->getRevision()->getProcedure() ?>
          </td>
        </tr>

        <tr>
          <td><?php echo __('User') ?></td><td>
            <?php echo $revItem->getRevision()->getProcedure()->getCreator() ?>
          </td>
        </tr>

        <tr>
          <td><?php echo __('Controller') ?></td><td>
            <?php echo $revItem->getUserController() ?>
          </td>
        </tr>

      </tbody>
    </table>
  </section>

  <section class="col-right">
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




    <form id="msg-form" action="<?php echo url_for('revisions/comment'.($form->getObject()->isNew() ? 'Create' : 'Update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <?php echo $form->renderHiddenFields() ?>
      <?php if (!$form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
      <?php endif; ?>
      <section id="form-msg">
        <h2><?php echo __('Add message') ?></h2>


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


    </form>


  </section>

</div>