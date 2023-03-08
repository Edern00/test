<?php
//Définition des tailles dans un tableau pour voir facilement toutes les infos
//Utilisation d'une boucle pour éviter la répétition de code
function convertSize($bytes, $precision = 2) {
  $sizes = [];
  $sizes['bytes'] = ['value' => $bytes, 'unit' => 'B'];
  $sizes['kilobytes'] = ['value' => $bytes / 1024, 'unit' => 'KB'];
  $sizes['megabytes'] = ['value' => $sizes['kilobytes']['value'] / 1024, 'unit' => 'MB'];
  $sizes['gigabytes'] = ['value' => $sizes['megabytes']['value'] / 1024, 'unit' => 'GB'];
  $sizes['terabytes'] = ['value' => $sizes['gigabytes']['value'] / 1024, 'unit' => 'TB'];
  $sizes['petabytes'] = ['value' => $sizes['terabytes']['value'] / 1024, 'unit' => 'PB'];
  $sizes['exabytes'] = ['value' => $sizes['petabytes']['value'] / 1024, 'unit' => 'EB'];
  $sizes['zettabytes'] = ['value' => $sizes['exabytes']['value'] / 1024, 'unit' => 'ZB'];
  $sizes['yottabytes'] = ['value' => $sizes['zettabytes']['value'] / 1024, 'unit' => 'YB'];
  $sizes['hellabyte'] = ['value' => $sizes['yottabytes']['value'] / 1024, 'unit' => 'HB'];

  foreach($sizes as $size)
  {
    if($size['value'] < 1024)
    {
      return round($size['value'], $precision). ' ' . $size['unit'];
    }
  }
  
  return $bytes . ' B';
}