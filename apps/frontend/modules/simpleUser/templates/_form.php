<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php use_helper('I18N') ?>

<form action="<?php echo url_for('simpleUser/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<table class="orange">
    <caption><?php echo __('User registration request edit') ?></caption>
<?php else: ?>
<table class="orange">
    <caption><?php echo __('User registration request') ?></caption>
<?php endif; ?>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <a href="<?php echo url_for('@homepage') ?>"><?php echo __('Cancel'); ?></a>
          <input type="submit" value="<?php echo __('Save') ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>

