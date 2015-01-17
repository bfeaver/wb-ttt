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
     * {@inheritdoc}
     */
    public function getWinner()
    {
        foreach ($this->winningKeys as $values) {
            foreach ([Winner::X, Winner::O] as $value) {
                if ($this->squares[$values[0]]->getWinner()->isStatus($value)
                    && $this->squares[$values[1]]->getWinner()->isStatus($value)
                    && $this->squares[$values[2]]->getWinner()->isStatus($value)
                ) {
                    return new Winner($value);
                }
            }
        }

        if (($this->getValueCount(Winner::X) >= 4 && $this->getValueCount(Winner::O) >= 4)
            || ($this->getValueCount(Winner::X) >= 4 && $this->getValueCount(Winner::TIE) >= 4)
            || ($this->getValueCount(Winner::O) >= 4 && $this->getValueCount(Winner::TIE) >= 4)
        ) {
            return new Winner(Winner::TIE);
        }

        return new Winner(Winner::NONE);
    }

    /**
     * Get the number of X or O values in the grid.
     *
     * @param string $value
     * @return int
     */
    public function getValueCount($value)
    {
        $reduce = function ($carry, Square $square) use ($value) {
            if ($square->getWinner()->isStatus($value)) {
                $carry++;
            }
            return $carry;
        };
        return array_reduce($this->squares, $reduce, 0);
    }
}
