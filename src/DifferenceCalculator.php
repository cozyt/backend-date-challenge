<?php


namespace Vice\Challenge;

interface DifferenceCalculator
{
    /**
     * @param string $start in format Y-m-d
     * @param string $end in format Y-m-d
     * @return DateDifference
     */
    public static function diff($start, $end);
}
