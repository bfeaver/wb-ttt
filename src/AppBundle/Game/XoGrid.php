<?php
namespace AppBundle\Game;

class XoGrid implements Grid
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
        // TODO Validate # squares is 9
        if (empty($squares)) {
            $this->squares = [
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
                new XoSquare(),
            ];
        } else {
            $this->squares = $squares;
        }
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
