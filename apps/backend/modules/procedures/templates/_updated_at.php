<?php use_helper('Date') ?>

<?php echo format_date($procedure->getLastRevision()->getUpdatedAt(), 'd') ?>