<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Cell implements JsonSerializable
{
  public function __construct(
    protected string  $_text,
    protected string  $_column,
    protected ?string $_color = null,
    protected ?string $_style = null,
    protected ?string $_iconSrc = null,
    protected ?string $_iconColor = null,
    protected ?string $_hoverContent = null,
    protected ?string $_hoverPlacement = null,
    protected ?string $_chipColor = null,
    protected ?string $_gaid = null,
    protected ?string $_sortValue = null,
    protected ?string $_uri = null,
    protected ?string $_target = null,
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

  public static function i($column, $content): static
  {
    return new static($content, $column);
  }

  public function withLink(string $uri, ?string $target = null, ?string $gaid = null)
  {
    $this->_uri = $uri;
    if($target)
    {
      $this->_target = $target;
    }
    if($gaid)
    {
      $this->_gaid = $gaid;
    }
    return $this;
  }

  public function withIcon(string $src, ?string $color = null)
  {
    $this->_iconSrc = $src;
    if($color)
    {
      $this->_iconColor = $color;
    }
    return $this;
  }

  public function asChip(string $color)
  {
    $this->_chipColor = $color;
    return $this;
  }
}
