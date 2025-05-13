<?php

namespace Kubex\Zinc\Components\Button\Attributes;

enum ButtonType: string
{
  case RESET = 'reset';
  case BUTTON = 'button';
  case SUBMIT = 'submit';
}
