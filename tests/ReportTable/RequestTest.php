<?php

namespace Kubex\ZincTests\ReportTable;

use Kubex\Zinc\Builder\ReportTable\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
  public function testFilters()
  {
    $rules = [['key' => 'country', 'comparator' => 'eq', 'value' => 'GB']];
    $request = Request::fromArray([
      'type'    => 'compare',
      'groupBy' => 'affiliateFid',
      'from'    => '2026-10-19',
      'to'      => '2026-10-20',
      'filter'  => base64_encode(json_encode($rules)),
    ]);
    $this->assertEquals('affiliateFid', $request->groupBy);
    $this->assertEquals($rules, $request->filters());
  }

  public function testNoFilter()
  {
    $this->assertEquals([], Request::fromArray([])->filters());
  }
}
