<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'group_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Group'), 'add_empty' => true)),
      'title'          => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'formus_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Formu')),
      'revisions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Revision')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'group_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Group'), 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 100)),
      'description'    => new sfValidatorString(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'formus_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Formu', 'required' => false)),
      'revisions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Revision', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['formus_list']))
    {
      $this->setDefault('formus_list', $this->object->Formus->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['revisions_list']))
    {
      $this->setDefault('revisions_list', $this->object->Revisions->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFormusList($con);
    $this->saveRevisionsList($con);

    parent::doSave($con);
  }

  public function saveFormusList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['formus_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Formus->getPrimaryKeys();
    $values = $this->getValue('formus_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Formus', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Formus', array_values($link));
    }
  }

  public function saveRevisionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['revisions_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Revisions->getPrimaryKeys();
    $values = $this->getValue('revisions_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Revisions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Revisions', array_values($link));
    }
  }

}
