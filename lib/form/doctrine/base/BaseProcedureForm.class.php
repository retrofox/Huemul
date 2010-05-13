<?php

/**
 * Procedure form base class.
 *
 * @method Procedure getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProcedureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'cadastral_data_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CadastralData'), 'add_empty' => true)),
      'formu_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Formu'), 'add_empty' => true)),
      'dossier'           => new sfWidgetFormInputText(),
      'is_finished'       => new sfWidgetFormInputCheckbox(),
      'revisions_count'   => new sfWidgetFormInputText(),
      'owner'             => new sfWidgetFormInputText(),
      'address'           => new sfWidgetFormInputText(),
      'neighborhood'      => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'users_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'cadastral_data_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CadastralData'), 'required' => false)),
      'formu_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Formu'), 'required' => false)),
      'dossier'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_finished'       => new sfValidatorBoolean(array('required' => false)),
      'revisions_count'   => new sfValidatorInteger(array('required' => false)),
      'owner'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'neighborhood'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'users_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('procedure[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Procedure';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['users_list']))
    {
      $this->setDefault('users_list', $this->object->Users->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveUsersList($con);

    parent::doSave($con);
  }

  public function saveUsersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['users_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Users->getPrimaryKeys();
    $values = $this->getValue('users_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Users', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Users', array_values($link));
    }
  }

}
