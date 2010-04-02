<?php

require_once dirname(__FILE__).'/../lib/revisionsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/revisionsGeneratorHelper.class.php';

/**
 * revisions actions.
 *
 * @package    Huemul
 * @subpackage revisions
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class revisionsActions extends autoRevisionsActions {
  public function executeListBackToProcedures(sfWebRequest $request) {
    return $this->redirect('procedures/index');
  }


  public function executeCreateControlRevision(sfWebRequest $request) {

    $revision = Doctrine::getTable('Revision')->find($request->getParameter('revision_id'));
    $procedure = $revision->getProcedure();

    $procedure->addControlRevision();

    return $this->redirect('procedures/index');
  }

  /**
   * action Control
   *
   * @author Damian Suarez
   */
  public function executeControl(sfWebRequest $request) {
    $this->revision = Doctrine::getTable('Revision')->find($request->getParameter('id'));
    $this->rev_items = $this->revision->getRevisionItem();

    if($request->getMethod() == 'POST') {
      $params = $request->getParameter('items');

      if(!empty($params)) {
        foreach ($params as $key => $value) {

          if($value != 'nc') {
            $this->revision_item = RevisionItemTable::retrieveByRevisionAndItem($rev->get('id'), $key);
            $rev_item->setState($value);
            $rev_item->save();
          }
        }
      }
    }

    $this->rev_itemsGroup = array ();
    foreach ($this->rev_items as $rev_item) {
      if(!array_key_exists($rev_item->getItem()->getGroup()->getId(), $this->rev_itemsGroup)) $this->rev_itemsGroup[$rev_item->getItem()->getGroup()->getId()] = array();
      array_push($this->rev_itemsGroup[$rev_item->getItem()->getGroup()->getId()], $rev_item);
    }

  }

  /**
   * action Close
   *
   * @author Damian Suarez
   */
  public function executeClose(sfWebRequest $request) {
    $this->revision = Doctrine::getTable('Revision')->find($request->getParameter('id'));
    $this->revision->setRevisionStateId(7);
    $this->revision->setBlock(true);
    $this->revision->save();

    return $this->redirect('revisions/control?id='.$this->revision->get('id'));
  }
}
