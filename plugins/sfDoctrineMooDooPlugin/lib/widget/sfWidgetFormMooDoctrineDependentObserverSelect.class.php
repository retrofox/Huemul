<?php

/*
 * Este archivo es parte del grupo de widgets de formularios de mooDoo
 * (c) Damian Suarez <damian.suarez@xifox.net>
 *
 */

/**
 * sfWidgetFormMooDoctrineDependentSelectObserver :-o
 *
 * @package    symfony
 * @subpackage widget
 * @author     Damian Suarez <damian.suarez@xifox.net>
 */
class sfWidgetFormMooDoctrineDependentObserverSelect extends  sfWidgetFormDoctrineChoice {

  protected function configure($options = array(), $attributes = array()) {

    $this->addRequiredOption('observer_select_id');
    $this->addOption('foreing_id');
    $this->addOption('option_name');
    $this->addOption('where');

    parent::configure($options, $attributes);

  }

  public function render($name, $value = null, $attributes = array(), $errors = array()) {
    $select_parent = parent::render($name, $value, $attributes, $errors);

    $foreing_id = $this->getOption('foreing_id') ? $this->getOption('foreing_id') : strtolower($this->getOption('model').'_id');
    $option_name = $this->getOption('option_name') ? $this->getOption('option_name') : 'name';
    $where = $this->getOption('where') ? ' where="'.$this->getOption('where').'"' : '';

    $conten_tag = '<div class="moo_widget dependent_observer_select" observer_id="'.$this->getOption('observer_select_id').'" model="'.$this->getOption('model').'" option_name="'.$option_name.'" foreing_id="'.$foreing_id.'" action_to_select="'.url_for('mooForm/loadSelectDependent').'"'.$where.'>';
    $conten_tag.= $select_parent;
    $conten_tag.= '</div>';

    return $conten_tag;
  }
}