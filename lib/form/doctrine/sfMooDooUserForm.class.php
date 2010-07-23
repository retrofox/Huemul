<?php

/**
 * sfMooDooUser form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfMooDooUserForm extends sfGuardUserAdminForm
{
  /**
   * @see sfGuardUserForm
   */
  public function configure()
  {

    $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardGroup',
      'multiple' => 'true',
      'expanded' => true
    ));

    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardPermission',
      'multiple' => 'true',
      'expanded' => true
    ));
    parent::configure();
  }
}
