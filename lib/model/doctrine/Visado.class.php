<?php

/**
 * Visado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
class Visado extends BaseVisado
{
  public function __toString() {
    return ucfirst($this->get('titulo'));
  }
}
