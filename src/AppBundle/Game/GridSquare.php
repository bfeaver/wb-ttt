<?php
namespace AppBundle\Game;

/**
 * A square that contains a nested grid.
 *
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class GridSquare implements Square, Grid
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

    /**
     * Return the winner of the grid.
     *
     * @return string|bool
     */
    public function getWinner()
    {
        return $this->grid->getWinner();
    }

    /**
     * @return Square[]
     */
    public function getSquares()
    {
        return $this->grid->getSquares();
    }
}
