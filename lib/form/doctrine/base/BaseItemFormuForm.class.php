<?php

/**
 * ItemFormu form base class.
 *
 * @method ItemFormu getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseItemFormuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'form_id' => new sfWidgetFormInputHidden(),
      'item_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'form_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'form_id', 'required' => false)),
      'item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'item_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_formu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ItemFormu';
  }

}
