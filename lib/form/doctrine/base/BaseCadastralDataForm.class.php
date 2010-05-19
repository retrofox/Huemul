<?php

/**
 * CadastralData form base class.
 *
 * @method CadastralData getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCadastralDataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'circunscripcion' => new sfWidgetFormInputText(),
      'seccion'         => new sfWidgetFormInputText(),
      'tipo'            => new sfWidgetFormChoice(array('choices' => array('manzana' => 'manzana', 'quinta' => 'quinta', 'chacra' => 'chacra'))),
      'tipo_numero'     => new sfWidgetFormInputText(),
      'partida_nro'     => new sfWidgetFormInputText(),
      'parcela'         => new sfWidgetFormInputText(),
      'uf'              => new sfWidgetFormInputText(),
      'address'         => new sfWidgetFormInputText(),
      'neighborhood'    => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'circunscripcion' => new sfValidatorString(array('max_length' => 10)),
      'seccion'         => new sfValidatorString(array('max_length' => 10)),
      'tipo'            => new sfValidatorChoice(array('choices' => array(0 => 'manzana', 1 => 'quinta', 2 => 'chacra'))),
      'tipo_numero'     => new sfValidatorString(array('max_length' => 10)),
      'partida_nro'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'parcela'         => new sfValidatorString(array('max_length' => 10)),
      'uf'              => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'address'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'neighborhood'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cadastral_data[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CadastralData';
  }

}
