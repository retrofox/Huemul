<?php

/**
 * Revision form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RevisionForm extends BaseRevisionForm
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
      $this['items_list'],
      $this['item_list'],
      $this['block']
    );

    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    $this->validatorSchema['file'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/revisions',
      'mime_types' => 'web_images'
    ));

    $this->widgetSchema['procedure_id'] = new sfWidgetFormInputHidden();

    /*
    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardPermission',
      'multiple' => 'true',
      'expanded' => true
    ));
    */
  }
}
