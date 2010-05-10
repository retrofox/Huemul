<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('simpleUser/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('simpleUser/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'simpleUser/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['username']->renderLabel() ?></th>
        <td>
          <?php echo $form['username']->renderError() ?>
          <?php echo $form['username'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['algorithm']->renderLabel() ?></th>
        <td>
          <?php echo $form['algorithm']->renderError() ?>
          <?php echo $form['algorithm'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['salt']->renderLabel() ?></th>
        <td>
          <?php echo $form['salt']->renderError() ?>
          <?php echo $form['salt'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['password']->renderLabel() ?></th>
        <td>
          <?php echo $form['password']->renderError() ?>
          <?php echo $form['password'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_super_admin']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_super_admin']->renderError() ?>
          <?php echo $form['is_super_admin'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_login']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_login']->renderError() ?>
          <?php echo $form['last_login'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['groups_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['groups_list']->renderError() ?>
          <?php echo $form['groups_list'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['permissions_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['permissions_list']->renderError() ?>
          <?php echo $form['permissions_list'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['procedures_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['procedures_list']->renderError() ?>
          <?php echo $form['procedures_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
