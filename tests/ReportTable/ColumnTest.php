<?php

namespace Kubex\ZincTests\ReportTable;

use Kubex\Zinc\Builder\ReportTable\Column;
use PHPUnit\Framework\TestCase;

class ColumnTest extends TestCase
{
  public function testColumn()
  {
    $column = new Column('revenue', 'Revenue', 'currency', 2, 'breakeven', 1.5, true, 'USD', 'd1.revenue', '{a} - {b}');
    $this->assertEquals([
      'key'       => 'revenue',
      'label'     => 'Revenue',
      'format'    => 'currency',
      'decimals'  => 2,
      'style'     => 'breakeven',
      'threshold' => 1.5,
      'summable'  => true,
      'currency'  => 'USD',
      'value'     => 'd1.revenue',
      'formula'   => '{a} - {b}',
    ], $column->jsonSerialize());
  }

  public function testMinimalColumnOmitsNulls()
  {
    $this->assertEquals(['key' => 'a', 'label' => 'A'], (new Column('a', 'A'))->jsonSerialize());
  }
}
