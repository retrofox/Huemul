<?php

/**
 * Procedure filter form.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProcedureFormFilter extends BaseProcedureFormFilter
{
  public function configure()
  {

    $this->setWidget('creator', new sfWidgetFormFilterInput(array('with_empty' => false)));

    $this->setValidator('creator', new sfValidatorPass(array('required' => false)));

    $this->setWidget('state', new sfWidgetFormDoctrineChoice(array('model' => 'RevisionState', 'add_empty' => true)));
    $this->setValidator('state', new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'RevisionState', 'column' => 'id')));
  }

   public function getFields()
  {
    $fields = parent::getFields();
    $fields['creator'] = 'custom';
    $fields['state'] = 'custom';
    return $fields;
  }

  public function addCreatorColumnQuery($query, $field, $value)
  {
    $text = $value['text'];
    $sql ="";
    if($text){
      $texts = explode(' ', $text);
      foreach ($texts as $t){
       $sql = "";
      }
      $query->leftJoin($query->getRootAlias().'.Users u')->leftJoin('u.profile p ON u.id = p.sf_guard_user_id')->andWhere('(
         p.first_name LIKE ?
      OR p.last_name LIKE ?
      OR u.username LIKE ?
      OR CONCAT(p.first_name, " ", p.last_name) LIKE ?
      )', array("%$text%", "%$text%", "%$text%", "%$text%"));
   
    }
    return $query;
  }
  public function addStateColumnQuery($query, $field, $value)
  {
    //SELECT * FROM _procedure p JOIN (SELECT max(number), revision_state_id, procedure_id FROM revision) j ON j.procedure_id = p.id where j.revision_state_id=1
    $text = $value['text'];
    if($text)
      $query->addSelect('(SELECT revision_state_id,  max(number) FROM revision) j WHERE j.procedure_id = _procedure.id) as rv')->andWhere(
              '(rv.revision_state_id= ?
      )', array("%$text%"));
    return $query;
  }
}
