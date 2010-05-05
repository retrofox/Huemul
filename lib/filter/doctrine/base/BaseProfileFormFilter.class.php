<?php

/**
 * Profile filter form base class.
 *
 * @package    Huemul
 * @subpackage filter
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profesion_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profession'), 'add_empty' => true)),
      'registration'     => new sfWidgetFormFilterInput(),
      'birth_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'documment_type'   => new sfWidgetFormChoice(array('choices' => array('' => '', 'dni' => 'dni', 'le' => 'le'))),
      'documment'        => new sfWidgetFormFilterInput(),
      'phone'            => new sfWidgetFormFilterInput(),
      'movil'            => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'addres'           => new sfWidgetFormFilterInput(),
      'country'          => new sfWidgetFormFilterInput(),
      'mugshot'          => new sfWidgetFormFilterInput(),
      'mugshot_x1'       => new sfWidgetFormFilterInput(),
      'mugshot_y1'       => new sfWidgetFormFilterInput(),
      'mugshot_x2'       => new sfWidgetFormFilterInput(),
      'mugshot_y2'       => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'latitude'         => new sfWidgetFormFilterInput(),
      'longitude'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'first_name'       => new sfValidatorPass(array('required' => false)),
      'last_name'        => new sfValidatorPass(array('required' => false)),
      'profesion_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Profession'), 'column' => 'id')),
      'registration'     => new sfValidatorPass(array('required' => false)),
      'birth_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'documment_type'   => new sfValidatorChoice(array('required' => false, 'choices' => array('dni' => 'dni', 'le' => 'le'))),
      'documment'        => new sfValidatorPass(array('required' => false)),
      'phone'            => new sfValidatorPass(array('required' => false)),
      'movil'            => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'addres'           => new sfValidatorPass(array('required' => false)),
      'country'          => new sfValidatorPass(array('required' => false)),
      'mugshot'          => new sfValidatorPass(array('required' => false)),
      'mugshot_x1'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mugshot_y1'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mugshot_x2'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mugshot_y2'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'latitude'         => new sfValidatorPass(array('required' => false)),
      'longitude'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sf_guard_user_id' => 'ForeignKey',
      'first_name'       => 'Text',
      'last_name'        => 'Text',
      'profesion_id'     => 'ForeignKey',
      'registration'     => 'Text',
      'birth_date'       => 'Date',
      'documment_type'   => 'Enum',
      'documment'        => 'Text',
      'phone'            => 'Text',
      'movil'            => 'Text',
      'email'            => 'Text',
      'addres'           => 'Text',
      'country'          => 'Text',
      'mugshot'          => 'Text',
      'mugshot_x1'       => 'Number',
      'mugshot_y1'       => 'Number',
      'mugshot_x2'       => 'Number',
      'mugshot_y2'       => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'latitude'         => 'Text',
      'longitude'        => 'Text',
    );
  }
}
