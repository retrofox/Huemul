<?php


class simpleUserForm extends sfGuardUserAdminForm {
  /**
   * @see sfForm
   */
  public function configure() {
    //parent::setup();
    unset(
            $this['last_login'],
            $this['created_at'],
            $this['updated_at'],
            $this['salt'],
            $this['algorithm'],
            $this['is_super_admin'],
            $this['is_active'],
            $this['permissions_list'],
            $this['procedures_list'],
            $this['procedures_list'],
            $this['groups_list']
    );

    //parent::configure();
    $profileForm = new ProfileForm($this->object->profile);
    unset($profileForm['id'], $profileForm['sf_guard_user_id']);
    $this->embedForm('profile', $profileForm);
   
  }

}