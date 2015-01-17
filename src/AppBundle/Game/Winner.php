<?php
namespace AppBundle\Game;

/**
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class Winner
{
    const X = 'X';
    const O = 'O';
    const TIE = 'tie';
    const NONE = 'none';

    /**
     * @var string
     */
    private $status;

    function __construct($status)
    {
        if (is_null($status)) {
            $this->status = self::NONE;
        }
        $this->status = $status;
    }

    /**
     * @param string $status
     * @return mixed
     */
    public function isStatus($status)
    {
        return strcasecmp($this->status, $status) == 0;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
