<?php

/**
 * Revision filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRevisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'number'            => new sfWidgetFormFilterInput(),
      'parent_id'         => new sfWidgetFormFilterInput(),
      'procedure_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Procedure'), 'add_empty' => true)),
      'revision_state_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('State'), 'add_empty' => true)),
      'creator_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'block'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'description'       => new sfWidgetFormFilterInput(),
      'file'              => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'items_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
    ));

    $this->setValidators(array(
      'number'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'procedure_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Procedure'), 'column' => 'id')),
      'revision_state_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('State'), 'column' => 'id')),
      'creator_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'block'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'description'       => new sfValidatorPass(array('required' => false)),
      'file'              => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'items_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('revision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addItemsListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('RevisionItem.item_id', $values);
  }

  public function getModelName()
  {
    return 'Revision';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'number'            => 'Number',
      'parent_id'         => 'Number',
      'procedure_id'      => 'ForeignKey',
      'revision_state_id' => 'ForeignKey',
      'creator_id'        => 'ForeignKey',
      'block'             => 'Boolean',
      'description'       => 'Text',
      'file'              => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'items_list'        => 'ManyKey',
    );
  }
}
