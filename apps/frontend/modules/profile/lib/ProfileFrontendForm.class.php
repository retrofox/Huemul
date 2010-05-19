<?php

/**
 * Profile form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileFrontendForm extends BaseProfileForm
{
  public function configure()
  {
    unset (
      $this['created_at'],
      $this['updated_at'],
      $this['sf_guard_user_id'],
      $this['mugshot'],
      $this['mugshot_x1'],
      $this['mugshot_y1'],
      $this['mugshot_x2'],
      $this['mugshot_y2']
    );

    $range  = range(date('Y'), date('Y')-100);
    $years = array_combine($range,$range);

    $this->widgetSchema['birth_date'] = new sfWidgetFormDate(array(
      'format'=> '%day%/%month%/%year%',
      'years' => $years
    ));

    $this->validatorSchema['email'] = new sfValidatorEmail(
      array(
        'required' => true
        )
     );
  }
}
