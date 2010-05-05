<?php

/**
 * ComunicationItem form base class.
 *
 * @method ComunicationItem getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComunicationItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'revision_item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RevisionItem'), 'add_empty' => true)),
      'author_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'subject'          => new sfWidgetFormInputText(),
      'message'          => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'revision_item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RevisionItem'), 'required' => false)),
      'author_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'required' => false)),
      'subject'          => new sfValidatorString(array('max_length' => 255)),
      'message'          => new sfValidatorString(),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('comunication_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComunicationItem';
  }

}
