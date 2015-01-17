<?php
namespace AppBundle\Game;

/**
 * Standard 9 square tic-tac-toe grid.
 *
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class StandardGrid implements Grid
{
    /**
     * @var Square[]
     */
    private $squares = [];

    private $winningKeys = [
        [0,3,6],
        [1,4,7],
        [2,5,8],
        [0,1,2],
        [3,4,5],
        [6,7,8],
        [0,4,8],
        [2,4,6],
    ];

    public function __construct($squares = [])
    {
        if (count($squares) !== 9) {
            throw new \InvalidArgumentException('There must be 9 squares.');
        }

        $this->squares = $squares;
    }

    public function setSquares($squares)
    {
        $this->squares = $squares;
    }

    public function getSquares()
    {
        return $this->squares;
    }

    /**
     * @return string|bool
     */
    public function getWinner()
    {
        foreach ($this->winningKeys as $values) {
            foreach (['X', 'O'] as $value) {
                if ($this->squares[$values[0]]->getValue() == $value
                    && $this->squares[$values[1]]->getValue() == $value && $this->squares[$values[2]]->getValue() == $value) {
                    return $value;
                }
            }
        }

        return false;
    }
}
