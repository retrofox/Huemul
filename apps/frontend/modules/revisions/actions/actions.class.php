<?php

/**
 * revisions actions.
 *
 * @package    Huemul
 * @subpackage revisions
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class revisionsActions extends sfActions {
  public function executeIndex(sfWebRequest $request) {
    $this->revisions = Doctrine::getTable('Revision')
            ->createQuery('a')
            ->execute();
  }

  public function executeNew(sfWebRequest $request) {
    $this->procedure = Doctrine::getTable('Procedure')->find($request->getParameter('procedure_id'));

    $revision = new Revision();
    $revision->setProcedureId($request->getParameter('procedure_id'));
    $this->form = new FrontRevisionForm($revision);
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $parameters = $request->getParameterHolder()->get('revision');
    $this->procedure = Doctrine::getTable('Procedure')->find($parameters['procedure_id']);

    $this->form = new FrontRevisionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->forward404Unless($revision = Doctrine::getTable('Revision')->find(array($request->getParameter('id'))), sprintf('Object revision does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontRevisionForm($revision);
  }

  public function executeUpdate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($revision = Doctrine::getTable('Revision')->find(array($request->getParameter('id'))), sprintf('Object revision does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontRevisionForm($revision);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->forward404Unless($revision = Doctrine::getTable('Revision')->find(array($request->getParameter('id'))), sprintf('Object revision does not exist (%s).', $request->getParameter('id')));
    $revision->delete();

    $this->redirect('revisions/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $revision = $form->save();
      $revision->setRevisionStateId(5);
      $revision->save();

      $this->redirect('procedures/show?procedure_id='.$revision->getProcedureId());
    }
  }

  /**
   * action Control
   *
   * @author Damian Suarez
   */
  public function executeShowRevision(sfWebRequest $request) {
    $this->revision = Doctrine::getTable('Revision')->find($request->getParameter('id'));
    $this->rev_items = $this->revision->getRevisionItem();

    $this->rev_itemsGroup = array ();
    foreach ($this->rev_items as $rev_item) {
      if(!array_key_exists($rev_item->getItem()->getGroup()->getId(), $this->rev_itemsGroup)) $this->rev_itemsGroup[$rev_item->getItem()->getGroup()->getId()] = array();
      array_push($this->rev_itemsGroup[$rev_item->getItem()->getGroup()->getId()], $rev_item);
    }
  }

  /**
   * action Item
   *
   * @author Damian Suarez
   */
  public function executeItem(sfWebRequest $request) {
    $this->revItem = Doctrine::getTable('RevisionItem')->find($request->getParameter('id'));

    $msg = new ComunicationItem();
    $msg->setRevisionItemId($this->revItem->get('id'));

    $this->form = new ComunicationItemForm($msg);

  }

  public function executeCommentCreate(sfWebRequest $request) {
    $params = $request->getParameter('comunication_item');

    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->revItem = Doctrine::getTable('RevisionItem')->find($params['revision_item_id']);

    $this->form = new ComunicationItemForm();

    $this->processCommentForm($request, $this->form);

    $this->setTemplate('item');
  }


  protected function processCommentForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $msg = $form->save();

      $this->redirect('revisions/item?id='.$msg->getRevisionItemId());
    }
  }
}

