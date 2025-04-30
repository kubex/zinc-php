<?php

namespace Kubex\Zinc;

enum Enctype: string
{
  case APPLICATION_X_WWW_FORM_URLENCODED = 'application/x-www-form-urlencoded';
  case MULTIPART_FORM_DATA = 'multipart/form-data';
  case TEXT_PLAIN = 'text/plain';
}
