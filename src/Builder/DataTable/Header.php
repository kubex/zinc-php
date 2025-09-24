<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Header implements JsonSerializable
{
  public function __construct(
    protected string $_key,
    protected string $_label,
    protected ?bool  $_required = true,
    protected ?bool  $_default = true,
    protected ?bool  $_sortable = true,
    protected ?bool  $_filterable = true,
  )
  {
  }

  public function jsonSerialize(): mixed
  {
    return [
      'key'        => $this->_key,
      'label'      => $this->_label,
      'required'   => $this->_required,
      'default'    => $this->_default,
      'sortable'   => $this->_sortable,
      'filterable' => $this->_filterable,
    ];
  }
}
