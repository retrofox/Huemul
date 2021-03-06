<?php

/**
 * Item form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemForm extends BaseItemForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['revisions_list'],
      $this['revision_list']
    );

    $this->widgetSchema['formus_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'Formu',
      'multiple' => 'true',
      'expanded' => true
    ));
  }
}
