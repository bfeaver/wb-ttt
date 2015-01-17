<?php
namespace AppBundle\Tests\Game;


use AppBundle\Game\StandardGrid;
use AppBundle\Game\Winner;
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

        $this->assertEquals(Winner::X, $winner->getStatus());
    }

    public function testNoWinnerYet()
    {
        $grid = new StandardGrid([
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
            new XoSquare(),
        ]);

        $winner = $grid->getWinner();

        $this->assertEquals(Winner::NONE, $winner->getStatus());
    }

    public function testTie()
    {
        $grid = new StandardGrid([
            new XoSquare('O'),
            new XoSquare('X'),
            new XoSquare('X'),
            new XoSquare('x'),
            new XoSquare('x'),
            new XoSquare('o'),
            new XoSquare('o'),
            new XoSquare('o'),
            new XoSquare('x'),
        ]);

        $winner = $grid->getWinner();

        $this->assertEquals(Winner::TIE, $winner->getStatus());
    }

    public function testXCount()
    {
        $squares = [
            new XoSquare(),
            new XoSquare(),
            new XoSquare('X'),
            new XoSquare(),
            new XoSquare('X'),
            new XoSquare(),
            new XoSquare('X'),
            new XoSquare(),
            new XoSquare(),
        ];
        $grid = new StandardGrid($squares);

        $this->assertEquals(3, $grid->getValueCount('X'));
    }
}
