<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('profile/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th><?php echo __($form['first_name']->renderLabel()) ?></th>
        <td>
          <?php echo $form['first_name']->renderError() ?>
          <?php echo $form['first_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['last_name']->renderLabel()) ?></th>
        <td>
          <?php echo $form['last_name']->renderError() ?>
          <?php echo $form['last_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['profesion_id']->renderLabel()) ?></th>
        <td>
          <?php echo $form['profesion_id']->renderError() ?>
          <?php echo $form['profesion_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['birth_date']->renderLabel()) ?></th>
        <td>
          <?php echo $form['birth_date']->renderError() ?>
          <?php echo $form['birth_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['documment_type']->renderLabel()) ?></th>
        <td>
          <?php echo $form['documment_type']->renderError() ?>
          <?php echo $form['documment_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['documment']->renderLabel()) ?></th>
        <td>
          <?php echo $form['documment']->renderError() ?>
          <?php echo $form['documment'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['phone']->renderLabel()) ?></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['movil']->renderLabel()) ?></th>
        <td>
          <?php echo $form['movil']->renderError() ?>
          <?php echo $form['movil'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['email']->renderLabel()) ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['addres']->renderLabel()) ?></th>
        <td>
          <?php echo $form['addres']->renderError() ?>
          <?php echo $form['addres'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['country']->renderLabel()) ?></th>
        <td>
          <?php echo $form['country']->renderError() ?>
          <?php echo $form['country'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo __($form['mugshot']->renderLabel()) ?></th>
        <td>
          <?php echo $form['mugshot']->renderError() ?>
          <?php echo $form['mugshot'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>