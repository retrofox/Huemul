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
class revisionsActions extends autoRevisionsActions
{
  public function executeListBackToProcedures(sfWebRequest $request) {
    return $this->redirect('procedures/index');
  }
}
