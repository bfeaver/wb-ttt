<?php
namespace AppBundle\Tests\Integration;

use AppBundle\Game\GridFactory;
use AppBundle\Game\StandardGrid;

class NestedGridTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StandardGrid
     */
    private $grid;

    protected function setUp()
    {
        $factory = new GridFactory();
        $this->grid = $factory->createNestedGrid(2);
    }

    public function testXWins()
    {
        // Top left X diagonally to lower right X square
        $parentSquares = $this->grid->getSquares();

        $square1Squares = $parentSquares[0]->getSquares();
        $square1Squares[0]->setValue('X');
        $square1Squares[4]->setValue('X');
        $square1Squares[8]->setValue('X');

        $parentSquares[4]->getSquares()[0]->setValue('X');
        $parentSquares[4]->getSquares()[4]->setValue('X');
        $parentSquares[4]->getSquares()[8]->setValue('X');
        $parentSquares[8]->getSquares()[0]->setValue('X');
        $parentSquares[8]->getSquares()[4]->setValue('X');
        $parentSquares[8]->getSquares()[8]->setValue('X');

        $this->assertEquals('X', $this->grid->getWinner());
    }
}
