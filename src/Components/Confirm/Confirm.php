<?php

namespace Kubex\Zinc\Components\Confirm;

use Kubex\Zinc\ZincHtmlElement;

class Confirm extends ZincHtmlElement
{
  protected $_tag = 'zn-confirm';

  public function type($type): static
  {
    $this->setAttribute('type', $type);
    return $this;
  }

  public function trigger($trigger): static
  {
    $this->setAttribute('trigger', $trigger);
    return $this;
  }

  public function caption($caption): static
  {
    $this->setAttribute('caption', $caption);
    return $this;
  }

  public function title($title): static
  {
    $this->setAttribute('title', $title);
    return $this;
  }

  public function content($content): static
  {
    $this->setAttribute('content', $content);
    return $this;
  }

  public function action($action): static
  {
    $this->setAttribute('action', $action);
    return $this;
  }
}
