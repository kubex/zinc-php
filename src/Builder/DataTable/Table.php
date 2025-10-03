<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Table implements JsonSerializable
{
  /** @var Row[] $_rows */
  protected array $_rows = [];

  public $perPage = 10;
  public $total = 0;
  public $page = 1;

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

    return [
      'perPage' => $this->perPage,
      'total'   => $this->total,
      'page'    => $this->page,
      'rows'    => array_filter($rows, function ($row) { return !is_null($row); }),
    ];
  }
}
