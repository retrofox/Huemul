<?php

/**
 * Revision form base class.
 *
 * @method Revision getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRevisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'number'            => new sfWidgetFormInputText(),
      'parent_id'         => new sfWidgetFormInputText(),
      'procedure_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Procedure'), 'add_empty' => true)),
      'revision_state_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('State'), 'add_empty' => true)),
      'creator_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'block'             => new sfWidgetFormInputCheckbox(),
      'description'       => new sfWidgetFormTextarea(),
      'file'              => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'items_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'number'            => new sfValidatorInteger(array('required' => false)),
      'parent_id'         => new sfValidatorInteger(array('required' => false)),
      'procedure_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Procedure'), 'required' => false)),
      'revision_state_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('State'), 'required' => false)),
      'creator_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'block'             => new sfValidatorBoolean(array('required' => false)),
      'description'       => new sfValidatorString(array('required' => false)),
      'file'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'items_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('revision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Revision';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['items_list']))
    {
      $this->setDefault('items_list', $this->object->Items->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveItemsList($con);

    parent::doSave($con);
  }

  public function saveItemsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['items_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Items->getPrimaryKeys();
    $values = $this->getValue('items_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Items', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Items', array_values($link));
    }
  }

}
