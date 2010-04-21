<?php

/**
 * procedures actions.
 *
 * @package    Huemul
 * @subpackage procedures
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proceduresActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setCulture('es');

    $user_id = $this->getUser()->getGuardUser()->get('id');

    $q = Doctrine_Query::create()
      ->from('Procedure p')
      ->leftJoin('p.UserProcedure up')
      ->where('up.user_id = ?', $user_id);

     $this->procedures = $q->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProcedureFullForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProcedureFullForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($procedure = Doctrine::getTable('Procedure')->find(array($request->getParameter('id'))), sprintf('Object procedure does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProcedureFullForm($procedure);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($procedure = Doctrine::getTable('Procedure')->find(array($request->getParameter('id'))), sprintf('Object procedure does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProcedureFullForm($procedure);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($procedure = Doctrine::getTable('Procedure')->find(array($request->getParameter('id'))), sprintf('Object procedure does not exist (%s).', $request->getParameter('id')));
    $procedure->delete();

    $this->redirect('procedures/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $procedure = $form->save();

      $this->redirect('procedures/index');
    }
  }

  public function executeShow(sfWebRequest $request) {
    $this->procedure = Doctrine::getTable('Procedure')->find($request->getParameter('procedure_id'));
  }
  
}
