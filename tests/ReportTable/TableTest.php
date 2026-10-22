<?php

namespace Kubex\ZincTests\ReportTable;

use Kubex\Zinc\Builder\ReportTable\Column;
use Kubex\Zinc\Builder\ReportTable\Group;
use Kubex\Zinc\Builder\ReportTable\Row;
use Kubex\Zinc\Builder\ReportTable\Table;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
  public function testEmptyTable()
  {
    $result = json_encode((new Table())->jsonSerialize());
    $this->assertJsonStringEqualsJsonString(json_encode(['groups' => [], 'rows' => []]), $result);
  }

  public function testTable()
  {
    $table = new Table('Publisher', ['revenue' => 10.5], 'USD', 'affiliateFid');
    $table->addGroup((new Group('2026-10-19'))->addColumn(new Column('revenue', 'Revenue', 'currency')));
    $table->addRow(new Row('AFF-1', 'Nova', ['revenue' => 10.5], '/r/1', 'modal'));

    $expected = [
      'dimension' => ['label' => 'Publisher'],
      'groups'    => [['label' => '2026-10-19', 'columns' => [['key' => 'revenue', 'label' => 'Revenue', 'format' => 'currency']]]],
      'rows'      => [['id' => 'AFF-1', 'label' => 'Nova', 'values' => ['revenue' => 10.5], 'uri' => '/r/1', 'target' => 'modal']],
      'totals'    => ['revenue' => 10.5],
      'currency'  => 'USD',
      'groupBy'   => 'affiliateFid',
    ];
    $this->assertJsonStringEqualsJsonString(json_encode($expected), json_encode($table));
  }

  public function testRowLinks()
  {
    $row = (new Row('AFF-1', 'Nova', ['revenue' => 10.5]))
      ->addLink('revenue', '/r/1/revenue', 'slide')
      ->addLink('leads', '/r/1/leads');

    $expected = [
      'id'     => 'AFF-1',
      'label'  => 'Nova',
      'values' => ['revenue' => 10.5],
      'links'  => ['revenue' => ['uri' => '/r/1/revenue', 'target' => 'slide'], 'leads' => ['uri' => '/r/1/leads']],
    ];
    $this->assertJsonStringEqualsJsonString(json_encode($expected), json_encode($row));
  }
}
