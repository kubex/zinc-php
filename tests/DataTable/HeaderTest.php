<?php

namespace Kubex\ZincTests\DataTable;

use Kubex\Zinc\Builder\DataTable\Header;
use PHPUnit\Framework\TestCase;

class HeaderTest extends TestCase
{
  public function testCell()
  {
    $header = new Header(
      _key       : 'key',
      _label     : 'label',
      _required  : true,
      _default   : true,
      _sortable  : true,
      _filterable: true,
    );

    $this->assertJsonStringEqualsJsonString(json_encode($header), '{"key":{"label":"label","required":true,"default":true,"sortable":true,"filterable":true}}');
  }
}