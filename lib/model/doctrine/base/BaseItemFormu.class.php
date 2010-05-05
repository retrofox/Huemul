<?php

/**
 * BaseItemFormu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $form_id
 * @property integer $item_id
 * 
 * @method integer   getFormId()  Returns the current record's "form_id" value
 * @method integer   getItemId()  Returns the current record's "item_id" value
 * @method ItemFormu setFormId()  Sets the current record's "form_id" value
 * @method ItemFormu setItemId()  Sets the current record's "item_id" value
 * 
 * @package    Huemul
 * @subpackage model
 * @author     Damian Suarez
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseItemFormu extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('item_formu');
        $this->hasColumn('form_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('item_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));


        $this->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}