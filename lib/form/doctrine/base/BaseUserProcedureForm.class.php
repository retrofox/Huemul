<?php

/**
 * UserProcedure form base class.
 *
 * @method UserProcedure getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserProcedureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormInputHidden(),
      'procedure_id' => new sfWidgetFormInputHidden(),
      'type'         => new sfWidgetFormChoice(array('choices' => array('propietario' => 'propietario', 'calculo' => 'calculo', 'dt' => 'dt', 'ejecucion' => 'ejecucion', 'proyecto' => 'proyecto'))),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'user_id', 'required' => false)),
      'procedure_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'procedure_id', 'required' => false)),
      'type'         => new sfValidatorChoice(array('choices' => array(0 => 'propietario', 1 => 'calculo', 2 => 'dt', 3 => 'ejecucion', 4 => 'proyecto'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_procedure[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProcedure';
  }

}
