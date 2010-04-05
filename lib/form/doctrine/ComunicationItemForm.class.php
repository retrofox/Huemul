<?php

/**
 * ComunicationItem form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ComunicationItemForm extends BaseComunicationItemForm {

  public function configure() {
    unset(
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema['revision_item_id'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['revision_item_id'] = new sfValidatorString(array(
      'required' => true
    ));

    $this->validatorSchema['subject'] = new sfValidatorString(array(
      'required' => true
    ));


    $this->widgetSchema['message'] = new sfWidgetFormTextareaTinyMCE(array(
      'width' => 400,
      'height' => 250,
      'config' => 'theme : "simple", theme_advanced_disable: "anchor,image,cleanup,help, charmap, visualaid, removeformat, code, styleselect"'
    ));

    $this->validatorSchema['message'] = new sfValidatorString(array(
      'required' => true
    ));


  }
}
