<?php
namespace AppBundle\Game;

/**
 * A square the contains X or O values.
 * 
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class XoSquare implements Square
{
    /**
     * @var string
     */
    private $value;

    function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = strtoupper($value);
    }

    public function getWinner()
    {
        return new Winner($this->getValue());
    }
}
