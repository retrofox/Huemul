<?php

require_once dirname(__FILE__).'/../lib/proceduresGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/proceduresGeneratorHelper.class.php';

/**
 * procedures actions.
 *
 * @package    Huemul
 * @subpackage procedures
 * @author     Damian Suarez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proceduresActions extends autoProceduresActions
{
  public function executeList_revisions(sfWebRequest $request) {
    return $this->redirect('revisions/index?revision_filters[procedure_id]='.$request->getParameter('id'));
  }
}