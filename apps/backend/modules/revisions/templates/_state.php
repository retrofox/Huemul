<?php
  echo (!is_null($revision->getRevisionStateId())) ? $revision->getState() : __('empty');
?>