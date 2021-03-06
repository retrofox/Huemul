<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('revisions/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<table class="orange">
  <caption><?php echo __('Edit Revision') ?></caption>
<?php else: ?>
<table class="orange">
  <caption><?php echo __('Add new revision') ?></caption>
<?php endif; ?>

    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          <input type="submit" value="<?php echo __('Save'); ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['file']->renderLabel() ?></th>
        <td>
          <?php echo $form['file']->renderError() ?>
          <?php echo $form['file'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
