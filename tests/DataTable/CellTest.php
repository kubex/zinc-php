<?php

namespace Kubex\ZincTests\DataTable;

use Kubex\Zinc\Builder\DataTable\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
  /**
   * You probably wouldn't create a cell with all of these properties set at the same time
   */
  public function testCell()
  {
    $text = 'Full Cell';
    $heading = 'Title';
    $color = 'primary';
    $style = 'bold';
    $iconSrc = 'check';
    $iconColor = 'primary';
    $hoverContent = 'Hover Content';
    $hoverPosition = 'left';
    $chipColor = 'primary';
    $gaid = '/uri/gaid';
    $sortValue = '1234';
    $uri = 'uri/link';
    $cell = Cell::i(
      $text,
      $heading,
      $color,
      $style,
      $iconSrc,
      $iconColor,
      $hoverContent,
      $hoverPosition,
      $chipColor,
      $gaid,
      $sortValue,
      $uri
    );

    $expected = json_encode([
      'text'           => $text,
      'heading'        => $heading,
      'color'          => $color,
      'style'          => $style,
      'iconSrc'        => $iconSrc,
      'iconColor'      => $iconColor,
      'hoverContent'   => $hoverContent,
      'hoverPlacement' => $hoverPosition,
      'chipColor'      => $chipColor,
      'gaid'           => $gaid,
      'sortValue'      => $sortValue,
      'uri'            => $uri,
    ]);

    $result = json_encode($cell->jsonSerialize());

    $this->assertJsonStringEqualsJsonString($expected, $result);
  }
}
