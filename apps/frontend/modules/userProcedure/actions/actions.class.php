<?php

/**
 * userProcedure actions.
 *
 * @package    Huemul
 * @subpackage userProcedure
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userProcedureActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->user_procedures = Doctrine::getTable('UserProcedure')->findBy('procedure_id', $request->getParameter('procedure_id'));
    $this->procedure = Doctrine::getTable('Procedure')->find(array($request->getParameter('procedure_id')));

    $obj = new UserProcedure();
    $obj->setProcedureId($request->getParameter('procedure_id'));
    $this->form = new UserProcedureForm($obj);

  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UserProcedureForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UserProcedureForm();

    $this->processForm($request, $this->form);
    $params = $request->getParameter('user_procedure');

/*    echo '<pre>';
    print_r($params);
    echo '</pre>';
*/
    //die();

    $this->user_procedures = Doctrine::getTable('UserProcedure')->findBy('procedure_id',$params['procedure_id']);
    $this->procedure = Doctrine::getTable('Procedure')->find(array($params['procedure_id']));

    $this->setTemplate('index');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user_procedure = Doctrine::getTable('UserProcedure')->find(array($request->getParameter('user_id'),
                $request->getParameter('procedure_id'))), sprintf('Object user_procedure does not exist (%s).', $request->getParameter('user_id'),
                $request->getParameter('procedure_id')));
    $this->form = new UserProcedureForm($user_procedure);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user_procedure = Doctrine::getTable('UserProcedure')->find(array($request->getParameter('user_id'),
                $request->getParameter('procedure_id'))), sprintf('Object user_procedure does not exist (%s).', $request->getParameter('user_id'),
                $request->getParameter('procedure_id')));
    $this->form = new UserProcedureForm($user_procedure);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $this->forward404Unless($user_procedure = Doctrine::getTable('UserProcedure')->find(array($request->getParameter('user_id'),
                $request->getParameter('procedure_id'),$request->getParameter('type') )), sprintf('Object user_procedure does not exist (%s).', $request->getParameter('user_id'),
                $request->getParameter('procedure_id'),$request->getParameter('type')));

    $user_procedure->delete();

    $this->redirect('userProcedure/index?procedure_id='. $request->getParameter('procedure_id'));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {


    $params = $request->getParameter('user_procedure');
    $user_procedure = Doctrine::getTable('UserProcedure')->find(array($params['user_id'],
                $params['procedure_id'], $params['type'] ));

    if ($user_procedure){
     $this->redirect('userProcedure/index?procedure_id='.$user_procedure->getProcedureId());
    }
    else {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
        $user_procedure = $form->save();
        $this->redirect('userProcedure/index?procedure_id='.$user_procedure->getProcedureId());
      }
    }
  }
}
