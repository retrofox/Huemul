<?php

/**
 * sfGuardPermission form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionForm extends PluginsfGuardPermissionForm
{
  public function configure()
  {
    $this->widgetSchema['users_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardUser',
      'multiple' => 'true',
      'expanded' => true
    ));

    $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardGroup',
      'multiple' => 'true',
      'expanded' => true
    ));
  }
}
