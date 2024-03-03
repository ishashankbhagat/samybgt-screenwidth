<?php

if (! function_exists('screenwidth_get'))
{

  function screenwidth_get()
  {
    $screenwidth = Session::get('screenWidth');

    return $screenwidth;
  }

}


if (! function_exists('screenwidth_device'))
{

  function screenwidth_device($details=null)
  {
    $screenwidth = Session::get('screenWidth');

    $device = null;

    $key_name = 'samybgt.screenwidth.devices';

    $devices = config($key_name);

    foreach ($devices as $key => $limits) {
      if ($screenwidth >= $limits['min'] && $screenwidth <= $limits['max']) {
        $device = $key;
        break;
      }
    }

    if ($details) {
      return [
        'result' => $device,
        'current_width' => $screenwidth,
      ];
    }

    return $device;

  }

}


if (! function_exists('screenwidth_is'))
{

  function screenwidth_is($device,$details=null)
  {

    $screenwidth = Session::get('screenWidth');

    $result = false;

    $key_name = 'samybgt.screenwidth.devices.'.$device;

    $device_limit = config($key_name);

    // dd($device,$key_name,$device_limit,$screenwidth,$screenwidth >= $device_limit['min'],$screenwidth <= $device_limit['max']);

    if ($screenwidth >= $device_limit['min'] && $screenwidth <= $device_limit['max']) {
      $result = true;
    }

    if ($details) {
      return [
      'result' => $result,
      'current_width' => $screenwidth,
      'limits' => $device_limit
      ];
    }

    return $result;

  }

}
