<?php
  if ($revision != null) {
    echo (!is_null($revision->getRevisionStateId())) ? $revision->getState() : __('empty');
  } else {
    echo __('empty');
  }
?>