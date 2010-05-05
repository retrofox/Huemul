<?php

/**
 * RevisionItem form base class.
 *
 * @method RevisionItem getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRevisionItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'item_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'revision_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Revision'), 'add_empty' => true)),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserController'), 'add_empty' => true)),
      'state'       => new sfWidgetFormChoice(array('choices' => array('ok' => 'ok', 'error' => 'error', 'nc' => 'nc'))),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'item_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'required' => false)),
      'revision_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Revision'), 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserController'), 'required' => false)),
      'state'       => new sfValidatorChoice(array('choices' => array(0 => 'ok', 1 => 'error', 2 => 'nc'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'RevisionItem', 'column' => array('item_id', 'revision_id')))
    );

    $this->widgetSchema->setNameFormat('revision_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RevisionItem';
  }

}
