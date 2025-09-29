<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Action implements JsonSerializable
{
  public function __construct(
    protected string  $_text,
    protected string  $_uri,
    protected ?string $_target = null,
    protected ?string $_gaid = null,
    protected ?string $_confirmType = null,
    protected ?string $_confirmTitle = null,
    protected ?string $_confirmTontent = null,
  )
  {
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
