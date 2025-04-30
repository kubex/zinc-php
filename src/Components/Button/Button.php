<?php

namespace Kubex\Zinc\Components\Button;

use Kubex\Zinc\Components\Icon\Icons;
use Kubex\Zinc\Enctype;
use Kubex\Zinc\Method;
use Kubex\Zinc\Target;
use Kubex\Zinc\ZincHtmlElement;

class Button extends ZincHtmlElement
{
  protected $_tag = 'zn-button';

  public function color(ButtonColor $color): static
  {
    $this->setAttribute('color', $color->value);
    return $this;
  }

  public function size(ButtonSize $size): static
  {
    $this->setAttribute('size', $size->value);
    return $this;
  }

  public function outline(): static
  {
    $this->setAttribute('outline', true);
    return $this;
  }

  public function disabled(): static
  {
    $this->setAttribute('disabled', true);
    return $this;
  }

  public function grow(): static
  {
    $this->setAttribute('grow', true);
    return $this;
  }

  public function square(): static
  {
    $this->setAttribute('square', true);
    return $this;
  }

  public function verticalAlign(): static
  {
    $this->setAttribute('vertical-align', true);
    return $this;
  }

  public function content(string $content): static
  {
    $this->setAttribute('content', $content);
    return $this;
  }

  public function icon(Icons $icon)
  {
    $this->setAttribute('icon', $icon->value);
    return $this;
  }

  public function gaid(string $gaid): static
  {
    $this->setAttribute('gaid', $gaid);
    return $this;
  }

  public function iconPosition(ButtonIconPosition $position): static
  {
    $this->setAttribute('icon-position', $position->value);
    return $this;
  }

  public function iconSize(int $size): static
  {
    $this->setAttribute('icon-size', (string)$size);
    return $this;
  }

  public function type(string $type): static
  {
    $this->setAttribute('type', $type);
    return $this;
  }

  public function name(string $name): static
  {
    $this->setAttribute('name', $name);
    return $this;
  }

  public function value(string $value): static
  {
    $this->setAttribute('value', $value);
    return $this;
  }

  public function form(string $form): static
  {
    $this->setAttribute('form', $form);
    return $this;
  }

  public function formAction(string $action): static
  {
    $this->setAttribute('formaction', $action);
    return $this;
  }

  public function formEnctype(Enctype $enctype): static
  {
    $this->setAttribute('formenctype', $enctype->value);
    return $this;
  }

  public function formMethod(Method $method): static
  {
    $this->setAttribute('formmethod', $method->value);
    return $this;
  }

  public function formNoValidate(): static
  {
    $this->setAttribute('formnovalidate', true);
    return $this;
  }

  public function formTarget(Target $target): static
  {
    $this->setAttribute('formtarget', $target->value);
    return $this;
  }

  public function href(string $href): static
  {
    $this->setAttribute('href', $href);
    return $this;
  }

  public function target(Target $target): static
  {
    $this->setAttribute('target', $target->value);
    return $this;
  }

  public function rel(string $rel): static
  {
    $this->setAttribute('rel', $rel);
    return $this;
  }

  public function dataTarget(string $dataTarget): static
  {
    $this->setAttribute('data-target', $dataTarget);
    return $this;
  }

  public function tooltip(string $tooltip): static
  {
    $this->setAttribute('tooltip', $tooltip);
    return $this;
  }

}
