<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php use_helper('I18N') ?>

<form action="<?php echo url_for('procedures/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<table class="orange">
    <caption><?php echo __('Edit Procedure') ?></caption>
<?php else: ?>
<table class="orange">
    <caption><?php echo __('New Procedure') ?></caption>
<?php endif; ?>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <a href="<?php echo url_for('procedures/index') ?>"><?php echo __('Cancel'); ?></a>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>