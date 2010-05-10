<?php

/**
 * UserProcedure filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserProcedureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'propietario' => 'propietario', 'calculo' => 'calculo', 'dt' => 'dt', 'ejecucion' => 'ejecucion', 'proyecto' => 'proyecto'))),
    ));

    $this->setValidators(array(
      'type'         => new sfValidatorChoice(array('required' => false, 'choices' => array('propietario' => 'propietario', 'calculo' => 'calculo', 'dt' => 'dt', 'ejecucion' => 'ejecucion', 'proyecto' => 'proyecto'))),
    ));

    $this->widgetSchema->setNameFormat('user_procedure_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProcedure';
  }

  public function getFields()
  {
    return array(
      'user_id'      => 'Number',
      'procedure_id' => 'Number',
      'type'         => 'Enum',
    );
  }
}
