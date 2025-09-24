<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Table implements JsonSerializable
{
  /** @var Row[] $_rows */
  protected array $_rows = [];

  public function addRow(Row $row): static
  {
    $this->_rows[] = $row;
    return $this;
  }

  public function jsonSerialize(): mixed
  {
    $rows = $this->_rows;
    foreach($rows as $key => $value)
    {
      if(str_starts_with($key, '_'))
      {
        $newKey = substr($key, 1);
        $rows[$newKey] = $value;
        unset($rows[$key]);
      }
    }
    return ['rows' => array_filter($rows)];
  }
}
