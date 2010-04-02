<?php

class RevisionItemTable extends Doctrine_Table
{

  static public function retrieveByRevisionAndItem($rev_id, $item_id) {

    $q = Doctrine_Query::create()
      ->from('RevisionItem ri')
      ->where('ri.revision_id = ? and ri.item_id = ?', array($rev_id, $item_id));
    return $q->fetchOne();
  }
}
