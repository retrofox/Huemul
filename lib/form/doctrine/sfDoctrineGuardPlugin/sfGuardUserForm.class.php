<?php

/**
 * sfGuardUser form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardPermission',
      'multiple' => 'true',
      'expanded' => true
    ));
  }
}
