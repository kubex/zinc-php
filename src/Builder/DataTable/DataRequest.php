<?php

namespace Kubex\Zinc\Builder\DataTable;

class DataRequest
{
  public int $page = 0;
  public int $perPage = 0;
  public string $sortColumn = "";
  public string $sortDirection = "";
  public string $filter = "";
}
