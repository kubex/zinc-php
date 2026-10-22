<?php

namespace Kubex\Zinc\Builder\ReportTable;

use JsonSerializable;

class Row implements JsonSerializable
{
  public function __construct(
    protected string  $_id,
    protected string  $_label,
    protected array   $_values = [],
    protected ?string $_uri = null,
    protected ?string $_target = null,
    protected ?array  $_links = null,
  )
  {
  }

  public function addLink(string $columnKey, string $uri, ?string $target = null): static
  {
    $this->_links[$columnKey] = array_filter(['uri' => $uri, 'target' => $target], fn($value) => !is_null($value));
    return $this;
  }

  public function jsonSerialize(): array
  {
    $properties = [];
    foreach(get_object_vars($this) as $key => $value)
    {
      $properties[trim($key, '_')] = $value;
    }
    return array_filter($properties, function ($property) { return !is_null($property); });
  }
}
