<?php
namespace AppBundle\Tests\Game;


use AppBundle\Game\StandardGrid;
use AppBundle\Game\XoSquare;

class StandardGridTest extends \PHPUnit_Framework_TestCase
{
    public function winningSquaresProvider()
    {
        return [
            [[
                new XoSquare('X'),
                new XoSquare('X'),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
            ]],
            [[
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare('X'),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
            ]],
            [[
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare('X'),
                new XoSquare('X'),
            ]],
            [[
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
            ]],
            [[
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
            ]],
            [[
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
            ]],
            [[
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
            ]],
            [[
                new XoSquare(),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare('X'),
                new XoSquare(),
                new XoSquare(),
            ]],
        ];
    }

    /**
     * @dataProvider winningSquaresProvider
     */
    public function testGetWinner(array $squares)
    {
        $grid = new StandardGrid($squares);

        $winner = $grid->getWinner();

        $this->assertEquals('X', $winner);
    }
}
