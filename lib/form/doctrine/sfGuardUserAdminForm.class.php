<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    parent::configure();

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

    $profileForm = new ProfileForm($this->object->Profile);
    unset($profileForm['id'], $profileForm['sf_guard_user_id']);
    $this->embedForm('Profile', $profileForm);
  }
}
