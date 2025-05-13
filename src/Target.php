<?php

namespace Kubex\Zinc;

enum Target: string
{
  case TOP = '_top';
  case BLANK = '_blank';
  case SELF = '_self';
  case PARENT = '_parent';
}
