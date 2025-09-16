<?php

namespace Kubex\ZincTests\DataTable;

use Kubex\Zinc\Builder\DataTable\Action;
use PHPUnit\Framework\TestCase;

class ActionTest extends TestCase
{
  public function testAction()
  {
    $text = 'Action 2';
    $uri = '/action/uri/2';
    $gaid = '/uri/gaid/2';
    $target = 'modal';
    $action = new Action($text, $uri, $target, $gaid);
    $this->assertEquals([
      'text'   => $text,
      'uri'    => $uri,
      'target' => $target,
      'gaid'   => $gaid,
    ], $action->jsonSerialize());
  }
}
