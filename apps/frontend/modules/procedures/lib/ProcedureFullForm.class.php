<?php

/**
 * Procedure form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProcedureFullForm extends ProcedureForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['revisions_count'],
      $this['dossier'],
      $this['is_finished'],
      $this['cadastral_data_id'],
      $this['number'],
      $this['users_list']
    );

    $procedureForm = new CadastralDataForm($this->object->CadastralData);

    unset($procedureForm['id'], $procedureForm['cadastral_data_id']);

    $this->embedForm('Procedure', $procedureForm);

  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    foreach($this->embeddedForms['Procedure']->getEmbeddedForms() as $publicationForm)
    {
        $this->getObject()->setCadastralDataId($publicationForm->getObject()->getId());
    }
    parent::saveEmbeddedForms($con, $forms);
  }
}