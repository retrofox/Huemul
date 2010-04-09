<?php

/**
 * Profile form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm {
  public function configure() {

    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['latitude'],
      $this['longitude'],
      $this['mugshot'],
      $this['mugshot_x1'],
      $this['mugshot_y1'],
      $this['mugshot_x2'],
      $this['mugshot_y2']
    );

    //$this->getObject()->configureJCropWidgets($this);
    //$this->getObject()->configureJCropValidators($this);
  }
}
