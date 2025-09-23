<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Meta implements JsonSerializable
{
  public function __construct(
    protected int $_perPage,
    protected int $_total,
    protected int $_page,
  )
  {
  }

  /** @noinspection PhpMixedReturnTypeCanBeReducedInspection */
  public function jsonSerialize(): mixed
  {
    return [
      'per_page'    => $this->_perPage,
      'total'       => $this->_total,
      'page'        => $this->_page,
      'total_pages' => $this->_total > 0 && $this->_perPage > 0 ? (int)ceil($this->_total / $this->_perPage) : 1,
    ];
  }
}
