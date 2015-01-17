<?php
namespace AppBundle\Game;

interface Square
{
    /**
     * @return Winner
     */
    function getWinner();
}
