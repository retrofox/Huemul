<?php

/*
 * Este archivo es parte del grupo de widgets de formularios de mooDoo
 * (c) Damian Suarez <damian.suarez@xifox.net>
 *
 */

/**
 * sfWidgetFormMooPropelChoiceWithAdd representa un widget de opciones partir de un modelo con una opcion de 'add' con ajax.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Damian Suarez <damian.suarez@xifox.net>
 */
class sfWidgetFormMooPropelChoiceWithAdd extends  sfWidgetFormPropelChoice {
	
  protected function configure($options = array(), $attributes = array()) {
    $this->addRequiredOption('url');
    $this->addRequiredOption('input_name');
    parent::configure($options, $attributes);
  }

  /**
   */
  public function render($name, $value = null, $attributes = array(), $errors = array()) {
    $select_tag = parent::render($name, $value, $attributes, $errors);

    $conten_tag = '<div class="moo_widget select_with_add" id="'.$this->getAttribute('id').'">';

    $conten_tag.= '<div class="win_add2select">';
    $conten_tag.= '<input link_to_add="'.url_for ($this->getOption('url')).'" name="'.$this->getOption('input_name').'" />';
    $conten_tag.= '<div class="icn icn_cancel"></div>';
    $conten_tag.= '<div class="icn icn_ok"></div>';
    $conten_tag.= '</div>';

    $conten_tag.= '<div class="error_response">';
    $conten_tag.= '</div>';

    $conten_tag.= $select_tag;
    $conten_tag.= '<div class="btn_add"><div class="icn icn_add"></div>';
    $conten_tag.= 'add';
    $conten_tag.= '</div>';

    $conten_tag.= '</div>';
    return $conten_tag;
  }
	
  public function getStylesheets()
  {
    return array(
      '/sfFormMooDooPlugin/css/moodoo.global.css' => 'all',
      '/sfFormMooDooPlugin/css/moodoo.choice_with_add.css' => 'all'
    );
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/sfFormMooDooPlugin/js/moodoo.choice_with_add.js');
  }
}