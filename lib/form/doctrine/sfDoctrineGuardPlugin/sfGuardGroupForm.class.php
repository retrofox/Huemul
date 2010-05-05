<?php

/**
 * sfGuardGroup form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupForm extends PluginsfGuardGroupForm {
  public function configure() {
    $this->widgetSchema['users_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardUser',
      'multiple' => 'true',
      'expanded' => true
    ));

    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardPermission',
      'multiple' => 'true',
      'expanded' => true
    ));
  }
}
