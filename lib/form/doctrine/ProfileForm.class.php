<?php

/**
 * Profile form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{
  public function configure()
  {

    $range  = range(date('Y'), date('Y')-100);
    $years = array_combine($range,$range);

    $this->widgetSchema['birth_date'] = new sfWidgetFormDate(array(
      'years' => $years
    ));

    $this->validatorSchema['birth_date'] = new sfValidatorDate(array(
      'required' => 'true'
    ));
  }
}
