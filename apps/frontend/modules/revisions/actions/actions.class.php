<?php

/**
 * revisions actions.
 *
 * @package    Huemul
 * @subpackage revisions
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class revisionsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->revisions = Doctrine::getTable('Revision')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->procedure = Doctrine::getTable('Procedure')->find($request->getParameter('procedure_id'));

    $revision = new Revision();
    $revision->setProcedureId($request->getParameter('procedure_id'));
    $this->form = new FrontRevisionForm($revision);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $parameters = $request->getParameterHolder()->get('revision');
    $this->procedure = Doctrine::getTable('Procedure')->find($parameters['procedure_id']);

    $this->form = new FrontRevisionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($revision = Doctrine::getTable('Revision')->find(array($request->getParameter('id'))), sprintf('Object revision does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontRevisionForm($revision);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($revision = Doctrine::getTable('Revision')->find(array($request->getParameter('id'))), sprintf('Object revision does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontRevisionForm($revision);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($revision = Doctrine::getTable('Revision')->find(array($request->getParameter('id'))), sprintf('Object revision does not exist (%s).', $request->getParameter('id')));
    $revision->delete();

    $this->redirect('revisions/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $revision = $form->save();

      $this->redirect('procedures/show?procedure_id='.$revision->getProcedureId());
    }
  }
}
