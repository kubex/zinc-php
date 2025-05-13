<?php

namespace Kubex\Zinc\Attributes;

enum Target: string
{
  case TOP = '_top';
  case BLANK = '_blank';
  case SELF = '_self';
  case PARENT = '_parent';
}
