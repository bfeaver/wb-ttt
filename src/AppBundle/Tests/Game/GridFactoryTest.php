<?php
namespace AppBundle\Tests\Game;

use AppBundle\Game\GridFactory;
use AppBundle\Game\GridSquare;
use AppBundle\Game\XoSquare;

class GridFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GridFactory
     */
    private $factory;
    
    protected function setUp()
    {
        $this->factory = new GridFactory();
    }

    public function testNestedGrid()
    {
        $grid = $this->factory->createNestedGrid(2);

        $outerSquares = $grid->getSquares();
        $firstSquare = reset($outerSquares);
        $this->assertInstanceOf(GridSquare::class, $firstSquare);
        $innerSquares = $firstSquare->getSquares();
        $firstNestedSquare = reset($innerSquares);
        $this->assertInstanceOf(XoSquare::class, $firstNestedSquare);
    }

    public function testThreeNestedGrid()
    {
        $grid = $this->factory->createNestedGrid(3);

        $this->assertInstanceOf(
            XoSquare::class,
            $grid->getSquares()[0]->getSquares()[0]->getSquares()[0]
        );
    }
}
