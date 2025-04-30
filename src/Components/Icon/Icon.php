<?php

namespace Kubex\Zinc\Components\Icon;

use Kubex\Zinc\ZincHtmlElement;

class Icon extends ZincHtmlElement
{
  protected $_tag = 'zn-icon';

  public function src(Icons $src): static
  {
    $this->setAttribute('src', $src->value);
    return $this;
  }

  public function alt(string $alt): static
  {
    $this->setAttribute('alt', $alt);
    return $this;
  }

  public function size(int $size): static
  {
    $this->setAttribute('size', $size);
    return $this;
  }

  public function round(): static
  {
    $this->setAttribute('round', true);
    return $this;
  }

  public function library(IconLibrary $library): static
  {
    $this->setAttribute('library', $library->value);
    return $this;
  }

  public function color(IconColor $color): static
  {
    $this->setAttribute('color', $color->value);
    return $this;
  }

}
