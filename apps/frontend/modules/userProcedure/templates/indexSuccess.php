<?php use_helper('I18N') ?>
<?php slot('sidebar') ?>
<nav>
  <h2><?php echo __('OPTIONS') ?></h2>
  <ul>
    <li><?php echo link_to(__('Add new procedure'), 'procedures/new') ?></li>
    <li><?php echo link_to(__('Procedures List'), 'procedures/index') ?></li>

    <li><?php echo link_to(__('Procedure detail'), 'procedures/show?procedure_id='.$procedure->getId());  ?></li>
  </ul>
</nav>
<?php include_partial('procedures/procedure', array('procedure' => $procedure)) ?>
<?php end_slot(); ?>

<table class="orange">
  <caption><?php echo __('Procedure responsible list') ?></caption>
  <thead>
    <tr>
      <th><?php echo __('Responsible') ?></th>
      <th><?php echo __('Address') ?></th>
      <th><?php echo __('Registration') ?></th>
      <th><?php echo __('Relation') ?></th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($user_procedures as $user_procedure): ?>
    <tr>
      <td><?php echo $user_procedure->getSfGuardUser()  ?></td>
      <td><?php echo $user_procedure->getSfGuardUser()->getProfile()->getAddres()  ?></td>
      <td><?php echo $user_procedure->getSfGuardUser()->getProfile()->getRegistration()  ?></td>
      <td><?php if ($user_procedure->getType() == '') echo "Responsable principal"; else echo $user_procedure->getType() ?></td>
      <td>
              <?php if ($user_procedure->getType() == '')
                      echo '&mdash;';
                    else
                      echo link_to(__('delete'), 'userProcedure/delete?procedure_id='.$user_procedure->getProcedureId().'&user_id='.$user_procedure->getUserId().'&type='.$user_procedure->getType(), array('class'=>'delete') );
                  ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('form', array('form' => $form)) ?>
