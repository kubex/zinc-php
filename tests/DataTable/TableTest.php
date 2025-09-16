<?php

namespace Kubex\ZincTests\DataTable;

use Kubex\Zinc\Builder\DataTable\Action;
use Kubex\Zinc\Builder\DataTable\Cell;
use Kubex\Zinc\Builder\DataTable\Row;
use Kubex\Zinc\Builder\DataTable\Table;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
  public function testEmptyTable()
  {
    $table = Table::i();
    $expected = json_encode(['rows' => []]);
    $result = json_encode($table->jsonSerialize());
    $this->assertJsonStringEqualsJsonString($expected, $result);
  }

  public function testTable()
  {
    $table = Table::i();

    $rowId1 = 'row-1';
    $rowUri1 = '/row/uri/1';
    $rowTarget1 = 'modal';
    $rowGaid1 = '/uri/gaid';

    $row1 = Row::i($rowId1, $rowUri1, $rowTarget1, $rowGaid1);

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

    $cell1 = Cell::i(
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
    $row1->addCell($cell1);

    $text2 = 'Simple Cell';
    $heading2 = 'Title';
    $color2 = 'primary';
    $style2 = 'bold';

    $cell2 = Cell::i(
      $text2,
      $heading2,
      $color2,
      $style2
    );
    $row1->addCell($cell2);

    $action1Text = 'Action 1';
    $action1Uri = '/action/uri/1';
    $action1 = Action::i($action1Text, $action1Uri);
    $row1->addAction($action1);

    $action2Text = 'Action 2';
    $action2Uri = '/action/uri/2';
    $action2Gaid = '/uri/gaid/2';
    $action2Target = 'modal';
    $action2 = Action::i($action2Text, $action2Uri, $action2Target, $action2Gaid);
    $row1->addAction($action2);

    $table->addRow($row1);

    $rowId2 = 'row-2';
    $rowUri2 = '/row/uri/2';
    $rowTarget2 = 'modal';
    $rowGaid2 = '/uri/gaid';

    $row2 = Row::i($rowId2, $rowUri2, $rowTarget2, $rowGaid2);

    $text3 = 'Cell 3';
    $heading3 = 'Heading 3';
    $color3 = 'accent';

    $cell3 = Cell::i(
      $text3,
      $heading3,
      $color3,
    );
    $row2->addCell($cell3);

    $action3Text = 'Action 3';
    $action3Uri = '/action/uri/3';
    $action3Gaid = '/uri/gaid/3';
    $action3Target = 'modal';
    $action3 = Action::i($action3Text, $action3Uri, $action3Target, $action3Gaid);
    $row2->addAction($action3);

    $table->addRow($row2);

    $expected = json_encode([
      'rows' => [
        [

          'id'      => $rowId1,
          'uri'     => $rowUri1,
          'target'  => $rowTarget1,
          'gaid'    => $rowGaid1,
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
        ],
        [

          'id'      => $rowId2,
          'uri'     => $rowUri2,
          'target'  => $rowTarget2,
          'gaid'    => $rowGaid2,
          'cells'   => [
            [
              'text'    => $text3,
              'heading' => $heading3,
              'color'   => $color3,
            ],
          ],
          'actions' => [
            [
              'text'   => $action3Text,
              'uri'    => $action3Uri,
              'target' => $action3Target,
              'gaid'   => $action3Gaid,
            ],
          ],
        ],
      ],
    ]);

    $result = json_encode($table->jsonSerialize());

    $this->assertJsonStringEqualsJsonString($expected, $result);
  }
}
