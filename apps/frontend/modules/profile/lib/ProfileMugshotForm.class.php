<?php

/**
 * Profile form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileMugshotForm extends BaseProfileForm
{
  public function configure()
  {
    unset (
      $this['created_at'],
      $this['sf_guard_user_id'],
      $this['first_name'],
      $this['last_name'],
      $this['profsion_id'],
      $this['registration'],
      $this['birth_date'],
      $this['documment_type'],
      $this['documment'],
      $this['phone'],
      $this['movil'],
      $this['email'],
      $this['addres'],
      $this['country'],
      $this['created_at'],
      $this['updated_at'],
      $this['latitude'],
      $this['longitude'],
      $this['updated_at'],
      $this['sf_guard_user_id']
    );

    $this->getObject()->configureJCropWidgets($this);
    $this->getObject()->configureJCropValidators($this);
  }
}
