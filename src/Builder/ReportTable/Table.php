<?php

namespace Kubex\Zinc\Builder\ReportTable;

use JsonSerializable;

class Table implements JsonSerializable
{
  /** @var Group[] $_groups */
  protected array $_groups = [];
  /** @var Row[] $_rows */
  protected array $_rows = [];

  public function __construct(
    protected ?string $_dimension = null,
    protected array   $_totals = [],
    protected ?string $_currency = null,
    protected ?string $_groupBy = null,
    protected array   $_groupBys = [],
    protected array   $_filterFields = [],
    protected ?array  $_error = null,
  )
  {
  }

  public function addGroup(Group $group): static
  {
    $this->_groups[] = $group;
    return $this;
  }

  public function addRow(Row $row): static
  {
    $this->_rows[] = $row;
    return $this;
  }

  public function jsonSerialize(): mixed
  {
    $properties = [
      'dimension'    => $this->_dimension === null ? null : ['label' => $this->_dimension],
      'groups'       => $this->_groups,
      'rows'         => $this->_rows,
      'totals'       => $this->_totals ?: null,
      'currency'     => $this->_currency,
      'groupBy'      => $this->_groupBy,
      'groupBys'     => $this->_groupBys ?: null,
      'filterFields' => $this->_filterFields ?: null,
      'error'        => $this->_error,
    ];
    return array_filter($properties, function ($property) { return !is_null($property); });
  }
}
