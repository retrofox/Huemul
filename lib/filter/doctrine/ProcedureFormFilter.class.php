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
    $this->disableLocalCSRFProtection();

    $this->setWidget('pendientes', new sfWidgetFormInputCheckbox());
    $this->setValidator('pendientes', new sfValidatorString(array('required' => false)));

    $this->setWidget('creator', new sfWidgetFormFilterInput(array('with_empty' => false)));
    $this->setValidator('creator', new sfValidatorPass(array('required' => false)));

    $this->setWidget('state', new sfWidgetFormDoctrineChoice(array('model' => 'RevisionState', 'add_empty' => true)));
    $this->setValidator('state', new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'RevisionState', 'column' => 'id')));

    $this->setWidget('created_at', new sfWidgetFormFilterDate(array(
            'from_date' => new sfWidgetFormDate(array( 'format'=> '%day%/%month%/%year%')),
            'to_date' => new sfWidgetFormDate(array( 'format'=> '%day%/%month%/%year%')),
            'with_empty' => false,
            'template' => 'desde %from_date%<br />hasta %to_date%')));

    $this->setWidget('updated_at', new sfWidgetFormFilterDate(array(
            'from_date' => new sfWidgetFormDate(array( 'format'=> '%day%/%month%/%year%')),
            'to_date' => new sfWidgetFormDate(array( 'format'=> '%day%/%month%/%year%')),
            'with_empty' => false,
            'template' => 'desde %from_date%<br />hasta %to_date%')));
  }

   public function getFields()
  {
    $fields = parent::getFields();
    $fields['creator'] = 'custom';
    $fields['state'] = 'custom';
    $fields['pendientes'] = 'custom';
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
       $query->leftJoin($query->getRootAlias().'.Revisions rv')->andWhere('(
         rv.revision_state_id LIKE ?
         AND rv.id = (SELECT MAX(rv2.id) FROM revision rv2 WHERE rv2.procedure_id = '.$query->getRootAlias().'.id )
      )', array("%$text%"));
    return $query;
  }

public function addPendientesColumnQuery($query, $field, $value)
  {
    $single = sfContext::getInstance();
    $user = $single->getUser()->getGroups();
    $sql = "";
    foreach ($user as $u) $sql .= ' OR "'.$u.'"';
      
   /*   echo '<p>$user: <b>'.$sql.'</b></p>';
    die();*/


    $text = $value['text'];
    if($text){
      $query->leftJoin($query->getRootAlias().'.Revisions rv')->andWhere('(
         rv.revision_state_id <> ?
         AND rv.id = (SELECT MAX(rv2.id) FROM revision rv2 WHERE rv2.procedure_id = '.$query->getRootAlias().'.id )
      )', array(4));
    }
    return $query;
  }
}