<?php 

namespace Vice\Challenge;

use Vice\Challenge\DifferenceCalculator;
use Vice\Challenge\EraDifference;

class Era implements DifferenceCalculator
{
    /**
     * @param string $start in format Y-m-d
     * @param string $end in format Y-m-d
     * @return DateDifference
     */
    public static function diff($start, $end)
    {
        return new EraDifference($start, $end);
    }
}
