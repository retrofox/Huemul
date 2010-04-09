<?php

/**
 * CadastralData form.
 *
 * @package    Huemul
 * @subpackage form
 * @author     Damian Suarez
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CadastralDataForm extends BaseCadastralDataForm {
  public function configure() {
    unset(
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema->setLabels(array(
      'tipo_numero'  => 'Numero',
      'partida_nro'  => 'Partida',
      'uf'  => 'Unidad Funcional',
    ));
  }
}
