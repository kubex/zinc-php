<?php

namespace Kubex\Zinc\Components\Menu;

use Kubex\Zinc\Components\Confirm\Confirm;
use Kubex\Zinc\ZincHtmlElement;

class MenuItem extends ZincHtmlElement
{
  public function confirm(Confirm $confirm): static
  {
    $this->setAttribute('confirm', $confirm);
    return $this;
  }

  public function target($target): static
  {
    $this->setAttribute('target', $target);
    return $this;
  }

  public function path($path): static
  {
    $this->setAttribute('path', $path);
    return $this;
  }

  public function title($title): static
  {
    $this->setAttribute('title', $title);
    return $this;
  }

  public function style($style): static
  {
    $this->setAttribute('style', $style);
    return $this;
  }
}
