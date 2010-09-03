<td class="object_actions">
         <?php if ($user_procedure->getType() == '')
                      echo '&mdash;';
                    else
                      echo link_to(__('delete'), 'userProcedure/delete?procedure_id='.$user_procedure->getProcedureId().'&user_id='.$user_procedure->getUserId().'&type='.$user_procedure->getType(), array('class'=>'delete') );
                  ?>
</td>
