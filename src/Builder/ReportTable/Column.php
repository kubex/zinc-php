<?php

namespace Kubex\Zinc\Builder\ReportTable;

use JsonSerializable;

class Column implements JsonSerializable
{
  public function __construct(
    protected string  $_key,
    protected string  $_label,
    protected ?string $_format = null,
    protected ?int    $_decimals = null,
    protected ?string $_style = null,
    protected ?float  $_threshold = null,
    protected ?bool   $_summable = null,
    protected ?string $_currency = null,
    protected ?string $_value = null,
    protected ?string $_formula = null,
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
