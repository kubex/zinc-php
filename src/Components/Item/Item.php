<?php

namespace Kubex\Zinc\Components\Item;

use Kubex\Zinc\Attributes\Size;
use Kubex\Zinc\ZincHtmlElement;

class Item extends ZincHtmlElement
{
  protected $_tag = 'zn-item';

  public function caption(string $content): static
  {
    $this->setAttribute('caption', $content);
    return $this;
  }

  public function stacked(): static
  {
    $this->setAttribute('stacked', true);
    return $this;
  }

  public function size(Size $size): static
  {
    $this->setAttribute('size', $size->value);
    return $this;
  }

  public function editOnHover(): static
  {
    $this->setAttribute('editOnHover', true);
    return $this;
  }

  public function icon(string $content): static
  {
    $this->setAttribute('icon', $content);
    return $this;
  }

  public function value(string $content): static
  {
    $this->setAttribute('value', $content);
    return $this;
  }

  public function inline(): static
  {
    $this->setAttribute('inline', true);
    return $this;
  }

  public function noPadding(): static
  {
    $this->setAttribute('noPadding', true);
    return $this;
  }

  public function grid(): static
  {
    $this->setAttribute('grid', true);
    return $this;
  }
}