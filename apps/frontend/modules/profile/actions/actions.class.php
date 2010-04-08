<?php

/**
 * profile actions.
 *
 * @package    Huemul
 * @subpackage profile
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions
{
  public function executeEdit(sfWebRequest $request)
  {
    //$user_id = $this->getUser()->getGuardUser()->getProfile()->getId();
    $user_id = $this->getUser()->getGuardUser()->getId();
    $this->forward404Unless($profile = Doctrine::getTable('Profile')->find(array($user_id)), sprintf('Object profile does not exist (%s).', $user_id));
    $this->form = new ProfileForm($profile);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($profile = Doctrine::getTable('Profile')->find(array($request->getParameter('id'))), sprintf('Object profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProfileForm($profile);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $profile = $form->save();

      $this->redirect('profile/edit?id='.$profile->getId());
    }
  }
}