<?php

namespace Kubex\ZincTests\DataTable;

use Kubex\Zinc\Builder\DataTable\Action;
use Kubex\Zinc\Builder\DataTable\Cell;
use Kubex\Zinc\Builder\DataTable\Row;
use PHPUnit\Framework\TestCase;

class RowTest extends TestCase
{
  public function testRow()
  {
    $rowId = 'row-1';
    $rowUri = '/row/uri';
    $rowTarget = 'modal';
    $rowGaid = '/uri/gaid';

    $row = new Row($rowId, $rowUri, $rowTarget, $rowGaid);

    $text1 = 'Full Cell';
    $heading1 = 'Title';
    $color1 = 'primary';
    $style1 = 'bold';
    $iconSrc1 = 'check';
    $iconColor1 = 'primary';
    $hoverContent1 = 'Hover Content';
    $hoverPlacement1 = 'left';
    $chipColor1 = 'primary';
    $gaid1 = '/uri/gaid';
    $sortValue1 = '1234';
    $uri1 = 'uri/link';
    $target1 = 'modal';

    $cell1 = new Cell(
      $text1,
      $heading1,
      $color1,
      $style1,
      $iconSrc1,
      $iconColor1,
      $hoverContent1,
      $hoverPlacement1,
      $chipColor1,
      $gaid1,
      $sortValue1,
      $uri1,
      $target1
    );
    $row->addCell($cell1);

    $text2 = 'Simple Cell';
    $heading2 = 'Title';
    $color2 = 'primary';
    $style2 = 'bold';

    $cell2 = new Cell(
      $text2,
      $heading2,
      $color2,
      $style2
    );
    $row->addCell($cell2);

    $action1Text = 'Action 1';
    $action1Uri = '/action/uri/1';
    $action1 = new Action($action1Text, $action1Uri);
    $row->addAction($action1);

    $action2Text = 'Action 2';
    $action2Uri = '/action/uri/2';
    $action2Gaid = '/uri/gaid/2';
    $action2Target = 'modal';
    $action2 = new Action($action2Text, $action2Uri, $action2Target, $action2Gaid);
    $row->addAction($action2);

    $expected = json_encode([
      'id'      => $rowId,
      'uri'     => $rowUri,
      'target'  => $rowTarget,
      'gaid'    => $rowGaid,
      'cells'   => [
        [
          'text'           => $text1,
          'heading'        => $heading1,
          'color'          => $color1,
          'style'          => $style1,
          'iconSrc'        => $iconSrc1,
          'iconColor'      => $iconColor1,
          'hoverContent'   => $hoverContent1,
          'hoverPlacement' => $hoverPlacement1,
          'chipColor'      => $chipColor1,
          'gaid'           => $gaid1,
          'sortValue'      => $sortValue1,
          'uri'            => $uri1,
          'target'         => $target1,
        ],
        [
          'text'    => $text2,
          'heading' => $heading2,
          'color'   => $color2,
          'style'   => $style2,
        ],
      ],
      'actions' => [
        [
          'text' => $action1Text,
          'uri'  => $action1Uri,
        ],
        [
          'text'   => $action2Text,
          'uri'    => $action2Uri,
          'target' => $action2Target,
          'gaid'   => $action2Gaid,
        ],
      ],
    ]);

    $result = json_encode($row->jsonSerialize());

    $this->assertJsonStringEqualsJsonString($expected, $result);
  }
}
