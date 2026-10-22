<?php

namespace Kubex\Zinc\Builder\ReportTable;

class Request
{
  public string $type = "";
  public string $groupBy = "";
  public string $from = "";
  public string $to = "";
  public string $filter = "";

  public static function fromArray(array $body): Request
  {
    $request = new Request();
    foreach(['type', 'groupBy', 'from', 'to', 'filter'] as $key)
    {
      $request->$key = (string)($body[$key] ?? '');
    }
    return $request;
  }

  public function filters(): array
  {
    if($this->filter === '')
    {
      return [];
    }
    $decoded = base64_decode($this->filter, true);
    $rules = $decoded === false ? null : json_decode($decoded, true);
    return is_array($rules) ? $rules : [];
  }
}
