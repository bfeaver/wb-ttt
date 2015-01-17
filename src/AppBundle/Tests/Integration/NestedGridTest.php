<?php
namespace AppBundle\Tests\Integration;

use AppBundle\Game\GridFactory;
use AppBundle\Game\StandardGrid;
use AppBundle\Game\Winner;

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

        $this->assertEquals('X', $this->grid->getWinner()->getStatus());
    }

    public function testTie()
    {
        $parentSquares = $this->grid->getSquares();

        $this->setXWins($parentSquares[0]->getSquares());
        $this->setXWins($parentSquares[1]->getSquares());
        $this->setXWins($parentSquares[5]->getSquares());
        $this->setXWins($parentSquares[6]->getSquares());
        $this->setXWins($parentSquares[8]->getSquares());
        $this->setTie($parentSquares[2]->getSquares());
        $this->setTie($parentSquares[3]->getSquares());
        $this->setTie($parentSquares[4]->getSquares());
        $this->setTie($parentSquares[7]->getSquares());

        $this->assertEquals(Winner::TIE, $this->grid->getWinner()->getStatus());
    }

    private function setXWins(array $squares)
    {
        $squares[0]->setValue('X');
        $squares[1]->setValue('o');
        $squares[2]->setValue('o');
        $squares[3]->setValue('o');
        $squares[4]->setValue('X');
        $squares[5]->setValue('X');
        $squares[6]->setValue('o');
        $squares[7]->setValue('X');
        $squares[8]->setValue('X');
    }

    private function setTie($squares)
    {
        $squares[0]->setValue('X');
        $squares[1]->setValue('o');
        $squares[2]->setValue('o');
        $squares[3]->setValue('o');
        $squares[4]->setValue('X');
        $squares[5]->setValue('X');
        $squares[6]->setValue('o');
        $squares[7]->setValue('X');
        $squares[8]->setValue('o');
    }
}
