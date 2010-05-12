<?php

/**
 * UserProcedure form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserProcedureForm extends BaseUserProcedureForm
{
  public function configure()
  {
   // parent::setup();


    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true, 'label'=>'Responsable')),
      'procedure_id' => new sfWidgetFormInputHidden(),
      'type'         => new sfWidgetFormChoice(array('choices' => array('propietario' => 'propietario', 'calculo' => 'calculo', 'director de obra' => 'director de obra', 'ejecutor' => 'ejecutor', 'proyecto' => 'proyecto'), 'label'=>'Relación con el trámite')),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorInteger(array('required' => true)),
      'procedure_id' => new sfValidatorInteger(array('required' => true)),
      'type'         => new sfValidatorChoice(array('choices' => array(0 => 'propietario', 1 => 'calculo', 2 => 'director de obra', 3 => 'ejecutor', 4 => 'proyecto'), 'required' => true)),
    ));

    $this->widgetSchema->setNameFormat('user_procedure[%s]');



    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();



  }
}
