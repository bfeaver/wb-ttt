<?php
namespace AppBundle\Game;

/**
 * A square that contains a nested grid.
 *
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class GridSquare implements Grid
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
     * {@inheritdoc}
     */
    public function getWinner()
    {
        return $this->grid->getWinner();
    }

    /**
     * @return Grid
     */
    public function getGrid()
    {
        return $this->grid;
    }
}
