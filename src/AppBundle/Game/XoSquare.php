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
        $this->value = $value;
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
}
