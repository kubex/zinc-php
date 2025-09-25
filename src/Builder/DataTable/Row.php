<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Row implements JsonSerializable
{
  /** @var Cell[] $_cells */
  protected array $_cells = [];
  /** @var Action[] $_actions */
  protected array $_actions = [];

  public function __construct(
    protected string  $_id,
    protected ?string $_uri = null,
    protected ?string $_target = null,
  )
  {
  }

  public function addCell(Cell $cell): static
  {
    $this->_cells[] = $cell;
    return $this;
  }

  /** @var Cell[] $cells */
  public function addCells(array $cells): static
  {
    array_push($this->_cells, ...$cells);
    return $this;
  }

  public function addAction(Action $action): static
  {
    $this->_actions[] = $action;
    return $this;
  }

  public function jsonSerialize(): mixed
  {
    $properties = get_object_vars($this);
    foreach($properties as $key => $value)
    {
      if(str_starts_with($key, '_'))
      {
        $newKey = substr($key, 1);
        $properties[$newKey] = $value;
        unset($properties[$key]);
      }
    }
    return array_filter($properties);
  }
}
