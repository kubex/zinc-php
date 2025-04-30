<?php

namespace Kubex\Zinc\Components\Panel;

use Kubex\Zinc\ZincHtmlElement;
use Packaged\Ui\Html\HtmlElement;

class Panel extends ZincHtmlElement
{
  protected $_tag = 'zn-panel';

  protected HtmlElement|null $_footer = null;

  public function caption(string $content): static
  {
    $this->setAttribute('caption', $content);
    return $this;
  }

  public function description(string $content): static
  {
    $this->setAttribute('description', $content);
    return $this;
  }

  public function basis(int $basis): static
  {
    $this->setAttribute('basis', $basis);
    return $this;
  }

  public function tabbed(): static
  {
    $this->setAttribute('tabbed', true);
    return $this;
  }

  public function flush(): static
  {
    $this->setAttribute('flush', true);
    return $this;
  }

  public function transparent(): static
  {
    $this->setAttribute('transparent', true);
    return $this;
  }

  public function actions(HtmlElement ...$actions): static
  {
    foreach($actions as $action)
    {
      $action->setAttribute('slot', 'actions');
      $this->appendContent($action);
    }
    return $this;
  }

  public function addAction(HtmlElement $action): static
  {
    $action->setAttribute('slot', 'actions');
    $this->appendContent($action);
    return $this;
  }

  public function footer(HtmlElement $footer): static
  {
    $footer->setAttribute('slot', 'footer');
    $this->_footer = $footer;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    if($this->_footer)
    {
      $this->appendContent($this->_footer);
    }
    return parent::_prepareForProduce();
  }
}
