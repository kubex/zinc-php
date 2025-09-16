<?php

namespace Kubex\Zinc\Builder\DataTable;

use JsonSerializable;

class Cell implements JsonSerializable
{

  public function __construct(
    protected string  $_text,
    protected string  $_heading,
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

  public static function i(
    string  $text,
    string  $heading,
    ?string $color = null,
    ?string $style = null,
    ?string $iconSrc = null,
    ?string $iconColor = null,
    ?string $hoverContent = null,
    ?string $hoverPlacement = null,
    ?string $chipColor = null,
    ?string $gaid = null,
    ?string $sortValue = null,
    ?string $uri = null,
    ?string $target = null,
  ): static
  {
    return new static(
      $text,
      $heading,
      $color,
      $style,
      $iconSrc,
      $iconColor,
      $hoverContent,
      $hoverPlacement,
      $chipColor,
      $gaid,
      $sortValue,
      $uri,
      $target,
    );
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
