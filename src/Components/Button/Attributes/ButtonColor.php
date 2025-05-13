<?php

namespace Kubex\Zinc\Components\Button\Attributes;

enum ButtonColor: string
{
  case DEFAULT = 'default';
  case SECONDARY = 'secondary';
  case ERROR = 'error';
  case INFO = 'info';
  case SUCCESS = 'success';
  case WARNING = 'warning';
  case TRANSPARENT = 'transparent';
  case STAR = 'star';
}
