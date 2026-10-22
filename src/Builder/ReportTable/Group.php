<?php

namespace Kubex\Zinc\Builder\ReportTable;

use JsonSerializable;

class Group implements JsonSerializable
{
  /** @var Column[] $_columns */
  protected array $_columns = [];

  public function __construct(
    protected string $_label,
  )
  {
  }

  public function addColumn(Column $column): static
  {
    $this->_columns[] = $column;
    return $this;
  }

  public function jsonSerialize(): array
  {
    return [
      'label'   => $this->_label,
      'columns' => $this->_columns,
    ];
  }
}
