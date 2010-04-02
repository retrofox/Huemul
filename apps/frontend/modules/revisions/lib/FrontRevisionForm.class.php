<?php

/**
 * Revision form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FrontRevisionForm extends BaseRevisionForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['number'],
      $this['parent_id'],
      $this['revision_state_id'],
      $this['creator_id'],
      $this['block']
    );

    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    $this->validatorSchema['file'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/revisions',
      'mime_types' => array(
        'application/pdf',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/x-png',
        'image/gif'
      )
    ));


    $this->widgetSchema['procedure_id'] = new sfWidgetFormInputHidden();
  }
}
