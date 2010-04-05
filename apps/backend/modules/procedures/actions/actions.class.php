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
  /**
   * action Show
   *
   * @author Damian Suarez
   */
  public function executeShow(sfWebRequest $request) {
    $this->procedure = Doctrine::getTable('Procedure')->find($request->getParameter('id'));
    
  }
}