<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('userProcedure/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?user_id='.$form->getObject()->getUserId().'&procedure_id='.$form->getObject()->getProcedureId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
  <table class ="orange">
    <caption><?php echo __('Edit responsible') ?></caption>
 <?php else: ?>
  <table class ="orange">
    <caption><?php echo __('Add responsible') ?></caption>
  <?php endif; ?>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
           <input type="submit" value="<?php echo __('Add') ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>

    </tbody>
  </table>
</form>
