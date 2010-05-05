<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'       => new sfWidgetFormInputText(),
      'last_name'        => new sfWidgetFormInputText(),
      'profesion_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profession'), 'add_empty' => true)),
      'registration'     => new sfWidgetFormInputText(),
      'birth_date'       => new sfWidgetFormDate(),
      'documment_type'   => new sfWidgetFormChoice(array('choices' => array('dni' => 'dni', 'le' => 'le'))),
      'documment'        => new sfWidgetFormInputText(),
      'phone'            => new sfWidgetFormInputText(),
      'movil'            => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'addres'           => new sfWidgetFormInputText(),
      'country'          => new sfWidgetFormInputText(),
      'mugshot'          => new sfWidgetFormInputText(),
      'mugshot_x1'       => new sfWidgetFormInputText(),
      'mugshot_y1'       => new sfWidgetFormInputText(),
      'mugshot_x2'       => new sfWidgetFormInputText(),
      'mugshot_y2'       => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'latitude'         => new sfWidgetFormInputText(),
      'longitude'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'first_name'       => new sfValidatorString(array('max_length' => 100)),
      'last_name'        => new sfValidatorString(array('max_length' => 100)),
      'profesion_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profession'), 'required' => false)),
      'registration'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'birth_date'       => new sfValidatorDate(array('required' => false)),
      'documment_type'   => new sfValidatorChoice(array('choices' => array(0 => 'dni', 1 => 'le'), 'required' => false)),
      'documment'        => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'phone'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'movil'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'addres'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'country'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mugshot'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mugshot_x1'       => new sfValidatorInteger(array('required' => false)),
      'mugshot_y1'       => new sfValidatorInteger(array('required' => false)),
      'mugshot_x2'       => new sfValidatorInteger(array('required' => false)),
      'mugshot_y2'       => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'latitude'         => new sfValidatorPass(array('required' => false)),
      'longitude'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
