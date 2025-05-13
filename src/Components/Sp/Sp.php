<?php

namespace Kubex\Zinc\Components\Sp;

use Kubex\Zinc\Components\Sp\Attributes\SpSize;
use Kubex\Zinc\ZincHtmlElement;

class Sp extends ZincHtmlElement
{
  protected $_tag = 'zn-sp';

  public function divide(): static
  {
    $this->setAttribute('divide', true);
    return $this;
  }

  public function gap(SpSize $size): static
  {
    $this->setAttribute('gap', $size->value);
    return $this;
  }

  public function row(): static
  {
    $this->setAttribute('row', true);
    return $this;
  }

  public function grow(): static
  {
    $this->setAttribute('grow', true);
    return $this;
  }

  public function padX(): static
  {
    $this->setAttribute('pad-x', true);
    return $this;
  }

  public function padY(): static
  {
    $this->setAttribute('pad-y', true);
    return $this;
  }

  public function noGap(): static
  {
    $this->setAttribute('no-gap', true);
    return $this;
  }

  public function flush(): static
  {
    $this->setAttribute('flush', true);
    return $this;
  }

  public function flushX(): static
  {
    $this->setAttribute('flush-x', true);
    return $this;
  }

  public function flushY(): static
  {
    $this->setAttribute('flush-y', true);
    return $this;
  }

  public function widthContainer(): static
  {
    $this->setAttribute('width-container', true);
    return $this;
  }
}