<?php
namespace AppBundle\Game;

class XoSquare
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
        if ($value !== 'X' && $value !== 'O' && !is_null($value)) {
            throw new \RuntimeException(sprintf('Value must be X or O, value %s given.', $value));
        }
        $this->value = $value;
    }
}
