<?php
namespace AppBundle\Game;

/**
 * A tic-tac-toe grid.
 *
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
interface Grid
{
    /**
     * Return the winner of the grid.
     *
     * @return string|bool
     */
    function getWinner();
}
