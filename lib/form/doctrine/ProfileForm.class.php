<?php

/**
 * Profile form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm {
  public function configure() {

    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['latitude'],
      $this['longitude'],
      $this['mugshot'],
      $this['mugshot_x1'],
      $this['mugshot_y1'],
      $this['mugshot_x2'],
      $this['mugshot_y2']
    );

    $range  = range(date('Y'), date('Y')-100);
    $years = array_combine($range,$range);

    $this->widgetSchema['profesion_id'] = new sfWidgetFormDoctrineChoice(
      array(
        'model' => $this->getRelatedModelName('Profession'),
        'add_empty' => true
      )
    );
    
    $this->widgetSchema['documment_type'] = new sfWidgetFormChoice(
      array(
        'choices' => array('dni' => 'dni', 'le' => 'le')
      )
    );

    $this->widgetSchema['birth_date'] = new sfWidgetFormInputText(
      array(
        //'years' => $years
      ),
      array(
        'class' => 'input_date'
      )
    );
  }
}