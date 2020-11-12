<?php

namespace GreenSms\Utils;

use \Exception;
use GreenSms\Utils\Str;

const BASE_URL = 'https://api3.greensms.ru';

class Url {

  static function baseUrl() {
    return BASE_URL;
  }

  static function buildUrl($baseUrl, $parts) {

    if(Str::isNullOrEmpty($baseUrl))  {
      throw new Exception('Base URL cannot be empty');
    }

    array_unshift($parts, $baseUrl);
    array_walk_recursive($parts, 'GreenSms\Utils\Url::stripTrailingSlash');
    $url = implode('/', $parts);

    return $url;

  }

  static function  stripTrailingSlash(&$component) {
    $component = rtrim($component, '/');
  }

}