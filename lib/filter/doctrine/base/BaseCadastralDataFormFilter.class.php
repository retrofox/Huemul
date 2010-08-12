<?php

/**
 * CadastralData filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCadastralDataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'circunscripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'seccion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'manzana' => 'manzana', 'quinta' => 'quinta', 'chacra' => 'chacra'))),
      'tipo_numero'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'partida_nro'     => new sfWidgetFormFilterInput(),
      'parcela'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uf'              => new sfWidgetFormFilterInput(),
      'address'         => new sfWidgetFormFilterInput(),
      'neighborhood'    => new sfWidgetFormFilterInput(),
      'address_number'  => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'circunscripcion' => new sfValidatorPass(array('required' => false)),
      'seccion'         => new sfValidatorPass(array('required' => false)),
      'tipo'            => new sfValidatorChoice(array('required' => false, 'choices' => array('manzana' => 'manzana', 'quinta' => 'quinta', 'chacra' => 'chacra'))),
      'tipo_numero'     => new sfValidatorPass(array('required' => false)),
      'partida_nro'     => new sfValidatorPass(array('required' => false)),
      'parcela'         => new sfValidatorPass(array('required' => false)),
      'uf'              => new sfValidatorPass(array('required' => false)),
      'address'         => new sfValidatorPass(array('required' => false)),
      'neighborhood'    => new sfValidatorPass(array('required' => false)),
      'address_number'  => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cadastral_data_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CadastralData';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'circunscripcion' => 'Text',
      'seccion'         => 'Text',
      'tipo'            => 'Enum',
      'tipo_numero'     => 'Text',
      'partida_nro'     => 'Text',
      'parcela'         => 'Text',
      'uf'              => 'Text',
      'address'         => 'Text',
      'neighborhood'    => 'Text',
      'address_number'  => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
