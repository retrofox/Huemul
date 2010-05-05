<?php

/**
 * Item filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'group_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Group'), 'add_empty' => true)),
      'title'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'formus_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Formu')),
      'revisions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Revision')),
      'revision_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Revision')),
    ));

    $this->setValidators(array(
      'group_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Group'), 'column' => 'id')),
      'title'          => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'formus_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Formu', 'required' => false)),
      'revisions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Revision', 'required' => false)),
      'revision_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Revision', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addFormusListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.ItemFormu ItemFormu')
          ->andWhereIn('ItemFormu.form_id', $values);
  }

  public function addRevisionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.RevisionItem RevisionItem')
          ->andWhereIn('RevisionItem.revission_id', $values);
  }

  public function addRevisionListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.RevisionItem RevisionItem')
          ->andWhereIn('RevisionItem.revision_id', $values);
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'group_id'       => 'ForeignKey',
      'title'          => 'Text',
      'description'    => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'formus_list'    => 'ManyKey',
      'revisions_list' => 'ManyKey',
      'revision_list'  => 'ManyKey',
    );
  }
}
