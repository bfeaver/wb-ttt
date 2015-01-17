<?php
namespace AppBundle\Game;

/**
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class GridSquare implements Grid
{
    /**
     * @var Grid
     */
    private $grid;

    /**
     * {@inheritdoc}
     */
    public function getWinner()
    {
        return $this->grid->getWinner();
    }
}
