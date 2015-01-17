<?php
namespace AppBundle\Game;

/**
 * Factory for creating different grids.
 *
 * @author Brian Feaver <brian.feaver@gmail.com>
 */
class GridFactory
{
    /**
     * @return StandardGrid
     */
    public function createStandardGrid()
    {
        $squares = [];
        for ($i = 0; $i < 9; $i++) {
            $squares[] = new XoSquare();
        }

        return new StandardGrid($squares);
    }

    /**
     * Returns a grid that has nested grids $level deep.
     *
     * One grid inside the main grid would be 2 levels deep.
     *
     * @param int $level the number of levels to nest the grids
     * @return StandardGrid
     */
    public function createNestedGrid($level)
    {
        if ($level == 1) {
            return $this->createStandardGrid();
        }

        $squares = [];
        for ($i = 0; $i < 9; $i++) {
            $squares[] = new GridSquare($this->createNestedGrid($level - 1));
        }

        return new StandardGrid($squares);
    }
}
