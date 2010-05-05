<?php

/**
 * RevisionItem filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRevisionItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'revision_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Revision'), 'add_empty' => true)),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserController'), 'add_empty' => true)),
      'state'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'ok' => 'ok', 'error' => 'error', 'nc' => 'nc'))),
    ));

    $this->setValidators(array(
      'item_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'id')),
      'revision_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Revision'), 'column' => 'id')),
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UserController'), 'column' => 'id')),
      'state'       => new sfValidatorChoice(array('required' => false, 'choices' => array('ok' => 'ok', 'error' => 'error', 'nc' => 'nc'))),
    ));

    $this->widgetSchema->setNameFormat('revision_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RevisionItem';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'item_id'     => 'ForeignKey',
      'revision_id' => 'ForeignKey',
      'user_id'     => 'ForeignKey',
      'state'       => 'Enum',
    );
  }
}
