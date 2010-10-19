<?php

// Directorios de los css y js
if (!sfConfig::get('app_sfDoctrineMooDooPlugin_css_dir')) {
  sfConfig::set('app_sfDoctrineMooDooPlugin_css_dir', '../sfDoctrineMooDooPlugin/css');
}

if (!sfConfig::get('app_sfDoctrineMooDooPlugin_js_dir')) {
  sfConfig::set('app_sfDoctrineMooDooPlugin_js_dir', '../sfDoctrineMooDooPlugin/js');
}