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
    protected ?bool  $_hideHeader = false, // = show/hide header text
    protected ?bool  $_hideColumn = false, // = show/hide entire column including header
  )
  {
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
