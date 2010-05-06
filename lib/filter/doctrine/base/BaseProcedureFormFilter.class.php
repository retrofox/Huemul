<?php

/**
 * Procedure filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProcedureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cadastral_data_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CadastralData'), 'add_empty' => true)),
      'formu_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Formu'), 'add_empty' => true)),
      'dossier'           => new sfWidgetFormFilterInput(),
      'is_finished'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'revisions_count'   => new sfWidgetFormFilterInput(),
      'owner'             => new sfWidgetFormFilterInput(),
      'address'           => new sfWidgetFormFilterInput(),
      'neighborhood'      => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'users_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'cadastral_data_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CadastralData'), 'column' => 'id')),
      'formu_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Formu'), 'column' => 'id')),
      'dossier'           => new sfValidatorPass(array('required' => false)),
      'is_finished'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'revisions_count'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'owner'             => new sfValidatorPass(array('required' => false)),
      'address'           => new sfValidatorPass(array('required' => false)),
      'neighborhood'      => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'users_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('procedure_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addUsersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.UserProcedure UserProcedure')
          ->andWhereIn('UserProcedure.user_id', $values);
  }

  public function getModelName()
  {
    return 'Procedure';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'cadastral_data_id' => 'ForeignKey',
      'formu_id'          => 'ForeignKey',
      'dossier'           => 'Text',
      'is_finished'       => 'Boolean',
      'revisions_count'   => 'Number',
      'owner'             => 'Text',
      'address'           => 'Text',
      'neighborhood'      => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'users_list'        => 'ManyKey',
    );
  }
}
