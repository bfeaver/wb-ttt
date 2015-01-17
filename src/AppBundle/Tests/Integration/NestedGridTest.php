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
        $this->grid->getSquares()[0]->getGrid()->getSquares()[0]->setValue('X');
        $this->grid->getSquares()[0]->getGrid()->getSquares()[4]->setValue('X');
        $this->grid->getSquares()[0]->getGrid()->getSquares()[8]->setValue('X');
        $this->grid->getSquares()[4]->getGrid()->getSquares()[0]->setValue('X');
        $this->grid->getSquares()[4]->getGrid()->getSquares()[4]->setValue('X');
        $this->grid->getSquares()[4]->getGrid()->getSquares()[8]->setValue('X');
        $this->grid->getSquares()[8]->getGrid()->getSquares()[0]->setValue('X');
        $this->grid->getSquares()[8]->getGrid()->getSquares()[4]->setValue('X');
        $this->grid->getSquares()[8]->getGrid()->getSquares()[8]->setValue('X');

        $this->assertEquals('X', $this->grid->getWinner());
    }
}
