<?php

/**
 * users actions.
 *
 * @package    Huemul
 * @subpackage users
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends sfActions
{
  public function executeEdit(sfWebRequest $request)
  {
    $user_id = $this->getUser()->getGuardUser()->get('id');
    $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find($user_id), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new accountForm($sf_guard_user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new accountForm($sf_guard_user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sf_guard_user = $form->save();

      $this->redirect('users/edit?id='.$sf_guard_user->getId());
    }
  }
}
