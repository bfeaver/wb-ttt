<?php
namespace AppBundle\Game;

/**
 * A square that contains a nested grid.
 *
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class GridSquare implements Square
{
    /**
     * @var Grid
     */
    private $grid;

    function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @return Grid
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->grid->getWinner();
    }
}
