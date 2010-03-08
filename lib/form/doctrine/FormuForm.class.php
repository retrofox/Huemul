<?php

/**
 * Formu form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FormuForm extends BaseFormuForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['user_id']);


    $items = Doctrine_Query::create()
      ->from('Item i')
      ->orderBy('i.title');
    
    $this->widgetSchema['items_list'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'Item',
      'multiple' => 'true',
      'query' => $items
      ));
  }
}
